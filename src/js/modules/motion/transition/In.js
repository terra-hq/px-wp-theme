import gsap from "gsap";

class In {
    constructor() {
        this.DOM = {
            transition: document.querySelectorAll(".js--transition"),
        };
        return this.init();
    }
    init() {
        var tl = gsap.timeline({});

        tl.to(this.DOM.transition, {
            duration: 0.5,
            x: "-100%",
            ease: "power4.out",
            delay: 0.5,
        });

        gsap.set(this.DOM.transition, { x: 0 });
        return tl;
    }
}
export default In;
