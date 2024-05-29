<?php switch ($module['acf_fc_layout']) {
    case 'bricks_wall':
        include (locate_template('flexible-modules/bricks-wall.php', false, false));
        break;
    case 'call_to_action':
        include (locate_template('flexible-modules/call-to-action.php', false, false));
        break;
    case 'center_text_button':
        include (locate_template('flexible-modules/center-text-button.php', false, false));
        break;
    case 'short_hero':
        include (locate_template('flexible-modules/short-hero.php', false, false));
        break;
    case 'small_heading':
        include (locate_template('flexible-modules/small-heading.php', false, false));
        break;
    case 'stats':
        include (locate_template('flexible-modules/stats.php', false, false));
        break;
    case 'testimonials':
        include (locate_template('flexible-modules/testimonials.php', false, false));
        break;
} ?>