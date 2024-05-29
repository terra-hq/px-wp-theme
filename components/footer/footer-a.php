<?php
$footer_title = get_field('footer_title', 'option');
$copyright = get_field('footer_copyright', 'option');
$footer_privacy_policy = get_field('footer_privacy_policy', 'option');
$footer_linkedin_url = get_field('footer_linkedin_url', 'option');
$footer_nav = get_field('footer_nav', 'option');
?>

<section class="c--footer-a">
    <div class="f--container">
        <div class="c--footer-a__wrapper">
            <div class="c--footer-a__wrapper__item-left">
                <h4 class="c--footer-a__wrapper__item-left__title">
                    <?php
                    foreach ($footer_title as $key => $title) {
                        if ($title['is_highlighted']) { ?>
                            <span class="c--footer-a__wrapper__item-left__title__ft"><?= $title['text'] ?></span>
                        <?php } else {
                            echo $title['text'];
                        }
                    }
                    ?>
                </h4>
                <ul class="c--footer-a__wrapper__item-left__list-group">
                    <?php foreach ($footer_nav as $nav): ?>
                        <li class="c--footer-a__wrapper__item-left__list-group__list-item">
                            <?php
                            $link = $nav['link'];
                            ?>
                            <a href="<?= $link['url'] ?>" <?= get_target_link($link['target'], $link['title']) ?>
                                class="c--footer-a__wrapper__item-left__list-group__list-item__link"><?= $link['title'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <ul class="c--footer-a__wrapper__item-left__list-group">
                    <li class="c--footer-a__wrapper__item-left__list-group__list-item">
                        <?= $copyright; ?>
                    </li>
                    <span class="c--footer-a__wrapper__item-left__list-group__dash"></span>
                    <li class="c--footer-a__wrapper__item-left__list-group__list-item">
                        <a href="<?= $footer_privacy_policy['url'] ?>"
                            <?= get_target_link($footer_privacy_policy['target'], $footer_privacy_policy['title']) ?>
                            class="c--footer-a__wrapper__item-left__list-group__list-item__link"><?= $footer_privacy_policy['title'] ?>
                        </a>
                    </li>
                    <span class="c--footer-a__wrapper__item-left__list-group__dash"></span>
                    <li class="c--footer-a__wrapper__item-left__list-group__list-item">
                        <a href="<?= $footer_linkedin_url ?>" target="_blank"
                            class="c--footer-a__wrapper__item-left__list-group__list-item__link">
                            LINKEDIN
                        </a>
                    </li>
                </ul>
            </div>

            <div class="c--footer-a__wrapper__item-right">
                <!-- sizes= "(max-width: 810px) 50vw, 33vw" --> 
                <img class="c--footer-a__wrapper__item-right__media"
                    src="<?= get_template_directory_uri() . "/assets/frontend/footer-bg.webp" ?>" alt="footer media">
            </div>
        </div>
    </div>
</section>