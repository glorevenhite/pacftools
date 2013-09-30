<div id="wrapper">
  <?php echo form_open('login/validate_credentials',"id='login_form', class='pure-form pure-form-aligned'");?>
  <div class="pure-control-group">
    <?php echo form_label('Tài khoản:','username');?>
    <?php echo form_input('username');?>
  </div>

  <div class="pure-control-group">
  <?php echo form_label('Mật khẩu:','password');?>
  <?php echo form_password('password'); ?>
  </div>

  <div class="pure-controls">
    <?php echo form_submit('submit', 'Login', "class='pure-button'"); ?>
    <?php echo anchor('login/signup', 'Create Account', 'class="pure-button"');?>
  </div>

  <?php echo form_close(); ?>
</div>