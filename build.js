const cp = require('child_process');
const fs = require('fs');
const path = require('path');

const port = ("42" + Math.random().toString().split(".")[1]).substring(0, 5);

console.log("Removing old build...");
if (fs.existsSync("./out")) fs.rmSync("./out", { recursive: true });
fs.mkdirSync("./out");

console.log("Copying assets...");
cp.execSync("cp -r ./assets ./out/assets");

async function getFiles(dir) {
    const dirEnt = await fs.promises.readdir(dir, { withFileTypes: true });

    const files = await Promise.all(dirEnt.map((dirent) => {
        const res = path.resolve(dir, dirent.name);
        return dirent.isDirectory() ? getFiles(res) : res;
    }));

    return Array.prototype.concat(...files);
}

console.log("Starting PHP internal server on port " + port + "...");
let p = cp.execFile("php", [ "-S", "127.0.0.1:" + port, "router.php" ]);

let config = {};

let continued = false;
let waiter = setInterval(async () => {
    try {
        await fetch("http://127.0.0.1:" + port + "/warrant");
        if (continued) return; continued = true;
        clearInterval(waiter);
        console.log("Server is up, continuing.");

        console.log("Analyzing source code...");
        let files = (await getFiles(".")).map(i => i.substring(process.cwd().length + 1)).filter(i => !i.startsWith(".") && !i.startsWith("assets/") && !i.startsWith("includes/") && !i.startsWith("out/"));

        console.log("Gathering list of available languages...");
        let languages = fs.readdirSync("./includes/lang").filter(i => i.endsWith(".json") && !i.startsWith("package"));

        console.log("Gathering list of projects...");
        let projects = require('./includes/data/projects.json').map(i => "projects/" + (i["name"] ?? i["id"]));

        console.log("Gathering list of pages...");
        let pages = [...projects, ...files.filter(i => i.endsWith("/index.php")), "404.html"];
        let fullPages = languages.map(i => ["", ...pages.map(k => {
            if (k.endsWith("/index.php")) return k.substring(0, k.length - 10);
            return k;
        })].map(j => "/" + i.substring(0, i.length - 5) + "/" + j)).reduce((a, b) => [...a, ...b]);
        console.log("Found " + fullPages.length + " pages to render");

        let index = 0;
        let total = fullPages.length;

        for (let page of fullPages) {
            process.stdout.clearLine(null);
            process.stdout.cursorTo(0);
            process.stdout.write("Rendering: " + page + " (" + ((index / total) * 100).toFixed(1) + "% complete)");

            async function doRequest() {
                try {
                    return await fetch("http://127.0.0.1:" + port + page);
                } catch (e) {
                    p.kill("SIGKILL");
                    p = cp.execFile("php", [ "-S", "127.0.0.1:" + port, "router.php" ]);

                    function wait() {
                        return new Promise((res) => {
                            let waiter = setInterval(async () => {
                                try {
                                    await fetch("http://127.0.0.1:" + port + "/warrant");
                                    clearInterval(waiter);
                                    res();
                                } catch (e) {}
                            });
                        });
                    }

                    await wait();
                    return await doRequest();
                }
            }

            let res = await doRequest();

            if (res.redirected) {
                if (!config['redirects']) config['redirects'] = [];
                config['redirects'].push({
                    source: page,
                    destination: res.url.replace("http://127.0.0.1:42934", "")
                });
            } else {
                if (page.endsWith("/404.html")) {
                    if (!fs.existsSync("./out" + path.dirname(page))) fs.mkdirSync("./out" + path.dirname(page), { recursive: true });
                    fs.writeFileSync("./out" + page, await res.text());
                    if (!config['rewrites']) config['rewrites'] = [];
                    config['rewrites'].push({
                        source: "/" + page.split("/")[0] + "/(.*)",
                        destination: "/" + page
                    });
                } else {
                    if (!fs.existsSync("./out" + page)) fs.mkdirSync("./out" + page, { recursive: true });
                    fs.writeFileSync("./out" + page + "/index.html", await res.text());
                    if (!config['rewrites']) config['rewrites'] = [];
                    config['rewrites'].push({
                        source: "/" + page,
                        destination: "/" + page
                    });
                }
            }

            index++;
        }

        for (let language of languages) {
            for (let page of pages) {
                if (page.endsWith("/index.php")) {
                    config['rewrites'].push({
                        source: "/" + page.substring(0, page.length - 10),
                        has: [
                            {
                                type: "header",
                                key: "accept-language",
                                value: language + "(.*)"
                            }
                        ],
                        destination: "/" + language + "/" + page.substring(0, page.length - 10)
                    })
                }
            }
        }

        fs.writeFileSync("./out/vercel.json", JSON.stringify(config, null, 2));
        process.stdout.clearLine(null);
        process.stdout.cursorTo(0);
        console.log("Export completed!");
        p.kill();
        process.exit();
    } catch (e) {
        if (continued) {
            throw e;
        }
    }
});