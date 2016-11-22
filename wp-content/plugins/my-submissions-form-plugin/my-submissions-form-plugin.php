<?php
/**
 * Plugin Name: My Submissions Form Plugin
 * Plugin URI: http://example.com
 * Description: This plugin show a table of form's submissions.
 * Version: 1.0.0
 * Author: Bobrovnik Artyom
 * Author URI: http://example.com
 * License: GPL2
 */

	

	add_action('admin_menu', 'plugin_add_admin_page');

	function plugin_add_admin_page() {
  		add_menu_page( 'submissions', 'Submissions admin page', 'manage_options', 'my-submissions-form-plugin/adminpage.php');
	}

	if ( is_admin() ) {
	    add_action('wp_ajax_nopriv_change_table', 'create_table');
		add_action('wp_ajax_change_table', 'create_table');
		add_action('wp_ajax_admin_open', 'create_table');
	}

	function create_table() {
		global $wpdb;
		$order_by = $_POST['order_by'];
		$page_number = $_POST['page_number'];
		$table_name = $wpdb->prefix . "test_users";
		$items_per_page = 1000;
		$offset = $page_number * $items_per_page - $items_per_page;
		$query =  "SELECT " . $table_name .  ".* FROM " . $table_name . 
		" INNER JOIN(SELECT " . $order_by . ",id FROM " . $table_name .
		" ORDER BY " . $order_by . " LIMIT " . $offset . "," . $items_per_page . ") AS a ON " . $table_name . ".id = a.id";
		$retrieve_data = $wpdb->get_results($query);

		$table = "<table class='submissions-table'><thead><tr>";
		foreach (reset($retrieve_data) as $key => $value) {
			$table = $table . "<th>" . $key . "</th>";
		}
		$table = $table . "</thead></tr><tbody>";
		foreach ($retrieve_data as $profile) { 
			$table =  $table . "<tr>";
			foreach ($profile as $key => $value) {
				$table = $table . "<td>" . $value . "</td>";
			}
			$table = $table . "</tr>";
		}
		$table = $table . "</tbody></table>";      

		echo $table;
		wp_die();
	}

	add_action( 'admin_enqueue_scripts', 'submissions_plugin_scripts' );

	function submissions_plugin_scripts() {
		wp_enqueue_style('plugin_style', plugins_url( '/my-submissions-form-plugin.css', __FILE__ ));
		wp_enqueue_script('plugin_scripts', plugins_url( '/my-submissions-form-plugin.js', __FILE__ ), array('jquery'));
		global $wpdb;
		$items_per_page = 1000;
		$items_count = $wpdb->get_results("SELECT id FROM " . $wpdb->prefix . "test_users ORDER BY id DESC LIMIT 1")[0]->id;
		$pages_count = (int)($items_count / $items_per_page);
		if($items_count % $items_per_page > 0) {
			++$pages_count; 
		}
		wp_localize_script( 'plugin_scripts', 'plugin_data', array( 'ajax_url' => admin_url( 'admin-ajax.php') , 'pages_count' => $pages_count)); 
	}



	class Submissions_Table_Widget extends WP_Widget {

		public function __construct() {
			$widget_ops = array( 
				'description' => 'Widget that show users in the table'
			);
			parent::__construct( 'submissions_table_widget', 'Submissions Table Widget', $widget_ops );
		}

		public function widget( $args, $instance ) {
			global $wpdb;
			$table_name = $wpdb->prefix . "test_users";
			$users = $wpdb->get_results("SELECT * FROM " . $table_name . " ORDER BY id DESC LIMIT 10");
			$table = "<table class='table'><thead><th>name</th><th>surname</th><th>email</th><th>phone</th></thead><tbody>";
			foreach ($users as $number => $user) {
				$table = $table . "<tr><td>" . $user->name . "</td>" . "<td>" . $user->surname . "</td>" . "<td>" . $user->email . "</td>" . "<td>" . $user->phone . "</td></tr>";
			}
			$table = $table . "</tbody></table>";
			echo $table ;
			wp_die();
		}

		public function form( $instance ) {}
		public function update( $new_instance, $old_instance ) {}
	}

	add_action( 'widgets_init', function(){
		register_widget( 'Submissions_Table_Widget' );
	});

