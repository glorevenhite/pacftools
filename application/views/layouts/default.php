<?php $this->load->view('includes/header'); ?>

<div id="wrapper">
  <?php widget::run('site_navigation');?>
  <h1><?php echo $template['title'];?></h1>
  <?php $this->load->view($main_content)?>
</div>
<?php $this->load->view('includes/footer'); ?>