<?php

/**
 *  Custom Headings for Editor
 *  @author: Team Thunderfoot
 */
function remove_headings_from_editor($settings)
{
    $settings['block_formats'] = 'Paragraph=p; Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre;';
    return $settings;
}
add_filter('tiny_mce_before_init', 'remove_headings_from_editor');

?>