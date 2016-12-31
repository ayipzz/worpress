<?php
/*
    Plugin Name: Tonjoo Slider
    Description: Simple slider into WordPress
    Author: Arif Rohman Hakim
    Version: 1.0
*/

function ts_init() {
    $args = array(
        'public' => true,
        'label' => 'Tonjoo Slider',
        'menu_icon' => plugins_url('css/icon.png', __FILE__),
        'supports' => array(
            'title',
            'editor',
            'thumbnail'
        )
    );
    add_image_size('ts_widget', 180, 100, true);
    add_image_size('ts_function', 600, 280, true);
    register_post_type('ts_images', $args);
}

function ts_register_scripts() {
    if (!is_admin()) {
        // register
        wp_register_script('ts_nivo-script', plugins_url('js/jquery.nivo.slider.js', __FILE__), array( 'jquery' ));
        wp_register_script('ts_script', plugins_url('js/script.js', __FILE__));
 
        // enqueue
        wp_enqueue_script('ts_nivo-script');
        wp_enqueue_script('ts_script');
    }
}
 
function ts_register_styles() {
    // register
    wp_register_style('ts_styles', plugins_url('css/nivo-slider.css', __FILE__));
    wp_register_style('ts_styles_theme', plugins_url('css/theme.css', __FILE__));
 
    // enqueue
    wp_enqueue_style('ts_styles');
    wp_enqueue_style('ts_styles_theme');
}

function ts_function($type='ts_function') {
    $args = array(
        'post_type' => 'ts_images',
        'posts_per_page' => 5
    );
    $result = '<div class="slider-wrapper theme-default">';
    $result .= '<div id="slider" class="nivoSlider">';
 
    //the loop
    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();
 
        $the_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $type);
        $result .='<img title="'.esc_attr(get_the_content()).'" src="' . $the_url[0] . '" data-thumb="' . $the_url[0] . '" alt=""/>';
    }
    $result .= '</div>';
    $result .='<div id = "htmlcaption" class = "nivo-html-caption">';
    $result .='<strong>This</strong> is an example of a <em>HTML</em> caption with <a href = "#">a link</a>.';
    $result .='</div>';
    $result .='</div>';
    return $result;
}

add_theme_support( 'post-thumbnails' );
add_action('init', 'ts_init');
add_action('wp_print_scripts', 'ts_register_scripts');
add_action('wp_print_styles', 'ts_register_styles');
add_shortcode('tonjooslider-shortcode', 'ts_function');

?>