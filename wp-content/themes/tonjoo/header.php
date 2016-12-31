<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>

	<?php wp_head(); ?>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDpa6NFv_fO5gUMl7y0SZPUaE8dzzRMZdA"></script>
    <?php
        $header_color = get_option('header_color');
        $content_link_color = get_option('content_link_color');
    ?>
    <style type="text/css">
    .jumbotron,.primary_color { background-color: <?php echo $header_color;?> }
    .top-menu ul li i, a,.list-inline.social a:hover { color: <?php echo $header_color;?> }
    .navbar-custom.navbar-default .navbar-nav>li>a:hover,
    .navbar-custom.navbar-default .navbar-nav>li>a:focus,.navbar-custom.navbar-default .navbar-nav>li.current-menu-item>a { color: <?php echo $content_link_color;?>; border-bottom-color: <?php echo $header_color;?>;
    }
    </style>
</head>

<body <?php body_class(); ?>  onload="initialize()">
<header class="top-menu">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8 col-xs-12">
				<ul>
					<li><i class="fa fa-phone"></i> Support Line : <?php echo get_option('theme_options')['phone_number'];;?></li>
					<li><i class="fa fa-envelope"></i> Email : <?php echo get_option('theme_options')['email_address']; ?></li>
				</ul>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
			    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Type product here" aria-describedby="basic-addon2">
                    <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search"></i></span>
                </div>
			 </div>
		</div>
	</div>
</header>
<div class="jumbotron">
  <div class="container">
    <h3><a href="<?php echo esc_url(home_url()); ?>">
                <?php bloginfo('name'); ?>
            </a></h3>
  </div>
</div>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <?php
        my_menus();
        ?>
        
    </div>
</nav>