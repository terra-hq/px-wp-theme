import gsap from "gsap";
import In from "./In";
import Out from "./Out";
import { checkItems } from "./utilities";
const transitionOptions = [
    {
        from: "(.*)",
        to: "(.*)",

        in: async (next, infos) => {
            
            if (!window["lib"]["preloadImages"]) {
                const { preloadImages } = await import(/* webpackChunkName: "preloadImages" */ "@terrahq/helpers/preloadImages");
                window["lib"]["preloadImages"] = preloadImages;
                await preloadImages("img");
            } else {
                await window["lib"]["preloadImages"]("img");
            }

            var tl = gsap.timeline({
                onComplete: next,
            });

            await checkItems({
                items: [
                    { class: "js--slider-a", windowName: "SliderA" },
                    { class: "js--slider-b", windowName: "SliderB" },
                    { class: "js--slider-c", windowName: "SliderC" },
                ],
                frequency: 200,
            });

            const transitionItems = document.querySelectorAll(".js--transition>span");
            tl.add(new In({ elements: transitionItems }));
        },

        out: (next, infos) => {
            var tl = gsap.timeline({
                onComplete: next,
            });

            const transitionItems = document.querySelectorAll(".js--transition>span");
            tl.add(new Out({ elements: transitionItems }));
        },
    },
];

export { transitionOptions };
