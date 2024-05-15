import gsap from "gsap";

class Out {
    constructor() {
        this.DOM = {
            transition: document.querySelectorAll(".js--transition"),
        };
        return this.init();
    }
    init() {
        var tl = gsap.timeline();

        tl.to(this.DOM.transition, {
            duration: 0.5,
            x: 0,
            ease: "power4.in",
        });

        return tl;
    }
}
export default Out;
