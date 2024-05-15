<?php

add_action('acf/init', 'register_quote_block');
function register_quote_block()
{
    // check function exists.
    if (function_exists('acf_register_block_type')) {

        // register an cta block.
        acf_register_block_type(array(
            'name' => 'quote_block', // slug
            'title' => __('Custom Quote'),
            'description' => __('A Custom Quote Post'),
            'render_callback' => 'acf_block_quote_block',
            'category' => 'layout',
            'icon' => 'editor-italic',
            'keywords' => array('quote custom'),
        ));
    }
}

function acf_block_quote_block($block, $content = '', $is_preview = false, $post_id = 0)
{
    if (is_preview()) {
        $cta = $block['data']['quote'];
    } else {
        $quoteTitle = get_field('quote_title');
        $quoteName = get_field('quote_name');
    }
    ?>

    <div class="c--block-quote-a">
        <?php if ($quoteTitle) { ?>
            <p class="c--block-quote-a__title">
                <?= $quoteTitle; ?>
            </p>
        <?php } ?>
        <?php if ($quoteName) { ?>
            <p class="c--block-quote-a__author">
                <?= $quoteName; ?>
            </p>
        <?php } ?>
    </div>

    <?php
}


if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_5ecce1b6571hy',
        'title' => 'Quote',
        'fields' => array(
            array(
                'key' => 'field_5ecce2ec5cfu',
                'label' => 'Quote Title',
                'name' => 'quote_title',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_5ecce2ec5cf2',
                'label' => 'Quote Nae',
                'name' => 'quote_name',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/quote-block',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;

?>