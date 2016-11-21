<?php

	add_action('wp_enqueue_scripts', 'test_theme_scripts');
	function test_theme_scripts() {
	    wp_enqueue_script( 'bootstrap_script', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));
	    wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js', array('jquery'));
	    wp_enqueue_script( 'validator', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js', array('jquery'));
	    wp_enqueue_style( 'bootstrap_styles',  get_template_directory_uri() . '/css/bootstrap.min.css');
	    wp_enqueue_style( 'bootstrap_theme_styles',  get_template_directory_uri() . '/css/bootstrap-theme.min.css');
	}

	function init_my_widget() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>'
	) );

}
add_action( 'widgets_init', 'init_my_widget' );
?>

