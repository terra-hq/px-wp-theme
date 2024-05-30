import gsap from "gsap";

class In {
    constructor(payload) {
        this.DOM = {
            items: payload.elements, 
        };
        return this.init();
    }
    init() {
        var tl = gsap.timeline({});

        tl.to(this.DOM.items, {
            duration: 0.5,
            y: "100%",
            ease: "easeInOutQuart",
            stagger: .1
        });

        gsap.set(this.DOM.items, { y: 0 });
        
        return tl;
    }
}
export default In;
