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
	$settings = get_post_meta( $post->ID, '_wpm_business_menu_settings', false );
	$settings = $settings[0];
	
	$section_padding_top = ( isset( $settings['section']['pt'] ) ? $settings['section']['pt'] : 10 );
	$section_padding_right = ( isset( $settings['section']['pr'] ) ? $settings['section']['pr'] : 10 );
	$section_padding_bottom = ( isset( $settings['section']['pb'] ) ? $settings['section']['pb'] : 10 );
	$section_padding_left = ( isset( $settings['section']['pl'] ) ? $settings['section']['pl'] : 10 );
	
	$section_margin_top = ( isset( $settings['section']['mt'] ) ? $settings['section']['mt'] : 10 );
	$section_margin_right = ( isset( $settings['section']['mr'] ) ? $settings['section']['mr'] : 10 );
	$section_margin_bottom = ( isset( $settings['section']['mb'] ) ? $settings['section']['mb'] : 10 );
	$section_margin_left = ( isset( $settings['section']['ml'] ) ? $settings['section']['ml'] : 10 );
?>
<div id="wpm-business-menu-settings-container">
	<input type="hidden" name="wpm-business-menu-nonce" value="<?php echo wp_create_nonce( 'wpm-business-menu-settings-nonce' ); ?>" />
	<p>Contrls the margin and padding of div that contains the menu.</p>
	<div class="wpm-business-menu-option">
		<div class="wpm-business-menu-option-title">
			<h3>Menu Section Padding</h3>
		</div>
		<div class="wpm-business-menu-option-field">
			<label>Top: <input type="number" name="wpm-business-menu-settings[section][pt]" value="<? echo $section_padding_top ?>" title="<? echo $section_padding_top ?>" />px</label>
			<label>Right: <input type="number" name="wpm-business-menu-settings[section][pr]" value="<? echo $section_padding_right ?>" title="<? echo $section_padding_right ?>" />px</label>
			<label>Bottom: <input type="number" name="wpm-business-menu-settings[section][pb]" value="<? echo $section_padding_bottom ?>" title="<? echo $section_padding_bottom ?>" />px</label>
			<label>Left: <input type="number" name="wpm-business-menu-settings[section][pl]" value="<? echo $section_padding_left ?>" title="<? echo $section_padding_left ?>" />px</label>
		</div>
		<div class="wpm-business-menu-option-help">
			<p>Gives padding to the menu section container.</p>
		</div>
	</div>
	<div class="wpm-business-menu-option">
		<div class="wpm-business-menu-option-title">
			<h3>Menu Section Margin</h3>
		</div>
		<div class="wpm-business-menu-option-field">
			<label>Top: <input type="number" name="wpm-business-menu-settings[section][mt]" value="<? echo $section_margin_top ?>" title="<? echo $section_margin_top ?>" />px</label>
			<label>Right: <input type="number" name="wpm-business-menu-settings[section][mr]" value="<? echo $section_margin_right ?>" title="<? echo $section_margin_right ?>" />px</label>
			<label>Bottom: <input type="number" name="wpm-business-menu-settings[section][mb]" value="<? echo $section_margin_bottom ?>" title="<? echo $section_margin_bottom ?>" />px</label>
			<label>Left: <input type="number" name="wpm-business-menu-settings[section][ml]" value="<? echo $section_margin_left ?>" title="<? echo $section_margin_left ?>" />px</label>
		</div>
		<div class="wpm-business-menu-option-help">
			<p>Gives Margin to the menu section container.</p>
		</div>
	</div>
</div>