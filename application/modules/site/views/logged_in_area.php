  <div id="wrapper">
    <?php #echo modules::run('login/cp');?>
	<h2>Welcome Back, <?php echo $this->session->userdata('username'); ?>!</h2>
     <p>This section represents the area that only logged in members can access.</p>
  </div>
