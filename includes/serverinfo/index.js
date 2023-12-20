const si = require('systeminformation');

(async () => {
    const mem = await si.mem();

    const data = {
        ram: Math.round(mem.used + mem.swapused),
        disk: (await si.fsSize()).filter(i => i.type !== "fuse" && i.fs.startsWith("/")).map(i => i.used).reduce((a, b) => a + b)
    }

    process.stdout.write(JSON.stringify(data));
})();