<?php
$headerItems = get_field('nav_children', 'option');
$file = 'assets/frontend/logos/castle_logo_header.svg';
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
                                src=<?=get_template_directory_uri() . "/assets/frontend/logos/castle_logo_header.svg" ?>
                                data-src=<?= get_template_directory_uri() . "/assets/frontend/logos/castle_logo_header.svg" ?>
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
                            <div class="c--nav-a__wrapper js--mobile-nav">
                                <ul class="c--nav-a__wrapper__list-group">
                                    <li class="c--nav-a__wrapper__list-group__item">
                                        <a class="c--nav-a__wrapper__list-group__item__link" href="#">Investments</a>
                                    </li>
                                    <li class="c--nav-a__wrapper__list-group__item">
                                        <a class="c--nav-a__wrapper__list-group__item__link" href="#">About</a>
                                    </li>
                                    <li class="c--nav-a__wrapper__list-group__item">
                                        <a class="c--nav-a__wrapper__list-group__item__link"
                                            href="#">CEO-in-residence</a>
                                    </li>
                                    <li class="c--nav-a__wrapper__list-group__item">
                                        <a class="c--nav-a__wrapper__list-group__item__link" href="#">Contact</a>
                                    </li>
                                </ul>

                                <div class="c--nav-a__wrapper__artwork">
                                    <img class="c--nav-a__wrapper__artwork__media"
                                        src=<?=get_template_directory_uri() . "/assets/frontend/logos/castle-fig.png" ?>
                                        data-src=<?= get_template_directory_uri() . "/assets/frontend/logos/castle-fig.png" ?>
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