<?php
/**
 * Plugin Name: Wordpress Customisation (PHP, CSS & JS)
 * Description: A very simple plugin to add codes PHP, CSS and JS in Wordpress.
 * Version: 	1.0.0
 * Author: 		Gabriel Z Amaral
 * Author URI: 	http://www.gabrielzuqueto.eti.br/
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

final class Wordpress_Customisation {

	public function __construct () {
		add_action( 'init', array( $this, 'wordpress_customisation_setup' ), -1 );
	}

	public function wordpress_customisation_setup() {
		if($this->include_css()){add_action( 'wp_enqueue_scripts', array( $this, 'wordpress_customisation_css' ), 999 );}
		if($this->include_js()){add_action( 'wp_enqueue_scripts', array( $this, 'wordpress_customisation_js' ) );}
		require_once( 'custom/functions.php' );
	}

	public function wordpress_customisation_css() {
		wp_enqueue_style( 'custom-css', plugins_url( '/custom/style.css', __FILE__ ) );
	}

	public function wordpress_customisation_js() {
		wp_enqueue_script( 'custom-js', plugins_url( '/custom/custom.js', __FILE__ ), array( 'jquery' ) );
	}

	public function include_css(){
		return filesize(plugin_dir_path( __FILE__ ).'/custom/style.css');
	}

	public function include_js(){
		return filesize(plugin_dir_path( __FILE__ ).'/custom/custom.js');
	}

}

function __wordpress_customisation_main() {
	new Wordpress_Customisation();
}

add_action( 'plugins_loaded', '__wordpress_customisation_main' );
?>