<?php
add_action('wp_ajax_nopriv_load_tab', 'load_tab');
add_action('wp_ajax_load_tab', 'load_tab');

function load_tab()
{
    ob_start();

    $page_id = $_REQUEST['pageId'];
    $repeater = $_REQUEST['repeater'];
    $item_Id = $_REQUEST['itemId'];
    $repeater_item = get_field($repeater, $page_id)[$item_Id];
    $tabPath = $_REQUEST['tabPath'];

    if ($repeater_item) {
        include locate_template($tabPath, false, false);
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