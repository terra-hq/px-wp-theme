import gsap from "gsap";

class Navbar {
    constructor(payload) {
        this.DOM = {
            burger: payload.burger,
            navbar: payload.navbar,
            header: payload.header,
            headerElement: payload.header,
        };

        this.isNavbarVisible = false; // Track the visibility state of the navbar

        this.init();
        this.events();
    }

    init() {
        // Set the initial position of the navbar to be offscreen right if in tablet range
        if (this.isTabletScreen()) {
            gsap.set(this.DOM.navbar, { x: "100%", autoAlpha: 0 });
        }
    }

    events() {
        this.DOM.burger.addEventListener("click", () => {
            this.toggleNavbar();
        });

        window.addEventListener("resize", () => {
            this.handleResize();
        });

        //add class in to change navbar opacity on scroll
        window.addEventListener("scroll", () => {
            let btns = this.DOM.navbar.querySelectorAll(".c--nav-a__wrapper__list-group__item__link");

            if (window.scrollY > 5) {
                this.DOM.headerElement.classList.add("c--header-a--is-scroll");

                btns.forEach((btn) => {
                    btn.classList.add("g--btn-01--third");
                    btn.classList.remove("g--btn-01--fourth");
                });
            } else {
                this.DOM.headerElement.classList.remove("c--header-a--is-scroll");
                btns.forEach((btn) => {
                    btn.classList.add("g--btn-01--fourth");
                    btn.classList.remove("g--btn-01--third");
                });
            }
        });

        this.DOM.navbar.querySelectorAll(".c--nav-a__wrapper__list-group__item__link").forEach((link) => {
            link.addEventListener("click", () => {
                this.DOM.burger.classList.toggle("c--burger-a--is-active");
                this.DOM.navbar.classList.toggle("c--nav-a__list-group--is-active");
            });
        });
    }

    toggleNavbar() {
        this.DOM.header.classList.toggle("c--header-a--is-active");
        this.DOM.burger.classList.toggle("c--burger-a--is-active");
        this.DOM.navbar.classList.toggle("c--nav-a__list-group--is-active");

        if (this.isTabletScreen()) {
            if (this.isNavbarVisible) {
                // Animate navbar to offscreen right
                gsap.to(this.DOM.navbar, {
                    duration: 0.5,
                    x: "100%",
                    autoAlpha: 0,
                    ease: "power3.inOut",
                });
            } else {
                // Make navbar visible before animation starts
                gsap.to(this.DOM.navbar, {
                    duration: 0.5,
                    x: "0%",
                    autoAlpha: 1,
                    ease: "power3.inOut",
                });
            }
        }

        this.isNavbarVisible = !this.isNavbarVisible; // Toggle the visibility state
    }

    handleResize() {
        if (!this.isTabletScreen()) {
            // Reset to pre-open state if the screen is not in tablet range
            gsap.set(this.DOM.navbar, { x: "0%", autoAlpha: 1 });
            this.DOM.header.classList.remove("c--header-a--is-active");
            this.DOM.burger.classList.remove("c--burger-a--is-active");
            this.DOM.navbar.classList.remove("c--nav-a__list-group--is-active");
            this.isNavbarVisible = false;
        } else {
            // Ensure navbar is offscreen right if in tablet range
            if (!this.isNavbarVisible) {
                gsap.set(this.DOM.navbar, { x: "100%", autoAlpha: 0 });
            }
        }
    }

    isTabletScreen() {
        return window.matchMedia("(max-width: 1024px)").matches;
    }
}

export default Navbar;
