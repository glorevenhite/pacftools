<?php modules::run('login/is_logged_in_as_admin')?>
<h2>Create an Account!</h2>
<?php echo form_open('login/create_member', "id='signup_form', class='pure-form pure-form-aligned'"); ?>
<fieldset>
<legend>Thông tin cá nhân</legend>
  <div class="pure-control-group">
  <?php echo form_label("Họ tên:",'full_name')?>
  <?php echo form_input('full_name', set_value('full_name')); ?>
  </div>

  <div class="pure-control-group">
  <?php echo form_label("Email",'email_address')?>
  <?php echo form_input('email_address', set_value('email_address'));?>
  </div>
</fieldset>

<fieldset>
<legend>Thông tin đăng nhập</legend>
<div class="pure-control-group">
<?php echo form_label("Username",'email_address')?>
<?php echo form_input('username', set_value('username')); ?>
</div>
<div class="pure-control-group">
<?php echo form_label("Password",'email_address')?>
<?php echo form_input('password', set_value('password')); ?>
</div>
<div class="pure-control-group">
<?php echo form_label("Confirmed",'password2')?>
<?php echo form_input('password2'); ?>
</div>
<div class="pure-controls">
<?php echo form_submit('submit', 'Create Acccount', "class='pure-button'"); ?>
</div>

<?php echo validation_errors('<p class="error">'); ?>
</fieldset>