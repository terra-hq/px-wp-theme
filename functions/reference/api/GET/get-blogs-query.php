<?php
add_action('wp_ajax_nopriv_load_more', 'load_more');
add_action('wp_ajax_load_more', 'load_more');

function load_more()
{
    ob_start();
    // validar
    $postType = stripslashes($_REQUEST['postType']);
    $postsPerPage = $_REQUEST['postPerPage'];
    $offset = $_REQUEST['offset'];
    $orderBy = $_REQUEST['orderBy'];
    $order = $_REQUEST['order'];
    $cardPath = $_REQUEST['cardPath'];
    $columns = $_REQUEST['columns'];
    $searchTerm = $_REQUEST['searchTerm'];
    $taxonomies = $_REQUEST['taxonomies'];

    global $my_query;
    $my_query = new WP_Query();

    $myArgs = array(
        'post_type' => explode(',', trim($postType, '"')),
        'offset' => $offset,
        'posts_per_page' => $postsPerPage,
        'orderby' => $orderBy,
        'order' => $order,
        's' => $searchTerm
    );

    if ($taxonomies && count($taxonomies) > 0) {
        $myArgs['tax_query'] = array(
            'relation' => 'AND',
        );

        foreach ($taxonomies as $tax) {
            $taxonomy = key($tax);
            $term = current($tax);

            $myArgs['tax_query'][] = array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $term
            );
        }
    }

    $my_query->query($myArgs);

    // THIS IS FOR POSTS COUNT, SO IT'S GENERIC. NEVERMIND IF IS FILTERED BY CATEGORY
    $myArgs['posts_per_page'] = -1;
    $myArgs['offset'] = 0;
    $posts_count = get_posts($myArgs);
    $published_posts = count($posts_count); ?>


    <?php while ($my_query->have_posts()):
        $my_query->the_post(); ?>
        <div class="f--col-<?php echo $columns ?>">
            <?php include locate_template($cardPath, false, false); ?>
        </div>
    <?php endwhile; ?>

    <!-- we end the main loop -->
    <?php wp_reset_postdata();

    $content = ob_get_contents();
    $response = array(
        'html' => $content,
        'postsTotal' => $published_posts,
    );
    ob_end_clean();

    echo json_encode($response);
    die();
}