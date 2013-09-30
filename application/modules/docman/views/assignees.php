<form method="post" action="../update_assignees">
<table class="pure-table pure-table-bordered">
  <thead>
    <tr>
      <th>STT</th>
      <th>Username</th>
      <th>Họ và tên </th>
      <th>Chọn </th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1 ?>
    <?php foreach($records as $r):?>

    <tr>
      <td><?php echo $i++?></td>
      <td><?php echo $r['username']?></td>
      <td><?php echo 'Your name'?></td>
      <td><?php echo form_checkbox('assignee[]', $r['assignment_id'], TRUE)?></td>
    </tr>
    <?php endforeach;?>
</tbody>
</table>
  <?php echo form_submit('submit', 'Cập nhật')?>
</form>