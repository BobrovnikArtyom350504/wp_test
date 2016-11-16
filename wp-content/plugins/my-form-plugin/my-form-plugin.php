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

	function create_form() { 
	    echo '
	    <form class="col-md-9">
	    <div class="form-group">
		    <label for="name-input">Username <strong>*</strong></label>
		    <input type="text" name="first-name" class="form-control" placeholder="First name" id="name-input">
	    </div>
	     
	    <div class="form-group">
		    <label for="surname-input">Surname <strong>*</strong></label>
		    <input type="text" name="surname" class="form-control" placeholder="Surname" id="surname-input">
	    </div>
	     
	    <div class="form-group">
		    <label for="job-input">Job Title <strong>*</strong></label>
		    <input type="text" name="job-title" class="form-control" placeholder="Job title" id="job-input">
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
		    <select class="form-control" id="country-select">
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
      			<input type="checkbox" class="form-check-input">
      			Check me out
    		</label>
	    </div>

	    <div class="form-check">
		    <label class="form-check-label">
      			<input type="checkbox" class="form-check-input" id="checkbox-2">
      			Check me out
    		</label>
	    </div>
		
		<div class="form-check">
		    <label class="form-check-label">
      			<input type="checkbox" class="form-check-input" id="checkbox-1">
      			Check me out
    		</label>
	    </div>
		
	    <button type="submit" class="btn btn-primary" id="submit-button">Submit</button>
	    </form>
	    ';
	}