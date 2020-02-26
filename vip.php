<?php
/*
Plugin Name: VIP
Plugin URI:  https://github.com/hklcf/VIP-for-Wordpress
Description: Only display content for the logged in users
Version:     1.0
Author:      HKLCF
Author URI:  https://eservice-hk.net/
Text Domain: vip
Domain Path: /languages
*/

function vip_func( $atts, $content = '' ) {
  if ( is_user_logged_in() ) {
    return do_shortcode($content);
  }
}
add_shortcode( 'vip', 'vip_func' );

function vip_quicktags() {
  if(wp_script_is('quicktags')) {
?>
    <script type="text/javascript">
      QTags.addButton( 'vip', 'vip', '[vip]', '[/vip]', '', 'VIP', 201 );
    </script>
<?php
  }
}
add_action( 'admin_print_footer_scripts', 'vip_quicktags' );
?>
