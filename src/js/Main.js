import Core from "./Core";
import HoverCards from "./modules/hovercards/HoverCards";

class Main extends Core {
    constructor() {
        super({
            blazy: {
                enable: true,
                selector: "g--lazy-01",
            },
            form7: {
                enable: true,
            },
        });
    }

    async contentReplaced() {
        super.contentReplaced();

            const hoverCards = new HoverCards({
              cardSelector: '.c--card-b',
              activateBtnSelector: '.js--card-open',
              closeBtnSelector: '.js--card-close'
            });

    }

    willReplaceContent() {
        super.willReplaceContent();
    }
}

export default Main;
