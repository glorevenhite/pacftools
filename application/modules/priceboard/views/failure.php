<?php $this->load->view('includes/header'); ?>

<div id="wrapper">
<?php echo modules::run('login/cp');?>
<h2>Sorry!</h2>
<p>Your record has not been created. <?php echo anchor(base_url().'priceboard', 'Quay lại trang cập nhật');?></p>

</div>

<?php $this->load->view('includes/footer'); ?>
