<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.vozax.com/magic-popups/
 * @since      1.0.0
 *
 * @package    Magic_Popups
 * @subpackage Magic_Popups/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Magic_Popups
 * @subpackage Magic_Popups/admin
 * @author     Vozax <team@vozax.com>
 */
class Vozax_Popup_Admin {

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
	
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/vzxpopup-admin.css', array(), $this->version, 'all' );

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
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( 'customjs', plugin_dir_url( __FILE__ ) . 'js/vzxpopup-admin.js','', $this->version, false );
		

	}

	
	public function add_plugin_admin_menu() {

    /*
     * Add a Menu page for this plugin.
     *
     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
     *
     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
     *
     */
    add_menu_page( 'Magic Popups', 'Magic Popups', 'administrator', $this->plugin_name, array($this, "vozax_popup_admin_display"), plugin_dir_url( __FILE__ ) . 'images/popup.png' );
	 
}

 /**
 * Add settings action link to the plugins page.
 *
 * @since    1.0.0
 */


/**
 * Render the settings page for this plugin.
 *
 * @since    1.0.0
 */
 
public function vozax_popup_admin_display() {
   include_once( 'partials/magic-popups-admin-display.php' );
}
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	
}