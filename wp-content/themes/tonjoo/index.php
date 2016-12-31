<?php get_header();?>

<!-- slider -->
<?php echo do_shortcode("[tonjooslider-shortcode]"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center t_heading">
			<h3>Instagram @Kokijoki</h3>
			<a href="" class="btn btn-primary">FOLLOW US ON INSTAGRAM</a>
		</div>
	</div>

	<?php
	
	// check if have post
	if( have_posts() ) {
		$result .= '<div class="row">';
		while( have_posts() ) {
			the_post();
			$the_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $type);
			$post_url = get_post_permalink($post->ID);
			$result .= '
		  		<div class="col-xs-6 col-md-3">
		    		<a href="'.$post_url.'" class="thumbnail">
		      			<img title="'.esc_attr(get_the_title($post->ID)).'" src="' . $the_url[0] . '" data-thumb="' . $the_url[0] . '" alt=""/>
		    		</a>
		  		</div>
			';
		}
		$result .= '</div>';
		echo $result;
	} else {
		echo 'No Post Here';
	}

echo '</div>';
?>
<div class="container">
	<?php dynamic_sidebar( 'banner-widget' ); ?>
</div>

<script type="text/javascript">
	var locations = [{
		latlng : new google.maps.LatLng<?php echo get_option('theme_options')['map_location']; ?>, 
		info : '<?php bloginfo('name'); ?>'
	}];
</script>
<?php 
if(get_option('theme_options')['address_location'] !== null) { ?>
	<div class="container-fluid" id="company_info">
		<div class="row primary_color">
			<div class="col-md-6 pd_r_0">
				<div id="map" style="width: 100%; height: 400px;"></div>	
			</div>
			<div class="col-md-6 detail_info">
				<p>&nbsp;</p>
				<span>
				<h3><?php bloginfo('name'); ?></h3>
					<p><?php echo get_option('theme_options')['address_location']; ?></p>
					<p>Email: <?php echo get_option('theme_options')['email_address']; ?></p>
					<p>HP: <?php echo get_option('theme_options')['phone_number']; ?></p>
				</span>
			</div>
		</div>
	</div>
<?php } ?>

<?php get_footer(); ?>   