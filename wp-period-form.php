<?php
/*
Plugin Name: Wp-period-form
Plugin URI: https://github.com/miiitaka/wp-structuring-markup
Description: Allows you to include schema.org JSON-LD syntax markup on your website
Version: 4.6.5
Author: Kamemoto Kumiko
Author URI:
License: GPLv2 or later
Text Domain: wp-structuring-markup
Domain Path: /languages
*/

require_once ( plugin_dir_path(__FILE__) . 'includes/wp-period-form-admin-db.php' );

/**
 * Base Class
 *
 * @author  Kamemoto Kumiko
 * @version 1.0.0
 * @since 1.0.0
*/

class Wp_Period_Form {
	public function __construct(){
		if( is_admin() ){
			add_action( 'admin_menu', array( $this, 'admin_menu') );
		}
	}

	public function admin_menu(){
		add_menu_page(
			'期間指定フォーム',
			'期間指定フォーム設定',
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'list_page_render')
		);
		add_submenu_page(
			__FILE__,
			'リスト',
			'リスト',
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'list_page_render')
		);
		add_submenu_page(
			__FILE__,
			'新規追加',
			'新規追加',
			'manage_options',
			plugin_dir_path(__FILE__) . 'includes/wp-period-form-post.php',
			array( $this, 'post_page_render')
		);
	}

	public function list_page_render(){
		require_once( plugin_dir_path(__FILE__) . 'includes/wp-period-form-list.php' );
	 new Period_Form_List();
	}

	public function post_page_render(){
		require_once( plugin_dir_path(__FILE__) . 'includes/wp-period-form-post.php' );
	 new Period_Form_Post();
	}
}

new Wp_Period_Form();
