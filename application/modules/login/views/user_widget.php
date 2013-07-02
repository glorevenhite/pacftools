<code class="user-widget">
  <?php echo $first_name.' '. $last_name;?> &middot;
  <?php echo anchor(base_url().'site/members_area','Dashboard');?> |
  <?php echo anchor(base_url().'site/profile/'.$id,'Profile');?> |
  <?php echo anchor(base_url().'site/message/'.$id,'Message');?> |
  <?php echo anchor(base_url().'priceboard','Bảng giá');?>  |
  <?php echo anchor(base_url().'login/logout', 'Logout');?>
</code>
