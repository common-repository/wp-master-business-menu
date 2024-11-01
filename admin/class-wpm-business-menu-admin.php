<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       //wpmaster.com
 * @since      1.0.0
 *
 * @package    Wpm_Business_Menu
 * @subpackage Wpm_Business_Menu/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wpm_Business_Menu
 * @subpackage Wpm_Business_Menu/admin
 * @author     WP Master <plugins@wpmaster.com>
 */
class Wpm_Business_Menu_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpm-business-menu-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpm-business-menu-admin.js', array( 'jquery','jquery-ui-core','jquery-ui-sortable' ), $this->version, false );

	}
	
	/**
	 * Register Admin Menu
	 *
	 * @since    1.0.0
	 */
	public function wpm_business_menu_add_admin_menu(){
		add_menu_page(
			'WP Master Business Menu', // The title to be displayed on this menu's corresponding page
			'Business Menu', // The text to be displayed for this actual menu item
			'manage_options', // Which type of users can see this menu
			'wpm_business_menu', // The unique ID - that is, the slug - for this menu item
			array($this, 'display_admin_menu_wpm_business_menu'), // The name of the function to call when rendering this menu's page
			plugin_dir_url( __FILE__ ) . 'assets/admin-icon.svg', // icon url
			124.911 // position
		);
		add_submenu_page(
			'wpm_business_menu',                  // Register this submenu with the menu defined above
			'Instructions',          // The text to the display in the browser when this menu item is active
			'Instructions',                  // The text for this menu item
			'manage_options',            // Which type of users can see this menu
			'wpm_business_menu_instruction',          // The unique ID - the slug - for this menu item
			array($this, 'display_wpm_business_menu_instruction')   // The function used to render this menu's page to the screen
		);		
	}
	 
	public function display_admin_menu_wpm_business_menu(){
		return false;
	}
	
	public function display_wpm_business_menu_instruction(){
		require_once( 'partials/display-menu-page-wpm-instruction.php' );
	}
	
	/**
	 * Register Custom Post Type
	 *
	 * @since    1.0.0
	 */
	public function wpm_business_menu_register_custom_post_type(){
		$labels = array(
			'name'               => 'WP Master Business Menu',
			'singular_name'      => 'WP Master Business Menu',
			'menu_name'          => 'Business Menu',
			'name_admin_bar'     => 'Business Menu',
			'add_new'            => 'Add New Business Menu',
			'add_new_item'       => 'Add New Business Menu Item',
			'new_item'           => 'New Business Menu',
			'edit_item'          => 'Edit Business Menu',
			'view_item'          => 'View Business Menu',
			'all_items'          => 'All Business Menus',
			'search_items'       => 'Search Business Menu',
			'parent_item_colon'  => 'Parent Business Menu',
			'not_found'          => 'No Business Menu Found',
			'not_found_in_trash' => 'No Business Menu Found in Trash.'
		);
		
		$args = array(
			'labels'             => $labels,
			'description'        => 'WP Master Business Menu',
			'public'             => true,
			'publicly_queryable' => false,
			'exclude_from_search' => true,
			'show_ui'            => true,
			'show_in_menu'       => 'wpm_business_menu',
			'menu_position'			=> 22.77,
			'query_var'          => false,
			'rewrite'            => false,
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'supports'           => array( 'title' )
		);
		
		register_post_type( 'wpm_business_menu', $args );
	}
	
	/**
	 * Register meta boxes for wpm_business_menu custom post type
	 *
	 * @since    1.0.0
	 */
	public function wpm_business_menu_add_meta_boxes( $post_type ){
		add_meta_box(
			'wpm_business_menu_items', 
			'WP Master Business Menu Items', 
			array($this, 'callback_metabox_wpm_business_menu_items'),
			'wpm_business_menu',
			'normal',
			'high'
		);
		
		add_meta_box(
			'wpm_business_menu_settings', 
			'WP Master Business Menu Setting', 
			array($this, 'callback_metabox_wpm_business_menu_setting'),
			'wpm_business_menu',
			'normal',
			'default'
		);

		add_meta_box(
			'wpm_business_menu_shortcode',
			'WP Master Business Menu Shortcode',
			array( $this, 'callback_metabox_wpm_business_menu_shortcode' ),
			'wpm_business_menu',
			'side',
			'default'
		);
	}
	
	public function wpm_business_menu_save_meta_boxes ( $post_id ){
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			die("You do not have sufficient previlliege to edit the post.");
		}
		
		// If this is an autosave, our form has not been submitted,
		//     so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}
		
		if ( isset( $_POST['wpm-business-menu-item'] ) ) {
			$result = $_POST['wpm-business-menu-item'];
			
			foreach( $result as $index => $data ){
				foreach( $data as $key => $val ){
					$result[$index][$key] = strip_tags( $val );
				}
			}
			
			update_post_meta( $post_id, '_wpm_business_menu_items', $result );
		} else {
			update_post_meta( $post_id, '_wpm_business_menu_items', array() );
		}
		if (isset($_POST['wpm-business-menu-settings'])) {
			
			$wpm_business_menu_settings_nonce = $_POST['wpm-business-menu-nonce'];
			if( ! wp_verify_nonce( $wpm_business_menu_settings_nonce, 'wpm-business-menu-settings-nonce' ) ){
				die('huk');
			}
			$result = $_POST['wpm-business-menu-settings'];
			foreach( $result as $cat => $data ){
				foreach( $data as $key => $val ){
					$result[$cat][$key] = strip_tags( $val );
				}
			}
			update_post_meta( $post_id, '_wpm_business_menu_settings', $result );
		}
	}
	
	/* Meta box display callbacks */
	public function callback_metabox_wpm_business_menu_items( $post ){
		require_once('partials/display-meta-box-wpm-business-menu-items.php');
	}
	public function callback_metabox_wpm_business_menu_setting( $post ){
		require_once('partials/display-meta-box-wpm-business-menu-setting.php');
	}
	public function callback_metabox_wpm_business_menu_shortcode( $post ){
		require_once('partials/display-meta-box-wpm-business-menu-shortcode.php');
	}
	
	/**
	 * Display shortcode on post type column
	 *
	 * @since    1.0.0
	 */
		
	public function wpm_business_menu_add_column_title( $columns ){
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => 'Business Menu Name',
			'postid' =>'Post ID',
			'shortcode' => 'Shortcode',
			'date' => 'Date'
		);
		return $columns;
	}
	
	public function wpm_business_menu_add_custom_column_data( $column, $post_id ){
		switch( $column ){
			case 'shortcode' :
				echo '<input class="wpm-business-menu-shortcode-select" type="text" value="[wpm-business-menu id=&quot;' . $post_id . '&quot;]" size="25" readonly>';
				break;
			case 'postid' :
				echo $post_id;
				break;
		} 
	}
}
