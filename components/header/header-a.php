<header class="c--header-a">
    <div class="f--container">
        <div class="f--row">
            <div class="f--col-12">

                <div class="c--header-a__wrapper">
                    <div class="c--header-a__wrapper__hd">
                        <a href="<?php echo get_site_url(); ?>" class="c--header-a__wrapper__hd__link"
                            aria-label="Go to Homepage">
                            <?php
                            $image_tag_args = array(
                                'image' => get_field('header_logo', 'option'),
                                'class' => 'c--header-a__wrapper__hd__link__media',
                                'isLazy' => false
                            );
                            generate_image_tag($image_tag_args);
                            ?>
                        </a>
                    </div>

                    <div class="c--header-a__wrapper__bd">
                        <nav class="c--nav-a">
                            <button class="c--burger-a js--burger" aria-label="burger menu">
                                <span class="c--burger-a__dash"></span>
                                <span class="c--burger-a__dash"></span>
                                <span class="c--burger-a__dash"></span>
                            </button>
                            <div class="c--nav-a__wrapper js--mobile-nav">
                                <?php
                                $menu_items = wp_get_nav_menu_items('navbar');

                                if ($menu_items) {
                                    echo '<ul class="c--nav-a__wrapper__list-group">';
                                    foreach ($menu_items as $menu_item) {
                                        echo '<li class="c--nav-a__wrapper__list-group__item">';
                                        echo '<a href="' . $menu_item->url . '" class="c--nav-a__wrapper__list-group__item__link">' . $menu_item->title . '</a>';
                                        echo '</li>';
                                    }
                                    echo '</ul>';
                                }
                                ?>

                                <div class="c--nav-a__wrapper__artwork">
                                    <img class="c--nav-a__wrapper__artwork__media"
                                        src="<?= get_template_directory_uri() . "/assets/frontend/logos/castle-fig.png" ?>"
                                        data-src="<?= get_template_directory_uri() . "/assets/frontend/logos/castle-fig.png" ?>"
                                        alt="header-logo" decoding="async">
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>