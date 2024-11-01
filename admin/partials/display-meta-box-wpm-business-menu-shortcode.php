<?php
if ( ! defined( 'ABSPATH' ) ) exit; 
/*
 * @link       https://icanwp.com/plugins/portfolio-gallery/
 * @since      1.0.0
 *
 * @package    WP_Post_Ticker_Pro
 * @subpackage WP_Post_Ticker_Pro/admin/partials
 */
 ?>
<h4>Copy and Paste the Following Shortcode</h4>
<?php
	if ( get_post_status ( get_the_ID() ) == 'publish' ) {
		echo '<input class="wpm-business-menu-shortcode-select" type="text" value="[wpm-business-menu id=&quot;' . get_the_ID() . '&quot;]" size="25" readonly>';
	} else {
		echo '<div class="wpm-business-menu-warning">Please publish this setting to see the shortcode.</div>';
	}
?>