<?php

$title = "Why Castle Holdings?";
$paragraph = "We want what’s best for our clients, which is why we go above and beyond the competition.";

//Al final Olaia quiere que sea una lista de elemntos y no un content para poder dar estilo a los bullet points
$cards = array(
    array(
        "title" => "What Others Offer",
        "list" => array(
            "Element 1",
            "Element 2",
            "Element 3",
        ),
    ),
    array(
        "title" => "What Castle Offers",
        "list" => array(
            "A genuine understanding and  respect of what makes your business unique",
            "Element 2",
            "Element 3",
            "Element 4",
        ),
    )
);

$spacing = "f--section-b"; //Cambiar a sección dinámica: get_spacing($module['section_spacing']);

?>

<section class="<?= $spacing ?> f--background-d">
    <div class="f--container">
        <div class="f--row f--mb-10 f--mb-tablets-4">
            <div class="f--col-12">
                <h2 class="f--font-a">
                    <?= $title ?>
                </h2>
            </div>
        </div>
        <div class="f--row f--gap-a">
            <div class="f--col-4 f--col-tabletl-12 f--mb-2">
            <p class="f--font-d f--pr-7 f--pre-tabletm-0">
                <?= $paragraph ?>
            </p>
            </div>
            <?php foreach ($cards as $index => $card) : ?>
                <div class="f--col-4 f--col-tabletl-6 f--col-tablets-12 u--display-flex 
                    <?= ($index === count($cards) - 1) ? '' : 'f--mb-tablets-2' ?>"
                >
                    <?php
                    $variant = ($index % 2 == 0) ? null : 'second';
                    include (locate_template('components/card/card-e.php', false, false));
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>



