<?php

/**
 * NEEDED For Detect Robots function
 */
if(!defined('PROD_URL')){
    echo "Please define the PROD_URL in local-variable.php";
    die();
}

/**
 * NEEDED to get the Links with Target, aria-label and contenct
 */
if(!function_exists("get_target_link")){
    echo "Please create the get_target_link function.";
    die();
}

/**
 * NEEDED to get the ALT for the image
 */
if(!function_exists("get_alt_image")){
    echo "Please create the get_alt_image function.";
    die();
}

/**
 * NEEDED to get the Links with Target, aria-label and contenct
 */
if(!function_exists("generate_image_tag")){
    echo "Please create the generate_image_tag function.";
    die();
}


?>