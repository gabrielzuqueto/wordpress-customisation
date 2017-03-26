<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

# BEGIN - REMOVE QUERY STRING FROM  CSS FILES
add_filter( 'style_loader_src', function($src){
  $src = preg_replace('/&?ver=[0-9.]+/','',$src);
  $src = preg_replace('/\?$/','',$src);
  return $src;
},1);
# END - REMOVE QUERY STRING FROM  CSS FILES

# BEGIN - REMOVE QUERY STRING FROM JS FILES
add_filter( 'script_loader_src', function($src){
  $src = preg_replace('/&?ver=[0-9.]+/','',$src);
  $src = preg_replace('/\?$/','',$src);
  return $src;
},1);
# END - REMOVE QUERY STRING FROM JS FILES
?>