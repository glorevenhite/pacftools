<?php $this->load->view('includes/header'); ?>

<div id="container">
	<h1><?php echo($heading);?></h1>

    <?php echo form_open('#','id=myform');?>
    <?php echo form_input('price');?>
    <?php echo form_submit('submit', 'Submit');?>
    <?php echo form_close();?>

    <?php $this->table->set_heading(array('id', 'date', 'price'));?>
    <?php echo $this->table->generate($records); ?>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

<?php $this->load->view('includes/tut_info'); ?>

<?php $this->load->view('includes/footer'); ?>