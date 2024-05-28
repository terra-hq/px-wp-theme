<?php
$title = $module['title'];
$button = $module['button'];
$bg_item_custom_class = $background_color == 'gray' ? 'c--cta-a__bg-items__item--second' : '';
include (locate_template('components/cta/cta-a.php', false, false));
?>