import gsap from "gsap";

class Out {
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


        var tl = gsap.timeline({});
        
        tl.to(visibleItems, {
            delay: 0.5,
            duration: 0.25,
            y: 0,
            ease: "easeInOutQuart",
            stagger: {
                from: "center",
                amount: `${time}`,
            }
        });

        gsap.set(this.DOM.items, { y: "100%" });

        return tl;
    }
}
export default Out;
