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
    <?php foreach($users as $u):?>

    <tr>
      <td><?php echo $i++?></td>
      <td><?php echo $u['username']?></td>
      <td><?php echo 'Your name'?></td>
      <td><?php echo form_checkbox('assignee[]', $u['id'])?></td>
    </tr>
    <?php endforeach;?>
</tbody>
</table>
