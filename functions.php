<?php

add_theme_support( 'post-thumbnails' );

function mahan_theme_css(){
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() .  '/css/bootstrap.min.css');

	wp_enqueue_style( 'style_css', get_template_directory_uri() .  '/style.css');
}

add_action('wp_enqueue_scripts', 'mahan_theme_css');



function mahan_theme_js(){
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() .  '/js/bootstrap.min.js', array('jquery'), '', true);


	wp_enqueue_script( 'main_min_js', get_template_directory_uri() .  '/js/main.min.js', array('jquery'), '', true);


	wp_enqueue_script( 'jqBootstrapValidation_js', get_template_directory_uri() .  '/js/jqBootstrapValidation.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'mahan_theme_js');


 ?>
