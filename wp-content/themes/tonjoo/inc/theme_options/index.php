<link rel="stylesheet"	href="<?php echo get_stylesheet_directory_uri().'/css/bootstrap.min.css'; ?>">
<link rel="stylesheet"	href="<?php echo get_stylesheet_directory_uri().'/inc/theme_options/css/style.css'; ?>">
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/js/jquery.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/js/bootstrap.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/inc/theme_options/js/setting.js'; ?>"></script>


<div class="page-header">
  <h1><?php esc_html_e( 'Tonjoo Theme Options', 'text-domain' ); ?> <small><?php esc_html_e( 'Setting your own web', 'text-domain' ); ?></small></h1>
</div>

<div>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a href="#general_setting" aria-controls="general_setting" role="tab" data-toggle="tab"><?php esc_html_e( 'General Setting', 'text-domain' ); ?></a></li>
<li role="presentation"><a href="#design" aria-controls="design" role="tab" data-toggle="tab"><?php esc_html_e( 'Design', 'text-domain' ); ?></a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="general_setting">
    <?php require get_template_directory() . '/inc/theme_options/general_setting.php'; ?>
  </div>
  <div role="tabpanel" class="tab-pane" id="design">...</div>
</div>

</div>