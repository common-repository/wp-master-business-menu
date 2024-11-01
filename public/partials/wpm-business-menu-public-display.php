<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       //wpmaster.com
 * @since      1.0.0
 *
 * @package    Wpm_Business_Menu
 * @subpackage Wpm_Business_Menu/public/partials
 */
	$menu_name = get_the_title( $wpm_business_menu_id );
	$items = get_post_meta( $wpm_business_menu_id, '_wpm_business_menu_items', false );
	$items = $items[0];
	
	$settings = get_post_meta( $wpm_business_menu_id, '_wpm_business_menu_settings', false );
	$settings = $settings[0];
	
	$section_padding_top = ( isset( $settings['section']['pt'] ) ? $settings['section']['pt'] : 10 );
	$section_padding_right = ( isset( $settings['section']['pr'] ) ? $settings['section']['pr'] : 10 );
	$section_padding_bottom = ( isset( $settings['section']['pb'] ) ? $settings['section']['pb'] : 10 );
	$section_padding_left = ( isset( $settings['section']['pl'] ) ? $settings['section']['pl'] : 10 );
	
	$section_margin_top = ( isset( $settings['section']['mt'] ) ? $settings['section']['mt'] : 10 );
	$section_margin_right = ( isset( $settings['section']['mr'] ) ? $settings['section']['mr'] : 10 );
	$section_margin_bottom = ( isset( $settings['section']['mb'] ) ? $settings['section']['mb'] : 10 );
	$section_margin_left = ( isset( $settings['section']['ml'] ) ? $settings['section']['ml'] : 10 );
	
	$style = 'padding:' . $section_padding_top . 'px ' . $section_padding_right . 'px ' . $section_padding_bottom . 'px ' . $section_padding_left . 'px;';
	$style .= 'margin:' . $section_margin_top . 'px ' . $section_margin_right . 'px ' . $section_margin_bottom . 'px ' . $section_margin_left . 'px;';
?>
<div id="wpm-business-menu" class="wpmbm-container" style="<?php echo $style; ?>">

	<h2 class="wpmbm-title"><?php echo $menu_name; ?></h2>
	<?php
		for( $i = 0; $i < count( $items ); $i++ ){
			$html = '
				<div class="wpmbm-item-container">
					<span class="wpmbm-item-price">' . $items[$i]["price"] . '</span>
					<p class="wpmbm-item-title">' . $items[$i]["title"] . '</p>
					<p class="wpmbm-item-desc">' . $items[$i]["desc"] . '</p>
				</div>
			';
			echo $html;
		}
	?>
</div>