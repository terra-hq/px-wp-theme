<?php

add_action('acf/init', 'register_callout_block');
function register_callout_block()
{
    // check function exists.
    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(
            array(
                'name' => 'callout_block',
                'title' => __('Custom Callout'),
                'description' => __('A Custom Callout'),
                'render_callback' => 'acf_block_callout_block',
                'category' => 'layout',
                'icon' => 'megaphone',
                'keywords' => array('Callout'),
            )
        );
    }
}

function acf_block_callout_block($block, $content = '', $is_preview = false, $post_id = 0)
{
    if (is_preview()) {
        $callout_title = $block['data']['callout_title'];
    } else {
        $callout_title = get_field('callout_title');
    }
    ?>

    <div class="callout">
        <h3>
            <?= $callout_title ?>
        </h3>
    </div>
    <?php
}


if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(
        array(
            'key' => 'group_5ecce1b657123',
            'title' => 'Callout',
            'fields' => array(
                array(
                    'key' => 'field_5ecce2ec5612',
                    'label' => 'Callout Title',
                    'name' => 'callout_title',
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
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/callout-block',
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
        )
    );

endif;

?>