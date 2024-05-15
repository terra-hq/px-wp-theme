<?php
/**
 * Add LCP and large assets to header for preloading and performance improvement
 */

/**
 * Preload assets
 * Author: Terra
 */
function add_custom_preload_link() {
    // Call getImageURL() function to get the image URL
    $media = getBiggestMedia();
    // Check if image URL is available
    if ($media) {
        // Print preload link tag with obtained image URL
        echo '<link rel="preload" fetchpriority="high" as="'.$media['as'].'" href="' . $media['url'] . '" type="'. $media['type'].'">';
    }
}

function getBiggestMedia() {
    // WP_Query to get attachments for current post
    $query_images_args = array(
        'post_type'      => 'attachment',
        'post_parent'    => get_the_ID(),
        'post_mime_type' => 'image,video', // Include video files
        'post_status'    => 'inherit',
        'orderby'        => 'post_date',
        'posts_per_page' => -1,
    );
    $query_images = new WP_Query($query_images_args);
    // Check if attachments are found
    if ($query_images->have_posts()) {
        $max_file_size = 0;
        $max_file_image = '';
        $max_file_type = "image/webp";
        $max_file_as = "image";

        // Iterate over attachments
        while ($query_images->have_posts()) {
            $query_images->the_post();
            // Get file size of the image
            $file_path = get_attached_file(get_the_ID());
            $file_size = filesize($file_path);
            // Check if current file size is greater than the recorded maximum
            if ($file_size > $max_file_size) {
                $max_file_size = $file_size;
                $max_file_image = wp_get_attachment_url(get_the_ID());
                $max_file_type = mime_content_type($file_path);
                  if(str_contains($max_file_type, "video")){
                    $max_file_as = 'video';
                }
            }
        }
        // Reset postdata for main query
        wp_reset_postdata();
        
        // Check if an image with maximum size is found
        if (!empty($max_file_image)) {
            return ["url" => $max_file_image, "type" => $max_file_type , "as" => $max_file_as];
        }
    }
    // If no images are found or URL couldn't be obtained, return null
    return false;
}

// Add action to call add_custom_preload_link() function on wp_head hook
add_action('wp_head', 'add_custom_preload_link');
?>