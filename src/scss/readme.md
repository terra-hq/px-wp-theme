# SCSS Folder Structure

- fonts - Place to drop fonts divided by font type.
- framework - Will have to include all project assets, inside we have the following configuration.
    - mixins -> include all mixins for components & foundation
    - vars -> global variables for entire project
    - backend -> specific files for wp-admin pages.
    - componentes -> DS components, such as navbar,footer, hero,cards, etc.
    - foundation -> colors,fonts,space, grid, etc.
    - utilities -> float, align-items, layout,position,etc.



### Examples: @scss alias
```sh
/**
    DS
 */
/* Reset + Foundation + Utilities */
import '@scss/framework/foundation/reset';
import '@scss/framework/foundation/foundation';
import '@scss/framework/utilities/utilities';

/* section & bt */
import '@scss/framework/components/section/b--section-a';
import '@scss/framework/components/section/b--section-a';
import '@scss/framework/components/section/b--section-a';

import '@scss/framework/components/block-text/b--bt-a';
import '@scss/framework/components/block-text/b--bt-b';
import '@scss/framework/components/block-text/b--bt-c';

/* images */
background-image: url("@img/TeamBg/bg-purple.jpg");
@img comes from src/img
```
> note:always inside js