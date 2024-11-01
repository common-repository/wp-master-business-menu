<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Provide a meta box for custom post type
 *
 * @link       //wpmaster.com
 * @since      1.0.0
 *
 * @package    Wpm_Business_Menu
 * @subpackage Wpm_Business_Menu/includes
 */
	$items = get_post_meta( $post->ID, '_wpm_business_menu_items', false );
	$items = $items[0];
?>
<div id="wpm-business-menu-info-container">
	<p>Please use the section below to add / remove menu items. 
	<br />After creating the menu, you can "publish" the menu and use the shortcode to display the menu wherever you like.
	<br />The price fields are all text fields so users can display the price with any currency symbol.</p>
	<div id="wpmb-add-menu-item">Add Menu Item <img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/plus.svg'; ?>" alt="add new menu item" /></div>
</div>
<hr />
<div id="wpm-business-menu-item-clone" style="display:none;">
	<div class="wpm-business-menu-item">
		<div class="col-wpmb-item-handle">
			<img class="wpmb-item-handle" src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/menu2.svg'; ?>" />
		</div>
		<div class="col-wpmb-item-data">
				<input class="wpmb-item-title" placeholder="Title" name="wpm-business-menu-item[][title]" type="text" />
				<input class="wpmb-item-price" placeholder="Price" name="wpm-business-menu-item[][price]" type="text" />
				<input class="wpmb-item-desc" placeholder="Description" name="wpm-business-menu-item[][desc]" type="text" />
		</div>
		<div class="col-wpmb-item-control">
			<img class="wpmb-item-remove" src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/minus.svg'; ?>" alt="remove menu item" /><img class="wpmb-item-add" src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/plus.svg'; ?>" alt="add new menu item" />
		</div>
	</div>
</div>
<div id="wpm-business-menu-container">
<?php
	for( $i = 0; $i < count( $items ); $i++ ){
		$html = '
		<div class="wpm-business-menu-item">
			<div class="col-wpmb-item-handle">
				<img class="wpmb-item-handle" src="' . plugin_dir_url( __FILE__ ) . 'assets/menu2.svg" />
			</div>
			<div class="col-wpmb-item-data">
					<input class="wpmb-item-title" placeholder="Title" name="wpm-business-menu-item[' . $i . '][title]" type="text" value="' . sanitize_text_field( $items[$i]["title"] ) . '" />
					<input class="wpmb-item-price" placeholder="Price" name="wpm-business-menu-item[' . $i . '][price]" type="text" value="' . sanitize_text_field( $items[$i]["price"] ) . '" />
					<input class="wpmb-item-desc" placeholder="Description" name="wpm-business-menu-item[' . $i . '][desc]" type="text" value="' . sanitize_text_field( $items[$i]["desc"] ) . '" />
			</div>
			<div class="col-wpmb-item-control">
				<img class="wpmb-item-remove" src="' . plugin_dir_url( __FILE__ ) . 'assets/minus.svg" alt="remove menu item" /><img class="wpmb-item-add" src="' . plugin_dir_url( __FILE__ ) . 'assets/plus.svg" alt="add new menu item" />
			</div>
		</div>';
		echo $html;
	}
?>
</div>