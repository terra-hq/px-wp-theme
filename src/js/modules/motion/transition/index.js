import gsap from "gsap";
//import { preloadImages, preloadLotties } from "@terrahq/helpers/preload";
import In from "./In";
import Out from "./Out";
import { checkItems } from "./utilities";
const transitionOptions = [
    {
        from: "(.*)",
        to: "(.*)",

        in: async (next, infos) => {
            // await preloadImages("img");
            // await preloadLotties();
            var tl = gsap.timeline({
                onComplete: next,
            });

            // This is an example, please check the items that are available in each project
            await checkItems({
                items: [
                    { class: "js--slider-a", windowName: "SliderA" },
                    { class: "js--slider-b", windowName: "SliderB" },
                    { class: "js--slider-c", windowName: "SliderC" },
                ],
                frequency: 200,
            });

            tl.add(new In());
        },

        out: (next, infos) => {
            var tl = gsap.timeline({
                onComplete: next,
            });

            tl.add(new Out());
        },
    },
];

export { transitionOptions };
