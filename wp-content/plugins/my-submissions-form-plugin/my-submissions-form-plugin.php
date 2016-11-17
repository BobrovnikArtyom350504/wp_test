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

	add_shortcode("table", "create_submissions_table");

	add_action( 'wp_enqueue_scripts', 'submissions_plugin_scripts' );

	function submissions_plugin_scripts() {
		wp_enqueue_style( 'plugin_styles', plugins_url( '/my-submissions-form-plugin.css', __FILE__ ));
	}

	function create_submissions_table() {
		global $wpdb;
		$table = "<table class='submissions-table'><tr>";
		$table_name = $wpdb->prefix . "test_users";
		$retrieve_data = $wpdb->get_results( "SELECT * FROM " . $table_name );

		foreach (reset($retrieve_data) as $key => $value) {
			$table = $table . "<th>" . $key . "</th>";
		}
		$table = $table . "</tr>";
		

		foreach ($retrieve_data as $profile) { 
			$table =  $table . "<tr>";
			foreach ($profile as $key => $value) {
				$table = $table . "<td>" . $value . "</td>";
			}
			$table = $table . "</tr>";
		}
		$table = $table . "</table>";
		return $table;
	}
