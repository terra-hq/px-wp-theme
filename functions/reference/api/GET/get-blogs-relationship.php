<?php
add_action('wp_ajax_nopriv_load_relationship', 'load_relationship');
add_action('wp_ajax_load_relationship', 'load_relationship');

function load_relationship()
{
    ob_start();
    $relationshipName = $_REQUEST['relationship'];
    $relationship = get_field($relationshipName, $_REQUEST['pageId']);
    $offset = $_REQUEST['offset'];
    $postsPerPage = $_REQUEST['postPerPage'];
    $cardPath = $_REQUEST['cardPath'];
    $columns = $_REQUEST['columns'];
    $taxonomies = $_REQUEST['taxonomies'];

    if ($relationship) {
        if ($taxonomies && count($taxonomies) > 0) {
            $relationship = array_filter($relationship, function ($post) use ($taxonomies) {
                foreach ($taxonomies as $taxonomy) {
                    $taxonomy_name = key($taxonomy);
                    $taxonomy_value = current($taxonomy);

                    if (!has_term($taxonomy_value, $taxonomy_name, $post)) {
                        return false;
                    }
                }
                return true;
            });
        }

        $published_posts = count($relationship);
        $rendered_relationship = array_slice($relationship, $offset, $postsPerPage);

        foreach ($rendered_relationship as $post) {
            setup_postdata($post); ?>
            <div class="f--col-<?php echo $columns ?>">
                <?php include locate_template($cardPath, false, false); ?>
            </div>

        <?php }
        wp_reset_postdata();
    }
    $content = ob_get_contents();
    $response = array(
        'html' => $content,
        'postsTotal' => $published_posts,
    );
    ob_end_clean();

    echo json_encode($response);
    die();
}
?>