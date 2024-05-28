const sliderAConfig = {
    loop: true,
    items: 1,
    gutter: 32,
    slideBy: 1,
    controls: true,
    nav: false,
    rewind: false,
    swipeAngle: 60,
    lazyload: true,
    autoplay: false,
    mouseDrag: true,
    autoplayButtonOutput: false,
    speed: 1000,
    autoplayTimeout: 6000,
    preventActionWhenRunning: true,
    preventScrollOnTouch: "auto",
    touch: false,
    responsive: {
        580: {
            items: 1
        },
        1024: {
            items: 1
        }    
    }
};


const sliderBConfig = {
    loop: false,
    items: 1,
    gutter: 32,
    slideBy: 1,
    controls: true,
    nav: false,
    rewind: false,
    swipeAngle: 60,
    lazyload: false,
    autoplay: false,
    mouseDrag: true,
    autoplayButtonOutput: false,
    speed: 1000,
    autoplayTimeout: 6000,
    preventActionWhenRunning: true,
    preventScrollOnTouch: "auto",
    touch: false,
    responsive: {
        810: {
            items: 2
        },
        1024: {
            items: 3
        },
        1570: {
            items: 4
        }    
    }
};
const sliderCConfig = {
    loop: false,
    items: 1,
    gutter: 32,
    slideBy: 1,
    controls: true,
    nav: false,
    rewind: false,
    swipeAngle: 60,
    lazyload: false,
    autoplay: false,
    mouseDrag: true,
    autoplayButtonOutput: false,
    speed: 1000,
    autoplayTimeout: 6000,
    preventActionWhenRunning: true,
    preventScrollOnTouch: "auto",
    touch: false,
    responsive: {
        810: {
            items: 2
        },
        1300: {
            items: 3
        }    
    }
};
export { sliderAConfig };
export { sliderBConfig };
export { sliderCConfig };