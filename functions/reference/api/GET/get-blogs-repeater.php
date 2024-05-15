<?php
add_action('wp_ajax_nopriv_load_repeater', 'load_repeater');
add_action('wp_ajax_load_repeater', 'load_repeater');

function load_repeater()
{
    ob_start();
    $repeater = get_field($_REQUEST['repeater'], $_REQUEST['pageId']);
    $offset = $_REQUEST['offset'];
    $postsPerPage = $_REQUEST['postPerPage'];
    $cardPath = $_REQUEST['cardPath'];
    $columns = $_REQUEST['columns'];

    if ($repeater) {
        $rendered_repeater = array_slice($repeater, $offset, $postsPerPage);

        foreach ($rendered_repeater as $post) {
            $title = $post['title'];
            $subtitle = $post['subtitle'];
            $image = $post['image']; ?>
            <div class="f--col-<?php echo $columns ?>">
                <?php include locate_template($cardPath, false, false); ?>
            </div>

        <?php }
        wp_reset_postdata();
    }
    $content = ob_get_contents();
    $response = array(
        'html' => $content,
    );
    ob_end_clean();

    echo json_encode($response);
    die();
}
?>