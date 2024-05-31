<?php
/*
Template Name: Contact
*/
?>

<?php get_header() ?>

<h2><?= get_field('title') ?></h2>
<p><?= get_field('subtitle') ?></p>
<?php
$image_tag_args = array(
    'image' => get_field('image'),
    'class' => '',
    'sizes' => ''
);
generate_image_tag($image_tag_args);
?>
<div class="c--form-a">
    <div class="c--form-a__bd">
        <?php echo do_shortcode('[contact-form-7 id="1ef0c76" title="Contact Form"]') ?>
    </div>
</div>

<?php get_footer() ?>