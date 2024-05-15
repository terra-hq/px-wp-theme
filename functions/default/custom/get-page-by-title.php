<?php
/**
 *  get page by title
 *  @author: Eli
 */
function get_page_id_by_title($title)
{
    $page = get_page_by_title($title);
    return $page->ID;
}

?>