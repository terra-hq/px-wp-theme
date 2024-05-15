<?php
/**
 * Generate Image TAG
 * Author: Guido
 */

/**
 * Generate an HTML image tag from ACF image field or featured image ID with dynamic attributes.
 *
 * @param mixed $image The ACF image array or featured image ID.
 * @param string $sizes The list of image sizes for the "sizes" attribute.
 * @param string $class The CSS class to apply to the image tag.
 * @param string $lazyClass The CSS lazy class to apply to the image tag.
 * @param boolean $isLazy Indicates whether to use lazy loading to load the image.
 * @param boolean $showAspectRatio If true, 'aspect-ratio' attribute will be added ad inline style.
 * @param boolean $decodingAsync Makes image decoding asynchronous and does not block the main thread.
 * @param boolean $fetchPriority To indicate that resource loading should be prioritized over others.
 * @param array $dataAttributes An associative array which includes data attribute name and value. For instance -> array('test' => '1') would be converted in data-test="1".
 * @param boolean $addFigcaption If true, the image HTML structure will be as follows -> <figure><img><figcaption></figcaption></figure>.
 * @param string $figureClass The CSS class to apply to the figure tag in case $addFigcaption attribute is set to true.
 * @return HTMLElement The generated image tag.
 */

// CALLING THE FUNCTION WITH THE WHOLE PARAMS:

// $image_tag_args = array(
//     'image' => get_field('image') || get_post_thumbnail_id(get_the_ID()),
//     'sizes' => '',
//     'class' => 'c--hero-f__media-wrapper__media',
//     'lazyClass' => 'g--lazy-01',
//     'isLazy' => true,
//     'showAspectRatio' => true,
//     'decodingAsync' => true,
//     'fetchPriority' => false,
//     'dataAttributes' => array(
//         'test' => '1',
//         'terra' => 'dev',
//     ),
//     'addFigcaption' => true,
//     'figureClass' => 'media-wrapper'
// );

// CALLING THE FUNCTION WITH THE SHORTEST VERSION:

// $image_tag_args = array(
//     'image' => get_field('image') || get_post_thumbnail_id(get_the_ID()),
//     'class' => 'c--hero-f__media-wrapper__media',
// );

// generate_image_tag($image_tag_args);

function generate_image_tag($payload)
{
    $defaults = array(
        'image' => null,
        'sizes' => '',
        'class' => '',
        'lazyClass' => 'g--lazy-01',
        'isLazy' => true,
        'showAspectRatio' => true,
        'decodingAsync' => true,
        'fetchPriority' => false,
        'dataAttributes' => false,
        'addFigcaption' => false,
        'figureClass' => 'media-wrapper'
    );

    $payload = wp_parse_args($payload, $defaults);

    $is_acf_array = is_array($payload['image']);

    if (!$is_acf_array) {
        $main_featured_image = wp_get_attachment_image_src($payload['image']);
        $main_featured_image_full = wp_get_attachment_image_src($payload['image'], 'full');
    }

    $url = $is_acf_array ? $payload['image']['url'] : $main_featured_image[0];
    $class = $payload['isLazy'] ? $payload['class'] . ' ' . $payload['lazyClass'] : $payload['class'];
    $is_svg = strtolower(pathinfo($url, PATHINFO_EXTENSION)) === 'svg';
    $alt_url = $is_acf_array ? $payload['image']['url'] : $main_featured_image_full[0];
    $caption = $is_acf_array ? $payload['image']['caption'] : wp_get_attachment_caption($payload['image']);
    $src = $payload['isLazy'] ? get_placeholder_image() : $url;
    $small = $is_acf_array ? $payload['image']['sizes']['thumbnail'] : wp_get_attachment_image_src($payload['image'], 'thumbnail')[0];
    $medium = $is_acf_array ? $payload['image']['sizes']['medium'] : wp_get_attachment_image_src($payload['image'], 'medium')[0];
    $large = $is_acf_array ? $payload['image']['sizes']['large'] : wp_get_attachment_image_src($payload['image'], 'large')[0];
    $tablets = $is_acf_array ? $payload['image']['sizes']['tablets'] : wp_get_attachment_image_src($payload['image'], 'tablets')[0];
    $mobile = $is_acf_array ? $payload['image']['sizes']['mobile'] : wp_get_attachment_image_src($payload['image'], 'mobile')[0];

    if ($is_svg) {
        $svg = simplexml_load_file($url);
        $viewBox = explode(" ", (string) $svg['viewBox']);
        $width = $viewBox[2];
        $height = $viewBox[3];
    } else {
        $width = $is_acf_array ? $payload['image']['width'] : $main_featured_image[1];
        $height = $is_acf_array ? $payload['image']['height'] : $main_featured_image[2];
    }

    $aspect_ratio = "$width / $height";

    switch ($payload['sizes']) {
        case 'large':
            $sizesResult = '100vw';
            break;
        case 'medium':
            $sizesResult = '(max-width: 810px) 95vw, 50vw';
            break;
        case 'small':
            $sizesResult = '(max-width: 810px) 95vw, 33vw';
            break;
        case '':
            $sizesResult = '95vw';
            echo "<p style='color: red'>Please, 'sizes' attribute is required for generate_image_tag.</p>";
            break;

        default:
            $sizesResult = $payload['sizes'];
            break;
    }

    $html = $payload['addFigcaption'] && $caption ? '<figure class="' . $payload['figureClass'] . '">' : '';

    if ($payload['showAspectRatio']) {
        $html .=
            '<img src="' . $src . '" alt="' . get_alt_image($alt_url) . '" width="' . $width . '" height="' . $height . '"
    style="aspect-ratio:' . $aspect_ratio . '" class="' . $class . '"';
    } else {
        $html .=
            '<img src="' . $src . '" alt="' . get_alt_image($alt_url) . '" width="' . $width . '" height="' . $height . '" class="' . $class . '"';

    }

    if (!$is_svg) {
        $html .= ' srcset="' . $url . ' ' . $width . 'w, ' . $large . ' 1024w, ' . $tablets . ' 810w, ' . $mobile . ' 580w, ' . $medium . ' 300w, ' . $small . ' 150w" sizes="' . $sizesResult . '"';
    }

    if ($payload['isLazy']) {
        $html .= ' data-src="' . $url . '"';
    }

    if ($payload['decodingAsync']) {
        $html .= ' decoding="async"';
    }

    if ($payload['fetchPriority']) {
        $html .= 'fetchpriority="high"';
    }

    if (is_array($payload['dataAttributes'])) {
        foreach ($payload['dataAttributes'] as $key => $value) {
            $html .= ' data-' . $key . '="' . $value . '"';
        }
    }

    $html .= '/>';

    if ($payload['addFigcaption'] && $caption) {
        $html .= '<figcaption>' . esc_html($caption) . '</figcaption></figure>';
    }

    echo $html;
}

/**END GENERATE IMAGE */
?>
