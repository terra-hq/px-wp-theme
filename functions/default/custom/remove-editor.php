<?php
function remove_editor()
{
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        $post = get_post($id);
        switch ($template) {
            case 'page-modules.php':
                remove_post_type_support('page', 'editor');
                break;
            default:
                break;
        }
        remove_post_type_support('page', 'thumbnail');
    }
}
add_action('init', 'remove_editor');
?>