<?php
/*
Plugin Name: Shared Blocks
Plugin URI:  http://wordpress.org/extend/plugins/shared-blocksk/
Description: Shared Blocks
Version:     0.1-
Author:      The TrueAussie Team
Author URI:  http://wordpress.org/extend/plugins/shared-blocks/
Text Domain: shared-blocks
Domain Path: /lang
 */
?>
<?php 
             
function shared_template_parts( $template ) {
        $new_template =  WP_CONTENT_DIR . "/shared-blocks/category-list.php";
         load_template($new_template, false);
  
}
 