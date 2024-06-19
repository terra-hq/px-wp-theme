import gsap from "gsap";

class In {
    constructor(payload) {
        this.DOM = {
            items: payload.elements,
        };
        return this.init();
    }

    init() {

        const visibleItems = Array.from(this.DOM.items).filter(item => window.getComputedStyle(item).display !== "none");
        const viewportWidth = window.innerWidth;
        let time = 0.25;
        
        if (viewportWidth <= 1204) {
            time = 0.15;
        } else if (viewportWidth <= 580) {
            time = 0.1;
        }

        const tl = gsap.timeline({});
        tl.to(visibleItems, {
            duration: 0.25,
            y: "100%",
            ease: "easeInOutQuart",
            stagger: {
                from: "center",
                amount: `${time}`,
            }
        });

        gsap.set(visibleItems, { y: 0 });
        
        return tl;
    }
}

export default In;