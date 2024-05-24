import gsap from 'gsap';

class Navbar {
    constructor(payload) {
        this.DOM = {
            burger: payload.burger,
            navbar: payload.navbar,
            header: payload.header,
        };

        this.init();
        this.events();
    }

    init() {
        // Any initialization code can go here
    }

    events() {
        this.DOM.burger.addEventListener('click', () => {
            this.toggleNavbar();
        });
    }

    toggleNavbar() {
        this.DOM.header.classList.toggle('c--header-a--is-active');
        this.DOM.burger.classList.toggle('c--burger-a--is-active');
        this.DOM.navbar.classList.toggle('c--nav-a__list-group--is-active');
    }
}

export default Navbar;
