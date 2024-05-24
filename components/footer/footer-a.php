<?php
    $title = "Investment. Growth. Partnership.";
    //El siguiente código se encarga de resaltar la última palabra del título
    $titleWords = explode(' ', $title);
    $titleFormatted = implode(' ', array_slice($titleWords, 0, -1)) . ' <span class="c--footer-a__wrapper__item-left__title__ft">' . end($titleWords) . '</span>';

    $footerNav = [
        ['Investments', '#'],
        ['About', '#'],
        ['CEO-in-Residence', '#'],
        ['Contact', '#'],
    ];

    $copyright = "© 2024 CASTLE HOLDINGS, LTD";

    $privacyPolicy = ['Privacy Policy', '#'];

    $socialMedia = ['LinkedIn', '#'];

?>

<section class="c--footer-a">
    <div class="f--container">
        <div class="c--footer-a__wrapper">
            <div class="c--footer-a__wrapper__item-left">
                <h4 class="c--footer-a__wrapper__item-left__title">
                    <?= $titleFormatted; ?>
                </h4>
                <ul class="c--footer-a__wrapper__item-left__list-group">
                    <?php foreach ($footerNav as $nav) : ?>
                        <li class="c--footer-a__wrapper__item-left__list-group__list-item">
                            <a href="<?= $nav[1] ?>" class="c--footer-a__wrapper__item-left__list-group__list-item__link">
                                <?= $nav[0]; ?>
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
                        <a href="<?= $privacyPolicy[1] ?>" class="c--footer-a__wrapper__item-left__list-group__list-item__link">
                            <?= $privacyPolicy[0]; ?>
                        </a>
                    </li>
                    <span class="c--footer-a__wrapper__item-left__list-group__dash"></span>
                    <li class="c--footer-a__wrapper__item-left__list-group__list-item">
                        <a href="<?= $socialMedia[1] ?>" class="c--footer-a__wrapper__item-left__list-group__list-item__link">
                            <?= $socialMedia[0]; ?>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="c--footer-a__wrapper__item-right">
                <img
                    class="c--footer-a__wrapper__item-right__media"
                    src="<?=get_template_directory_uri() . "/assets/frontend/footer-bg.webp" ?>" 
                    alt="footer media"
                >
            </div>
        </div>
    </div>
</section>