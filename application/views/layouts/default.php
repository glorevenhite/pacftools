<?php $this->load->view('includes/header'); ?>
  <div id="wrapper">
    <?php widget::run('site_navigation');?>
    <?php $this->load->view($main_content)?>
  </div>
<?php $this->load->view('includes/footer'); ?>