<?php
$title = $module['title'];
$button = $module['button'];
$cta_artwork_wrapper_class = $background_color == 'gray' ? 'c--cta-a__artwork__wrapper c--cta-a__artwork__wrapper--second' : 'c--cta-a__artwork__wrapper';
include (locate_template('components/cta/cta-a.php', false, false));
?>