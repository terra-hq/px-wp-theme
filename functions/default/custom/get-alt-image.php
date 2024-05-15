<?php


/**
 *  RETURNS THE ALT NAME OF AN IMAGE
 *  IF NO ALT, RETURNS THE FILENAME
 *  @author: Nerea
 */
function get_alt_image($imageUrl)
{
    $attach_id = attachment_url_to_postid($imageUrl);
    $altImg = get_post_meta($attach_id, '_wp_attachment_image_alt', true);
    $filename = basename(get_attached_file($attach_id));
    $filename = explode('.', $filename);
    return ($altImg) ? $altImg : $filename[0];
}


/**
 *  RETURNS THE Target of a link
 *  IF NO ALT, RETURNS THE FILENAME
 *  @author: Nerea
 */
function get_target_link($target, $text)
{
    $targetType = ($target) ? '_blank' : "_self";
    $targetURL = "target='" . $targetType . "'";
    $targetURL .= ($target) ? " rel='noopener noreferrer'" : '';
    $targetURL .= ($target) ? 'aria-label="' . $text . ', opens a new window"' : '';
    return $targetURL;
}


/**
 *  RETURNS THE Placeholder image from Theme Options
 *  @author: Nerea
 */
//get alt image
function get_placeholder_image(){
    return get_field('placeholder_image', 'option');
  }
  

/**
 *  RETURNS THE Placeholder image from Theme Options
 *  @author: Terra
 */
//get alt image
function get_pixel_image(){
    return "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAApJREFUCNdjYAAAAAIAAeIhvDMAAAAASUVORK5CYII=";
  }
?>