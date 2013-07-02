<?php echo $this->load->view('includes/header');?>
<div id="wrapper">
	<h2>Truy cập bị từ chối</h2>
     <p>Bạn không có quyền truy cập trang này. Vui lòng <?php echo anchor(base_url().'login', "Đăng nhập")?></p>

  </div>
<?php echo $this->load->view('includes/footer');?>