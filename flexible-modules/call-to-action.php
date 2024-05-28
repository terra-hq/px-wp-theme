<?php
$title = $module['title'];
$button = $module['button'];
$artwork_wrapper_item_custom_class = $background_color == 'gray' ? 'c--cta-a__artwork__wrapper__item--third' : '';
include (locate_template('components/cta/cta-a.php', false, false));
?>