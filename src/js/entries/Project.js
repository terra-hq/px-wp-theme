import "@scss/entries/frontend/pages/_project.scss";
import gsap from "gsap";
import Boostify from 'boostify';

class Project {
    constructor() {
        window.isFired = true;
        this.DOM = {
            preloaderElement: document.querySelector(".c--preloader-a"),
            headerElement: document.querySelector(".c--header-a"),
        };

        this.tl = gsap.timeline();

        this.boostify = new Boostify({
            debug: true,
            license: "7A878CB9-BDEE4909-8CA2200B-DB650D8C",
        });

        // this.boostify.onload({
        //     maxTime: 4800,
        // });

        window["lib"] = {};


        this.init();
        this.events();
    }
    async init() {

        try {
            const { preloadImages } = await import(/* webpackChunkName: "preloadImages" */"@terrahq/helpers/preloadImages");
            window["lib"]["preloadImages"] = preloadImages;
            await preloadImages("img");
        } catch (error) {
            console.error(error);
        } finally {
            this.tl = gsap.timeline({
                onUpdate: async () => {
                    //* Check if the animation is at least 50% complete and the function hasn't been executed yet
                    if (this.tl.progress() >= 0.5 && !this.halfwayExecuted) {
                        this.halfwayExecuted = true; // Set a flag to ensure the function only executes once
                        import(/* webpackChunkName: "Main" */'../Main.js').then(({ default: Main }) =>{
                            new Main({ boostify: this.boostify});
                        });
                    }
                },
            });
            this.tl.to(this.DOM.preloaderElement, {
                duration: 1,
                delay: 1,
                autoAlpha: 0,
                pointerEvents: "none",
            });
        }
    }
    events(){
        window.addEventListener('scroll', () => {
            if (window.scrollY > 5) {
                this.DOM.headerElement.classList.add('c--header-a--is-scroll');
            } else {
                this.DOM.headerElement.classList.remove('c--header-a--is-scroll');
            }
        });
    }
}
export default Project;

if (!window.isFired) {
    new Project();
}
