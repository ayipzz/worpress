<?php
/**
 * @Author: hakim
 * @Date:   2016-12-31 09:02:11
 * @Last Modified by:   hakim
 * @Last Modified time: 2016-12-31 20:01:07
 */
?>
	<form class="form-horizontal" method="post" action="options.php">
		<?php settings_fields( 'theme_options' ); ?>
  		<div class="form-group">
    		<label for="phone_number" class="col-sm-2 control-label"><?php esc_html_e( 'Phone Number', 'text-domain' ); ?></label>
    		<div class="col-sm-10">
    			<?php $phone_number = self::get_theme_option( 'phone_number' ); ?>
      			<input type="text" class="form-control" name="theme_options[phone_number]" value="<?php echo esc_attr( $phone_number ); ?>" />
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="email_address" class="col-sm-2 control-label"><?php esc_html_e( 'Email Address', 'text-domain' ); ?></label>
    		<div class="col-sm-10">
    			<?php $email_address = self::get_theme_option( 'email_address' ); ?>
      			<input type="text" class="form-control" name="theme_options[email_address]" value="<?php echo esc_attr( $email_address ); ?>" />
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="address" class="col-sm-2 control-label"><?php esc_html_e( 'Address', 'text-domain' ); ?></label>
    		<div class="col-sm-10">
    			<?php $value = self::get_theme_option( 'address_location' ); ?>
      			<textarea class="form-control" name="theme_options[address_location]"><?php echo esc_attr( $value ); ?></textarea>
    		</div>
  		</div>
  		<div class="form-group">
		    <label for="map_location" class="col-sm-2 control-label"><?php esc_html_e( 'Map Location (LatLng)', 'text-domain' ); ?></label>
		    <div class="col-sm-10">
		    <?php $map_location = self::get_theme_option( 'map_location' ); ?>
		      <input type="text" class="form-control" name="theme_options[map_location]" value="<?php echo esc_attr( $map_location ); ?>" />
		    </div>
  		</div>
  		<div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <?php submit_button(); ?>

		    </div>
  		</div>
	</form>
