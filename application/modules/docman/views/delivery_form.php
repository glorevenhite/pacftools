<p><?php echo $document['doc_title'];?></p>

<form action="../assign" method="post" id="assign_form" name="assign_form" class="pure-form pure-form-aligned">
  <div class="pure-controls">
    <?php widget::run('users_list')?>
  </div>
  <div class="pure-controls">
    <input type="hidden" name="doc_id" value="<?php echo $document['doc_id']?>" />
  </div>

  <div class="pure-controls">
    <?php echo form_submit('submit', 'Chuyển', "class='pure-button pure-button-primary'"); ?>
  </div>

   <?php echo validation_errors('<p class="error">'); ?>
</form>




