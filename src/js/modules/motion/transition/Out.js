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

        var tl = gsap.timeline({});
        
        tl.to(visibleItems, {
            delay: .5,
            duration: 0.5,
            y: 0,
            ease: "easeInOutQuart",
            stagger: {
                from: "center",
                amount: 0.5
            }
        });

        gsap.set(this.DOM.items, { y: "100%" });

        return tl;
    }
}
export default Out;
