<table class="pure-table">
  <thead>
    <tr>
      <th><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check_all'));?></th>
      <th>Tên dự án</th>
      <th>Ngày bắt đầu</th>
      <th>Ngày hoàn thành</th>
      <th>Trạng thái</th>
      <th>Người thực hiện</th>
      <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($projects as $project): ?>
    <tr>
      <td><?php echo form_checkbox('action_to[]', $project->id)?></td>
      <td><?php echo $project->name;?></td>
      <td><?php echo $project->start;?></td>
      <td><?php echo $project->end;?></td>
      <td><?php echo $project->status;?></td>
      <td><?php echo $project->full_name;?></td>
      <td>
        <?php echo anchor(base_url() . 'project/admin/edit/' . $project->id, 'edit');?>
        <?php echo anchor(base_url() . 'project/admin/delete/' . $project->id,'delete');?>
      </td>
    </tr>
   <?php endforeach;?>
  </tbody>
</table>
