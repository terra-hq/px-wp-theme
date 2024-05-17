import "@scss/entries/frontend/pages/_project.scss";
import Main from "../Main.js";
import gsap from "gsap";
import { preloadImages, preloadFonts, preloadLotties } from "@terrahq/helpers/preload";

class Project {
    constructor() {
        window.isFired = true;
        this.DOM = {
            preloaderElement: document.querySelector(".c--preloader-a"),
        };

        this.tl = gsap.timeline();
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
