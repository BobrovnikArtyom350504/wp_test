<?php

	add_action('wp_enqueue_scripts', 'my_test_script');
	function my_test_script() {
	    wp_enqueue_script( 'bootstrap_script', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));
	    wp_enqueue_style( 'bootstrap_styles',  get_template_directory_uri() . '/css/bootstrap.min.css');
	    wp_enqueue_style( 'bootstrap_theme_styles',  get_template_directory_uri() . '/css/bootstrap-theme.min.css');
	}
