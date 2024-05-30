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

        var tl = gsap.timeline({});

        tl.to(visibleItems, {
            duration: 0.5,
            y: "100%",
            ease: "easeInOutQuart",
            stagger: {
                from: "center",
                amount: 0.5
            }
        });

        gsap.set(visibleItems, { y: 0 });
        
        return tl;
    }
}

export default In;