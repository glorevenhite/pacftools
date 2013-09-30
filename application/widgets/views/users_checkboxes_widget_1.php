<select id="assignee" name ="assignee[]" multiple="multiple">
  <?php foreach($users as $u):?>
  <option value="<?php echo $u['id']?>"><?php echo $u['username']?></option>
  <?php endforeach;?>
</select>