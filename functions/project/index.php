<?php

/**
 *  
 *  @author: Andres
 */
function terra_setup()
{
    
    add_theme_support('post-thumbnails');
    add_image_size('category_thumb', 300);
    add_image_size('tablets', 810, 999999999);
    add_image_size('tabletm', 1024, 999999999);
    add_image_size('tabletl', 1300, 999999999);
    add_image_size('mobile', 580, 999999999);



    remove_role( 'wpseo_manager' );
    remove_role( 'wpseo_editor' );
    remove_role( 'subscriber' );
    remove_role( 'author' );
    remove_role( 'contributor' );
}
add_action('init', 'terra_setup');


//hide posts
function post_remove()
{
    remove_menu_page('edit.php');
}

add_action('admin_menu', 'post_remove');



// AMDMIN PAGE OPTIONS 
// IMPORTANT TO HAVE IT
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'General Options',
		'menu_title'	=> 'General Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
    ));
}
?>
