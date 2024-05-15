import Core from "./Core";

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
    }

    willReplaceContent() {
        super.willReplaceContent();
    }
}

export default Main;
