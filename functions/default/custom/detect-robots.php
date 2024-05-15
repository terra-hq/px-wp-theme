<?php 

/**
 * Detect Robots Checkbox
 * Author: Guido
 */

/** START DETECT ROBOT CRONJOB */
add_filter('cron_schedules', 'isa_execute_every_thirty_minutes');
function isa_execute_every_thirty_minutes($schedules)
{
    $schedules['every_thirty_minutes'] = array(
        'interval' => 1800,
        'display' => __('Every 30 Minutes', 'textdomain')
    );
    return $schedules;
}

if (!wp_next_scheduled('isa_execute_every_thirty_minutes')) {
    wp_schedule_event(time(), 'every_thirty_minutes', 'isa_execute_every_thirty_minutes');
}

add_action('isa_execute_every_thirty_minutes', 'detect_robot_cb');

function detect_robot_cb()
{
    $home_url = home_url();
    $parsed_url = parse_url($home_url);
    $base_url = $parsed_url['scheme'] . '://' . $parsed_url['host'];
    $site_indexed = get_option('blog_public');

    if (!$site_indexed && PROD_URL === $base_url) {
        update_option('blog_public', 1);
        send_email();
    } else if ($site_indexed && PROD_URL !== $base_url) {
        update_option('blog_public', 0);
    }
}

function send_email()
{
    $to = 'maria@teamthunderfoot.com';
    $subject = 'ALERT: website not indexed';
    $message = 'The website was not indexed. It has been fixed and now it is working as expected';
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
    );

    wp_mail($to, $subject, $message, $headers);
}

/**END CRONJOB DETECT ROBOT */

?>