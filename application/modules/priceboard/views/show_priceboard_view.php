<div id="wrapper">
<?php echo modules::run('login/cp');?>
<h2>Lịch sử giá</h2>
<?php echo modules::run('priceboard/show');?>
<?php echo anchor(base_url().'priceboard/insert', "Thêm");?>
</div>
