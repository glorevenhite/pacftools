<div id="horizontal-menu" class="pure-menu pure-menu-horizontal pure-menu-notouch pure-menu-open">
  <?php echo 'Hello ' . $username . ' !';?>
  <ul id="std-menu-items">
      <li><a href="<?php echo base_url() .'site/members_area'?>"><i class="icon-fixed-width icon-home"></i>Trang chủ</a></li>
      <li><a href="<?php echo base_url() .'login/manage_users'?>">Site Admin</a></li>
      <li><?php echo anchor(base_url().'#','Profile');?></li>
      <li><?php echo anchor(base_url().'#','Tin nhắn');?></li>
      <li><?php echo anchor(base_url().'#', 'Công việc');?></li>
      <!-- <li><?php echo anchor(base_url().'priceboard','Bảng giá¡');?></li> -->
      <li><?php echo anchor(base_url().'docman','Tài liệu');?></li>
      <li><?php echo anchor(base_url().'login/logout', 'Logout');?></li>
  </ul>
</div>