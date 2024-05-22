import Core from "./Core";
import HoverCards from "./modules/hovercards/HoverCards";
import { sliderBConfig } from "@modules/sliders/slidersConfig";

class Main extends Core {
    constructor(payload) {
        super({
            blazy: {
                enable: true,
                selector: "g--lazy-01",
            },
            boostify : payload.boostify,

        });
    }

    async contentReplaced() {
        super.contentReplaced();

            const hoverCards = new HoverCards({
              cardSelector: '.c--card-b',
              activateBtnSelector: '.js--card-open',
              closeBtnSelector: '.js--card-close'
            });

           /**
         * SliderB
         * Dynamically import the SliderB config and the slider module and store them in the window.lib object for later use
         */
        var sliderBElements = document.querySelectorAll(".js--slider-b");
        if (sliderBElements.length) {
            sliderBElements.forEach((slider, index) => {
                this.boostify.observer({
                    options: {
                        root: null,
                        rootMargin: "400px", // check this with a created page layout
                        threshold: 0.5,
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
    }

    willReplaceContent() {
        super.willReplaceContent();
    }
}

export default Main;
