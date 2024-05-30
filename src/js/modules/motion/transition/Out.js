import gsap from "gsap";

class Out {
    constructor(payload) {
        this.DOM = {
            items: payload.elements, 
        };
        return this.init();
    }
    init() {
        var tl = gsap.timeline({});
        
        tl.to(this.DOM.items, {
            delay: .5,
            duration: 0.5,
            y: 0,
            ease: "easeInOutQuart",
            stagger: .1,
        });

        gsap.set(this.DOM.items, { y: "100%" });

        return tl;
    }
}
export default Out;
