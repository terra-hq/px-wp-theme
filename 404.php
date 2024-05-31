<?php get_header(); ?>
<section class="g--404-01">
    <div class="g--404-01__wrapper">
        <div class="g--404-01__wrapper__content">
            <div class="g--404-01__wrapper__content__media-wrapper">
                <img
                    width="154" height="120"
                    style="aspect-ratio: 154 / 120"
                    decoding="async"
                    src="<?php bloginfo('template_url'); ?>/assets/frontend/PX_404-animation.gif"
                    data-src="<?php bloginfo('template_url'); ?>/assets/frontend/PX_404-animation.gif" 
                    alt="404 image"
                    class="g--lazy-01"
                >
            </div>
            <h1 class="g--404-01__wrapper__content__item-primary">Page not found</h1>
            <p class="g--404-01__wrapper__content__item-secondary">The page you are looking for might have been removed,
                had its name changed or is temporarily unavailable.</p>
            <div class="g--404-01__wrapper__content__list-group">
                <a href="#" class="g--404-01__wrapper__content__list-group__item">BACK HOME</a>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>