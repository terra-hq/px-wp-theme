<?php

/**
 *  Localize script or Ajax Calls
 *  @author: Terra Dev
 */
function variables_in_header()
{ ?>
    <script nowprocket>
        var base_wp_api = <?php echo json_encode(
            array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'current_page_ID' => get_the_ID(),
                'root_url' => get_site_url(),
                'currentPage' => get_queried_object(),
                'theme_url' => get_template_directory_uri(),
                'is_mobile' => wp_is_mobile(),
                'is_author' => is_author(),
                'author_name' => get_the_author_meta('display_name'),
                'page_template' => get_page_template_slug(),
                'is_preview' => is_preview(),
                'tf_is_logged_in' => tf_is_logged_in()
            )
        ); ?>
    </script>
    <?php
}
add_action('wp_head', 'variables_in_header');

?>