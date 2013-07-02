<?php $this->load->view('includes/header')?>

<div id="wrapper">
  <?php echo modules::run('login/cp');?>
  <h2><?php echo $first_name;?>'s Messages</h2>
  <p>This could be a page where the message systems displays</p>
</div>

<?php $this->load->view('includes/footer')?>