import Core from "./Core";
//import HoverCards from "./modules/hovercards/HoverCards";
import { sliderAConfig, sliderBConfig, sliderCConfig } from "@modules/sliders/slidersConfig";

class Main extends Core {
    constructor(payload) {
        super({
            blazy: {
                enable: true,
                selector: "g--lazy-01",
            },
            form7: {
                enable: true,
            },
            boostify: payload.boostify,
        });
    }

    async contentReplaced() {
        super.contentReplaced();

        /**
         * HoverCards
         * Dynamically import the Hovercards class with boostify observer
         */
        var logoCardsElements = document.querySelectorAll(".c--card-b");
        if (logoCardsElements.length) {
            this.boostify.observer({
                options: {
                    root: null,
                    rootMargin: "0px",
                    threshold: 0,
                },
                element: document.querySelector(".c--card-b"),
                callback: async () => {
                    const { default: HoverCards } = await import(/* webpackChunkName: "HoverCards" */ "./modules/hovercards/HoverCards");
                    const hoverCards = new HoverCards({
                        cardSelector: ".c--card-b",
                        activateBtnSelector: ".js--card-open",
                        closeBtnSelector: ".js--card-close",
                    });
                },
            });
        }
        /**
         * SliderA
         * Dynamically import the SliderB config and the slider module and store them in the window.lib object for later use
         */
        var sliderAElements = document.querySelectorAll(".js--slider-a");
        if (sliderAElements.length) {
            sliderAElements.forEach((slider, index) => {
                this.boostify.observer({
                    options: {
                        root: document.getElementById("swup"),
                        rootMargin: "0px", // check this with a created page layout
                        threshold: 0.5,
                    },
                    element: slider,
                    callback: async () => {
                        this.instances["SliderA"] = [];
                        if (!window["lib"]["sliderAConfig"]) {
                            await import(/* webpackChunkName: "sliderAConfig" */ "@modules/sliders/slidersConfig").then(({ default: sliderAConfig }) => {
                                window["lib"]["sliderAConfig"] = sliderAConfig;
                            });
                        }
                        if (!window["lib"]["Slider"]) {
                            await import(/* webpackChunkName: "Slider" */ "@modules/sliders/Slider.js").then(({ default: Slider }) => {
                                window["lib"]["Slider"] = Slider;
                            });
                        }
                        this.instances["SliderA"][index] = new window["lib"]["Slider"]({
                            slider: slider,
                            controls: slider.nextElementSibling.querySelector(".js--slider-a-controls"),
                            config: sliderAConfig,
                            windowName: "SliderA",
                            index: index,
                        });
                        this.instances["SliderA"][index]?.isReady();
                    },
                });
            });
        }
        /**
         * SliderB
         * Dynamically import the SliderB config and the slider module and store them in the window.lib object for later use
         */
        var sliderBElements = document.querySelectorAll(".js--slider-b");
        if (sliderBElements.length) {
            sliderBElements.forEach((slider, index) => {
                this.boostify.observer({
                    options: {
                        root: document.getElementById("swup"),
                        rootMargin: "0px", // check this with a created page layout
                        threshold: 0,
                    },
                    element: slider,
                    callback: async () => {
                        this.instances["SliderB"] = [];
                        if (!window["lib"]["sliderBConfig"]) {
                            await import(/* webpackChunkName: "sliderBConfig" */ "@modules/sliders/slidersConfig").then(({ default: sliderBConfig }) => {
                                window["lib"]["sliderBConfig"] = sliderBConfig;
                            });
                        }
                        if (!window["lib"]["Slider"]) {
                            await import(/* webpackChunkName: "Slider" */ "@modules/sliders/Slider.js").then(({ default: Slider }) => {
                                window["lib"]["Slider"] = Slider;
                            });
                        }
                        this.instances["SliderB"][index] = new window["lib"]["Slider"]({
                            slider: slider,
                            controls: slider.nextElementSibling.querySelector(".js--slider-b-controls"),
                            config: sliderBConfig,
                            windowName: "SliderB",
                            index: index,
                        });
                        this.instances["SliderB"][index]?.isReady();
                    },
                });
            });
        }

        /**
         * SliderC
         * Dynamically import the SliderC config and the slider module and store them in the window.lib object for later use
         */
        var sliderCElements = document.querySelectorAll(".js--slider-c");
        if (sliderCElements.length) {
            sliderCElements.forEach((slider, index) => {
                this.boostify.observer({
                    options: {
                        root: document.getElementById("swup"),
                        rootMargin: "0px", // check this with a created page layout
                        threshold: 0,
                    },
                    element: slider,
                    callback: async () => {
                        this.instances["SliderC"] = [];
                        if (!window["lib"]["sliderCConfig"]) {
                            await import(/* webpackChunkName: "sliderCConfig" */ "@modules/sliders/slidersConfig").then(({ default: sliderCConfig }) => {
                                window["lib"]["sliderCConfig"] = sliderCConfig;
                            });
                        }
                        if (!window["lib"]["Slider"]) {
                            await import(/* webpackChunkName: "Slider" */ "@modules/sliders/Slider.js").then(({ default: Slider }) => {
                                window["lib"]["Slider"] = Slider;
                            });
                        }
                        this.instances["SliderC"][index] = new window["lib"]["Slider"]({
                            slider: slider,
                            controls: slider.nextElementSibling.querySelector(".js--slider-c-controls"),
                            config: sliderCConfig,
                            windowName: "SliderC",
                            index: index,
                        });
                        this.instances["SliderC"][index]?.isReady();
                    },
                });
            });
        }

        /**
         * Counter
         */
        if (document.querySelectorAll(".js--counter").length) {
            this.boostify.scroll({
                distance: 200,
                name: "counter",
                callback: () => {
                    this.instances["Counter"] = [];
                    import(/* webpackChunkName: "Counter" */ "@teamthunderfoot/counter-animation").then(({ default: Counter }) => {
                        document.querySelectorAll(".js--counter").forEach((element, index) => {
                            this.instances["Counter"][index] = new Counter({
                                element: element,
                                duration: 1.5,
                                ScrollStart: "top",
                                separator: ".",
                                regionFormat: "en-US",
                            });
                        });
                    });
                },
            });
        }
    }

    willReplaceContent() {
        super.willReplaceContent();

        if (document.querySelectorAll(".js--slider-a").length && this.instances["SliderA"].length) {
            document.querySelectorAll(".js--slider-a").forEach((slider, index) => {
                this.instances["SliderA"][index]?.destroy();
                this.boostify.destroyobserver({ element: slider });
            });
        }

        if (document.querySelectorAll(".js--slider-b").length && this.instances["SliderB"].length) {
            document.querySelectorAll(".js--slider-b").forEach((slider, index) => {
                this.instances["SliderB"][index]?.destroy();
                this.boostify.destroyobserver({ element: slider });
            });
        }

        if (document.querySelectorAll(".js--slider-c").length && this.instances["SliderC"].length) {
            document.querySelectorAll(".js--slider-c").forEach((slider, index) => {
                this.instances["SliderC"][index]?.destroy();
                this.boostify.destroyobserver({ element: slider });
            });
        }

        if (document.querySelectorAll(".js--counter").length && this.instances["Counter"].length) {
            document.querySelectorAll(".js--counter").forEach((element, index) => {
                this.instances["Counter"][index].destroy();
                this.boostify.destroyscroll({ distance: 300, name: "counter" });
            });
        }
    }
}

export default Main;
