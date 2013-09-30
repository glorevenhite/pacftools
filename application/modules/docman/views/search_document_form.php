<script>
jQuery(function () {
    $('#from_date').datepicker();
    $('#to_date').datepicker();
});
</script>
<form action="search" id="search" name="search" class="pure-form pure-form-aligned" method="post">
  <fieldset>
    <legend>Tìm kiếm</legend>
      <div class="pure-control-group">
        <label for="from_date">Từ ngày</label>
        <input type="text" id="from_date" name="from_date" />
      </div>
      <div class="pure-control-group">
        <label for="to_date">Ngày đến</label>
        <input type="text" id="to_date" name="to_date" />
      </div>

      <div class="pure-control-group">
        <?php echo form_label("Số và Ký hiệu văn bản",'doc_code')?>
        <input type="text" id="doc_code" name="doc_code"/>
      </div>

      <div class="pure-control-group">
        <?php echo form_label("Tiêu đề văn bản",'doc_title')?>
        <input type="text" id="doc_title" name="doc_title"/>
      </div>

      <div class="pure-controls">
        <?php echo form_submit('submit', 'Tìm kiếm', "class='pure-button'"); ?>
      </div>

      <?php echo validation_errors('<p class="error">'); ?>
  </fieldset>
</form>
