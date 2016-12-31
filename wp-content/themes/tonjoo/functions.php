<?php
/**
 *
 * Theme WordPress by tonjoo System Development
 */

function tonjoo_wp_setup()
{
    add_theme_support('automatic-feed-links');

    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(360, 260, array('center', 'center'));
    add_image_size('single-thumbnail', 710, 513, true);

    register_nav_menu(
    	'primary',
    	__('Primary Menu', 'tonjoo_navigation')
    );

    
	add_editor_style() ;
}

function customize_register( $wp_customize ) {
	$colors = array();
	$colors[] = array(
		'slug'=>'header_color', 
		'default' => '#e74b3c',
		'label' => __('Header Background Color', '')
	);
	$colors[] = array(
		'slug'=>'content_link_color', 
		'default' => '#88C34B',
		'label' => __('Content Link Color', 'Ari')
	);

	foreach( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options'
			)
		);
  		// CONTROLS
  		$wp_customize->add_control(
  			new WP_Customize_Color_Control(
  				$wp_customize,
  				$color['slug'], 
  				array(
  					'label' => $color['label'], 
  					'section' => 'colors',
  					'settings' => $color['slug']
  				)
  			)
  		);
  	}
}
add_action( 'customize_register', 'customize_register' );
add_action('after_setup_theme', 'tonjoo_wp_setup');

function tonjoo_scripts()
{
    wp_enqueue_style(
        'tonjoo-bootstrap',
        get_template_directory_uri() .'/css/bootstrap.min.css'
    );
    
    wp_enqueue_style(
        'tonjoo-fontawesome',
        get_template_directory_uri() .'/css/font-awesome.min.css'
    );
    
    wp_enqueue_style( 'tonjoo-style', get_stylesheet_uri() );

    wp_enqueue_style( 'tonjoo-font', 'https://fonts.googleapis.com/css?family=Lato' );

    wp_enqueue_script(
        'jquery-cdn',
        get_template_directory_uri() . '/js/jquery.min.js',
        array(), '', true
    );

    wp_enqueue_script(
        'bootstrap-js',
        get_template_directory_uri() . '/js/bootstrap.min.js',
        array(), '', true
    );

    wp_enqueue_script(
        'tonjoo-js',
        get_template_directory_uri() . '/js/tonjoo.js',
        array(), '', true
    );
}

add_action('wp_enqueue_scripts', 'tonjoo_scripts');

/**
 * Custom Menus
 */
function my_menus()
{
	$arg = array(
   		'menu' => 'top_menu',
   		'depth' => 2,
   		'container'       => 'div',
   		'container_class' => 'collapse navbar-collapse',
   		'container_id'    => 'bs-example-navbar-collapse-1',
   		'menu_class'      => 'nav navbar-nav',
   		'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
   		'walker' => new wp_bootstrap_navwalker()
   	);
   	wp_nav_menu($arg);
}

function banner_widget_init()
{

	register_sidebar( array(
		'name'          => 'Banner Widget',
		'id'            => 'banner-widget',
		'before_widget' => '<div class="banner-col">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}

function footer_widget_init()
{

	register_sidebar( array(
		'name'          => 'Footer Widget',
		'id'            => 'footer-widget',
		'before_widget' => '<div class="footer-col col-md-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
function footer_social_widget_init()
{

	register_sidebar( array(
		'name'          => 'Footer Social Widget',
		'id'            => 'footer-social-widget',
		'before_widget' => '<div class="footer-col col-md-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action('widgets_init', 'banner_widget_init');
add_action('widgets_init', 'footer_widget_init');
add_action('widgets_init', 'footer_social_widget_init');


require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
require get_template_directory() . '/inc/theme_options.php';


/* Banner Widget */
class TonjooWidget extends WP_Widget
{
	function TonjooWidget() {
		$widget_ops = array('classname' => 'TonjooWidget', 'description' => 'Displays a banner' );
		parent::__construct( 'TonjooWidget', 'Tonjoo Widget', $widget_ops );
		add_action( 'admin_enqueue_scripts', array( $this, 'banner_assets' ) );
	}

	function form($instance) {
		$title = '';
		if( !empty( $instance['title'] ) ) {
			$title = $instance['title'];
		}

		$link_url = '';
		if( !empty( $instance['link_url'] ) ) {
			$link_url = $instance['link_url'];
		}

		$image = '';
		if(isset($instance['image'])) {
			$image = $instance['image'];
		}

	?>
	    <p>
	        <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	    </p>

	    <p>
	        <label for="<?php echo $this->get_field_name( 'link_url' ); ?>"><?php _e( 'Link URL:' ); ?></label>
	        <input class="widefat" id="<?php echo $this->get_field_id( 'link_url' ); ?>" name="<?php echo $this->get_field_name( 'link_url' ); ?>" type="text" value="<?php echo esc_attr( $link_url ); ?>" />
	    </p>
    	<p>
		    <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
		    <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
		    <input class="upload_image_button" type="button" value="Upload Image" />
		</p>
	<?php
  	}

  	function update($new_instance, $old_instance) {
  		return $new_instance;
  	}

  	function widget($args, $instance) {
  		extract($args, EXTR_SKIP);
  		echo $before_widget;
  		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
  		$link_url = empty($instance['link_url']) ? ' ' : apply_filters('widget_link_url', $instance['link_url']);
  		$image = empty($instance['image']) ? ' ' : apply_filters('widget_image', $instance['image']);

  		$result = '
  		<div class="row">
  		<div class="col-xs-12">
  		<a href="'.$link_url.'" class="thumbnail banner">
  		<span style="background:url('.$image.') no-repeat center; background-size:cover;width:100%;height:400px;float:left"></span>
  		';
  		if (!empty($title)) $result .= '<h3 class="caption"><span>'. $title .'</span></h3>';
  		$result .= '
  		</a>
  		</div>
  		</div>';

  		echo $result;
  		echo $after_widget;
  	}

  	public function banner_assets() {
  		wp_enqueue_script('media-upload');
  		wp_enqueue_script('thickbox');
  		wp_enqueue_script('admin_tonjoo', get_template_directory_uri() . '/js/admin_tonjoo.js', array( 'jquery' )) ;
  		wp_enqueue_style('thickbox');
  	}
}

add_action( 'widgets_init', create_function('', 'return register_widget("TonjooWidget");') );

?>