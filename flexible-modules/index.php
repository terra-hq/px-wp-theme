<?php switch ($module['acf_fc_layout']) {
    case 'center_text_button':
        include (locate_template('flexible-modules/center-text-button.php', false, false));
        break;
    case 'stats':
        include (locate_template('flexible-modules/stats.php', false, false));
        break;
    case 'small_heading':
        include (locate_template('flexible-modules/small-heading.php', false, false));
        break;
} ?>