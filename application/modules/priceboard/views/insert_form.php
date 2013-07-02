<?php $this->load->view('includes/header'); ?>

<div id="container">
	<h1>Bảng giá Nhân xô gửi kho</h1>

    <?php echo form_open('priceboard/insert','id=myform');?>
    <?php echo form_input('price');?>
    <?php echo form_submit('submit', 'Submit');?>
    <?php echo form_close();?>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

<?php $this->load->view('includes/tut_info'); ?>

<?php $this->load->view('includes/footer'); ?>