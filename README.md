# wp-px
This is a example of a wordpress project

# This project uses SWUP
Please be sure that you are using SWUP on this project. In case that SWUP is not needed, you should follow some steps:
- Delete all pacakges related to swup in pakage.json
- Delete Main.js and Core.js, you are going to use an entry for each page.
- Delete modules/motion/transition folder. We dont need a transition between pages.
- In header.php remove the id="swup" in main.

# JS folder structure!

- entries -> consumed by webpack common
- modules -> Introduced all modules that live inside the project.(note that there inside this folder there is a "dynamic" folder for all dynamic imports.)
- services -> all the services that must be provided, divided into GET and POST.
- utilities -> for things not 100% related to the project
- vue -> for vue files


### Use of alias

Examples: Use of alias @js
```sh
// VUE instance
import Vue from 'vue';
import HomeVue from '@js/vue/Home.vue'; 
new Vue({
    el: '#front-vue',
    render: h => h(HomeVue),
});
```
