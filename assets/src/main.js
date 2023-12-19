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
    }
}

window.onload = () => {
    for (let id of ["projects", "network", "contact", "legal"]) {
        document.getElementById("navbar-item-" + id).onclick = (e) => {
            if (e.target.id === "navbar-item-" + id) {
                Starshine.Navbar.item(id);
            }
        }
    }
}