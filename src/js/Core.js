import Swup from "swup";
import SwupHeadPlugin from "@swup/head-plugin";
import SwupDebugPlugin from "@swup/debug-plugin";
import SwupScriptsPlugin from "@swup/scripts-plugin";
import SwupJsPlugin from "@swup/js-plugin";

import { transitionOptions } from "@modules/motion/transition/index";

import Blazy from "blazy";

class Core {
    constructor(payload) {
        this.swup = new Swup({
            linkSelector: "a[href]:not([href$='.pdf']), area[href], svg a[*|href]",
            plugins: [
                 new SwupHeadPlugin({persistAssets: true}),
                new SwupScriptsPlugin({
                    head: true,
                    body: true,
                }),
                new SwupDebugPlugin({
                    globalInstance: true,
                }),
                new SwupJsPlugin(transitionOptions),
            ],
        });

        this.isBlazy = payload.blazy;
        this.boostify = payload.boostify;
        this.instances = [];

        /*
        * The contentReplaced function needs to be invoked during page transitions. Therefore, it's crucial to distinguish between the initial page load and subsequent transitions. 
        * At times, specific actions are required only during the initial load, while in other cases, functions need to be executed at particular stages during transitions.
        */
        this.firstLoad = true;

        this.init();
        this.events();
    }

    async init() {  }

    events() {
        if (document.readyState === "complete" || (document.readyState !== "loading" && !document.documentElement.doScroll)) {
            this.contentReplaced();
        } else {
            document.addEventListener("DOMContentLoaded", () => {
                this.contentReplaced();
            });
        }
        this.swup.hooks.on("content:replace", () => {
            this.contentReplaced();
        });

        this.swup.hooks.before("content:replace", () => {
            this.willReplaceContent();
        });
    }

    contentReplaced() {
        if (this.isBlazy.enable) {
            var lazySelector = this.isBlazy.selector ? this.isBlazy.selector : "g--lazy-01";
            this.instances["Blazy"] = new Blazy({
                selector: "." + lazySelector,
                successClass: `${lazySelector}--is-loaded`,
                errorClass: `${lazySelector}--is-error`,
                loadInvisible: true,
            });
        }

        this.firstLoad = false;
    }

    willReplaceContent() {
        if (this.isBlazy) {
            if (this.instances["Blazy"]) {
                this.instances["Blazy"].destroy();
            }
        }
    }
}

export default Core;
