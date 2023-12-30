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

    if (document.getElementById("hero-logo-img")) document.getElementById("hero-logo-img").ontimeupdate = () => {
        if (document.getElementById("hero-logo-img").duration - document.getElementById("hero-logo-img").currentTime <= .7) {
            document.body.classList.add("animated");
        }
    }
}