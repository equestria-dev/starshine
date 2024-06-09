const Starshine = {
    Navbar: {
        item: (name) => {
            let el = document.getElementById("navbar-item-" + name);

            if (el.classList.contains("navbar-item-closed")) {
                for (let oel of document.getElementsByClassName("navbar-item")) {
                    oel.classList.replace("navbar-item-open", "navbar-item-closed");
                }

                el.classList.replace("navbar-item-closed", "navbar-item-open");
            } else {
                el.classList.replace("navbar-item-open", "navbar-item-closed");
            }
        }
    },
    Home: {
        heroCta: () => {
            document.getElementById("home").scrollIntoView();
        }
    }
}

window.onload = () => {
    for (let id of ["projects", "network", "contact", "legal"]) {
        document.getElementById("navbar-item-" + id).onclick = (e) => {
            if (e.target.id === "navbar-item-" + id || e.target.classList.contains("navbar-item-menu-container")) {
                Starshine.Navbar.item(id);
            }
        }
    }

    document.body.classList.add("animated");

    if (document.getElementById("legal-color-switch-oklch")) {
        document.getElementById("legal-color-switch-oklch").onclick = (e) => {
            e.preventDefault();

            document.getElementById("legal-color-switch-oklch").classList.remove("legal-color-switch-active");
            document.getElementById("legal-color-switch-rgb").classList.remove("legal-color-switch-active");
            document.getElementById("legal-color-switch-cmyk").classList.remove("legal-color-switch-active");

            document.getElementById("legal-color-box").classList.remove("legal-color-format-rgb");
            document.getElementById("legal-color-box").classList.remove("legal-color-format-cmyk");
            document.getElementById("legal-color-box").classList.remove("legal-color-format-oklch");

            document.getElementById("legal-color-switch-oklch").classList.add("legal-color-switch-active");
            document.getElementById("legal-color-box").classList.add("legal-color-format-oklch");
        }
    }

    if (document.getElementById("legal-color-switch-rgb")) {
        document.getElementById("legal-color-switch-rgb").onclick = (e) => {
            e.preventDefault();

            document.getElementById("legal-color-switch-oklch").classList.remove("legal-color-switch-active");
            document.getElementById("legal-color-switch-rgb").classList.remove("legal-color-switch-active");
            document.getElementById("legal-color-switch-cmyk").classList.remove("legal-color-switch-active");

            document.getElementById("legal-color-box").classList.remove("legal-color-format-rgb");
            document.getElementById("legal-color-box").classList.remove("legal-color-format-cmyk");
            document.getElementById("legal-color-box").classList.remove("legal-color-format-oklch");

            document.getElementById("legal-color-switch-rgb").classList.add("legal-color-switch-active");
            document.getElementById("legal-color-box").classList.add("legal-color-format-rgb");
        }
    }

    if (document.getElementById("legal-color-switch-cmyk")) {
        document.getElementById("legal-color-switch-cmyk").onclick = (e) => {
            e.preventDefault();

            document.getElementById("legal-color-switch-oklch").classList.remove("legal-color-switch-active");
            document.getElementById("legal-color-switch-rgb").classList.remove("legal-color-switch-active");
            document.getElementById("legal-color-switch-cmyk").classList.remove("legal-color-switch-active");

            document.getElementById("legal-color-box").classList.remove("legal-color-format-rgb");
            document.getElementById("legal-color-box").classList.remove("legal-color-format-cmyk");
            document.getElementById("legal-color-box").classList.remove("legal-color-format-oklch");

            document.getElementById("legal-color-switch-cmyk").classList.add("legal-color-switch-active");
            document.getElementById("legal-color-box").classList.add("legal-color-format-cmyk");
        }
    }

    (async () => {
        const status = await (await fetch("https://d6gd1hq6b89h1s1v.public.blob.vercel-storage.com/public/api.json")).json();
        switch (status.code) {
            case 0:
                document.getElementById("navbar-status").innerHTML = `
                <a href="/network/status" class="navbar-status navbar-status-ok">
                    <i class="bi bi-check-circle-fill"></i>
                    <span class="navbar-status-text">All systems operational</span>
                </a>
                `;
                break;

            case 1:
                document.getElementById("navbar-status").innerHTML = `
                <a href="/network/status" class="navbar-status navbar-status-warn">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span class="navbar-status-text">Degraded performance</span>
                </a>
                `;
                break;

            case 2:
                document.getElementById("navbar-status").innerHTML = `
                <a href="/network/status" class="navbar-status navbar-status-fail">
                    <i class="bi bi-x-circle-fill"></i>
                    <span class="navbar-status-text">Major outage</span>
                </a>
                `;
                break;
        }
    })();
}
