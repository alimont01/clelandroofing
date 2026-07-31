// Theme JS entry point
console.log('j_bowie theme loaded');

// Mobile menu
document.addEventListener("DOMContentLoaded", function () {
    const menu = document.querySelector("#mobile-menu");
    const openButton = document.querySelector(".mobile-menu");
    const closeButton = document.querySelector(".mobile-menu-close");
    const body = document.body;

    if (!menu || !openButton) return;

    function openMenu() {
        body.classList.add("mobile-menu-open");
        openButton.setAttribute("aria-expanded", "true");
        menu.setAttribute("aria-hidden", "false");
    }

	function closeMenu() {
		body.classList.remove("mobile-menu-open");
		openButton.setAttribute("aria-expanded", "false");
		menu.setAttribute("aria-hidden", "true");
	}

    openButton.addEventListener("click", openMenu);

    if (closeButton) {
        closeButton.addEventListener("click", closeMenu);
    }

    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            closeMenu();
        }
    });
});