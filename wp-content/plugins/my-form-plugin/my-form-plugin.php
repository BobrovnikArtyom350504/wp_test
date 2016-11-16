<?php
/**
 * Plugin Name: My Form Plugin
 * Plugin URI: http://example.com
 * Description: This plugin create a form.
 * Version: 1.0.0
 * Author: Bobrovnik Artyom
 * Author URI: http://example.com
 * License: GPL2
 */

	register_activation_hook( __FILE__, 'create_database' );

	function create_database() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = $wpdb->prefix . 'test_users';

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			name varchar(30) DEFAULT 'name' NOT NULL,
			surname varchar(30) DEFAULT 'surname' NOT NULL,
			job_title varchar(30) DEFAULT 'job title' NOT NULL,
			company varchar(30) DEFAULT 'company' NOT NULL,
			email varchar(30) DEFAULT 'email@example.com' NOT NULL,
			phone varchar(30) DEFAULT '+375(29)111-111-11' NOT NULL,
			country varchar(30) DEFAULT 'country' NOT NULL,
			area_select varchar(30),
			UNIQUE KEY id (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}


	add_shortcode("form", "create_form");

	function create_form() {
		$form = '<form class="col-md-9" type="post">
	    <div class="form-group">
		    <label for="name-input">Username <strong>*</strong></label>
		    <input type="text" name="firstName" class="form-control" placeholder="First name" id="name-input">
	    </div>
	     
	    <div class="form-group">
		    <label for="surname-input">Surname <strong>*</strong></label>
		    <input type="text" name="surname" class="form-control" placeholder="Surname" id="surname-input">
	    </div>
	     
	    <div class="form-group">
		    <label for="job-input">Job Title <strong>*</strong></label>
		    <input type="text" name="jobTitle" class="form-control" placeholder="Job title" id="job-input">
	    </div>
	     
	    <div class="form-group">
		    <label for="company-input">Company <strong>*</strong></label>
		    <input type="text" name="company" class="form-control" placeholder="Company" id="company-input">
	    </div>
	     
	    <div class="form-group">
		    <label for="email-input">Email <strong>*</strong></label>
		    <input type="email" name="email" class="form-control" placeholder="Email" id="email-input">
	    </div>

	    <div class="form-group">
		    <label for="phone-input">Telephone <strong>*</strong></label>
		    <input type="tel" name="phone" class="form-control" placeholder="Telephone" id="phone-input">
	    </div>

	    <div class="form-group">
		    <label for="country-select">Country <strong>*</strong></label>
		    <select class="form-control" id="country-select" name="country">
				<option>Belarus</option>
				<option>Russia</option>
		    </select>
	    </div>

	    <div class="form-group">
		    <label for="area-select">Interest Area</label>
		    <select class="form-control" id="area-select">
				<option>1</option>
				<option>2</option>
		    </select>
	    </div>

	    <div class="form-check">
		    <label class="form-check-label">
      			<input type="checkbox" class="form-check-input" name="checkbox1">
      			Check me out
    		</label>
	    </div>

	    <div class="form-check">
		    <label class="form-check-label">
      			<input type="checkbox" class="form-check-input" id="checkbox-2" name="checkbox2">
      			Check me out
    		</label>
	    </div>
		
		<div class="g-recaptcha form-group" data-callback="recaptchaCallback" data-sitekey="6LeEEwwUAAAAAA5fXXtGbQKU7TCLq6MHOZZF2elp"></div>
	    <input type="submit" class="btn btn-primary" id="submit-button" disabled>
	    </form>';
	    return $form;
	}

	add_action( 'wp_footer', 'validate_form' );

	function validate_form() {
		?>
		<script type="text/javascript" >
			jQuery(document).ready(($) => {
				$('form').validate({
					rules: {
						firstName: {
							required: true
						},

						surname: {
							required: true
						},

						jobTitle: {
							required: true
						},

						company: {
							required: true
						},

						email: {
							required: true,
							email: true
						},

						phone: {
							required: true
						}
					}
				});
			});

			function recaptchaCallback() {
				jQuery(document).ready(($) => {
    				$('#submit-button').removeAttr('disabled');
    			});
			};
		</script> 
		<?php
	}

	add_action( 'admin_print_footer_scripts', 'my_action_javascript' );

	function my_action_javascript() { ?>
		<script type="text/javascript" >
			jQuery(document).ready(($) => {
			});
		</script> <?php
	}
	
	