<?php
$headerItems = get_field('nav_children', 'option');
$file = 'assets/frontend/logos/castle_logo_header.webp';
?>

<header class="c--header-a">
        <div class="f--container">
            <div class="f--row">
                <div class="f--col-12">

                <div class="c--header-a__wrapper">
                    <div class="c--header-a__wrapper__hd">
                        <a href="<?php echo get_site_url(); ?>" class="c--header-a__wrapper__hd__link"
                            aria-label="Go to Homepage">
                            <img class="c--header-a__wrapper__hd__link__media" width=198 height=21
                                style="aspect-ratio: 66 / 7"
                                src=<?=get_template_directory_uri() . "/assets/frontend/logos/castle_logo_header.webp" ?>
                                data-src=<?= get_template_directory_uri() . "/assets/frontend/logos/castle_logo_header.webp" ?>
                                alt="header-logo" decoding="async">
                        </a>
                    </div>

                    <div class="c--header-a__wrapper__bd">
                        <nav class="c--nav-a">
                            <button class="c--burger-a js--burger" aria-label="burger menu">
                                <span class="c--burger-a__dash"></span>
                                <span class="c--burger-a__dash"></span>
                                <span class="c--burger-a__dash"></span>
                            </button>
                            <ul class="c--nav-a__list-group js--mobile-nav">
                                <li class="c--nav-a__list-group__item">
                                    <a class="c--nav-a__list-group__item__link" href="#">Investments</a>
                                </li>
                                <li class="c--nav-a__list-group__item">
                                    <a class="c--nav-a__list-group__item__link" href="#">About</a>
                                </li>
                                <li class="c--nav-a__list-group__item">
                                    <a class="c--nav-a__list-group__item__link" href="#">CEO-in-residence</a>
                                </li>
                                <li class="c--nav-a__list-group__item">
                                    <a class="c--nav-a__list-group__item__link" href="#">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>