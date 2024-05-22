import "@scss/entries/frontend/pages/_project.scss";
import Main from "../Main.js";
import gsap from "gsap";
import { preloadImages, preloadFonts, preloadLotties } from "@terrahq/helpers/preload";
import Boostify from "boostify"

class Project {
    constructor() {
        window.isFired = true;
        this.DOM = {
            preloaderElement: document.querySelector(".c--preloader-a"),
        };

        this.tl = gsap.timeline();

        this.boostify = new Boostify({
            debug: true,
            license: "7A878CB9-BDEE4909-8CA2200B-DB650D8C",
        });

        // this.boostify.onload({
        //     maxTime: 4800,
        // });

        this.init();
    }
    init() {
        Promise.all([
            preloadLotties(),
            preloadImages("img"),
            // preloadFonts({
            //     provider: "google",
            //     families: ["XXXXX"],
            // }),
        ]).then(() => {
            this.tl.to(this.DOM.preloaderElement, {
                duration: 1,
                autoAlpha: 0,
                pointerEvents: "none",
                onStart: () => {
                    new Main();
                },
            });
        });
    }
}
export default Project;

if (!window.isFired) {
    new Project();
}
