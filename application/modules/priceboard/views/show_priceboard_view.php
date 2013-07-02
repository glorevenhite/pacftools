<?php $this->load->view('includes/header'); ?>

<div id="wrapper">
<?php echo modules::run('login/cp');?>
<h2>Lịch sử giá</h2>
<?php echo $main_content;?>
<?php echo anchor(base_url().'priceboard/insert', "Thêm");?>
</div>

<?php $this->load->view('includes/tut_info'); ?>

<?php $this->load->view('includes/footer'); ?>
