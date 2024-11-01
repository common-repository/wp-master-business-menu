<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       //wpmaster.com
 * @since      1.0.0
 *
 * @package    Wpm_Business_Menu
 * @subpackage Wpm_Business_Menu/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wpm_Business_Menu
 * @subpackage Wpm_Business_Menu/public
 * @author     WP Master <plugins@wpmaster.com>
 */
class Wpm_Business_Menu_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wpm_Business_Menu_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpm_Business_Menu_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name . '-main-css', plugin_dir_url( __FILE__ ) . 'css/wpm-business-menu-public.css', array(), $this->version, 'all' );
	

	}

	
	/**
	 * Register and display WPM Business Menu contents via shortcode
	 *
	 * @since    1.0.0
	 */
	public function wpm_business_menu_register_shortcode(){
		add_shortcode( 'wpm-business-menu', array( $this, 'wpm_business_menu_shortcode_display' ) );
	}
	
	public function wpm_business_menu_shortcode_display( $atts ){
		$atts = shortcode_atts( 
			array(
				'id' => 'default'
			), $atts, 'wpm_business_menu' 
		);
		$wpm_business_menu_id = $atts['id'];
		ob_start();
		require plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/wpm-business-menu-public-display.php';
		$output = ob_get_contents();
		ob_get_clean();
		return $output;
	}
}
