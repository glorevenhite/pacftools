<?php $this->load->view('includes/header'); ?>

<div id="wrapper">
    <?php echo modules::run('login/cp');?>
	<h2>Cập nhật giá cà phê gửi kho</h2>
    <?php echo form_open("priceboard/insert","id='myform'");?>
    <?php echo form_input('price');?>
    <?php echo form_submit('submit', 'Submit');?>
    <?php echo form_close();?>
</div>

<?php $this->load->view('includes/footer'); ?>