<h1>Your Plugin Name</h1>
<form method="post" action="options.php">
    <?php settings_fields( 'plugin-settings-group' ); ?>
    <?php do_settings_sections( 'plugin-settings-group' ); ?>
    <input name="isCaptchaNeed" type="checkbox" value="1" id="captcha-checkbox" <?php checked( '1', get_option('isCaptchaNeed'));?>/>
    <label for="captcha-checkbox">Do you need captcha?</label>
    <?php submit_button(); ?>
</form>

