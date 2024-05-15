<?php

/**
 *  force to expire cache
 *  @author: Nacho
 */

 function varnish_safe_http_headers()
 {
     header('X-UA-Compatible: IE=edge');
     session_cache_limiter('');
     $ts = gmdate("D, d M Y H:i:s") . " GMT";
     header("Expires: $ts");
     header("Last-Modified: $ts");
     header('Cache-Control: private, no-cache');
     header('Cache-Control: post-check=0, pre-check=0', FALSE);
     header('Pragma: no-cache');
     if (!session_id()) {
         session_start();
     }
 }
add_action('send_headers', 'varnish_safe_http_headers');

?>