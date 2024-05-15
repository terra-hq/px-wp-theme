<?php


/**
 * Generate taxonomy dropdown.
 */
function generate_taxonomy_dropdown($taxonomy, $taxonomySlug, $class)
{
    $terms = get_terms(
        array(
            'taxonomy' => $taxonomy,
            'hide_empty' => true,
        )
    );

    $html = '<select data-taxonomy="' . $taxonomy . '" data-taxonomy-slug="' . $taxonomySlug . '" class="' . $class . '">
            <option value="all">Select ' . $taxonomySlug . '...</option>';

    foreach ($terms as $term) {
        $selected = $term->slug === htmlspecialchars($_GET[$taxonomySlug]) ? 'selected' : '';
        $html .= '<option value="' . $term->slug . '" ' . $selected . '>' . $term->name . '</option>';
    }

    $html .= '</select>';

    echo $html;

}

/**END Generate taxonomy dropdown */

?>