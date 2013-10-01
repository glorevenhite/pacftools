<script>
jQuery(function () {
    $('#arrived_date').datepicker();
    $('#doc_date').datepicker();
    $('#doc_deadline').datepicker();

    $("#doc_cat").val("<?php echo $form_values['doc_cat']?>");
    $("#doc_security").val("<?php echo $form_values['doc_security']?>");
    $("#doc_priority").val("<?php echo $form_values['doc_priority']?>");

});
</script>

<form action="../update/<?php echo $form_values['doc_id']?>" method="post" id="creation_form" name="indoc_creation_form" enctype="multipart/form-data" class="pure-form pure-form-aligned">
  <fieldset>
    <legend>Chi tiết công văn</legend>

      <div class="pure-g-r">
        <div class="pure-control-group pure-u-1-2">
          <label for="doc_cat">Phân loại</label>
          <select id="doc_cat" name="doc_cat">
            <option value="CVDEN"> Công văn đến </option>
            <option value="CVDI"> Công văn đi </option>
            <option value="VBPL">Văn bản pháp luật</option>
            <option value="VBNB">Văn bản Nội bộ</option>
            <option value="BMAU">Biểu mẫu</option>
          </select>
        </div>
        <!--  -->
        <div class="pure-control-group pure-u-1-2">
          <label for="arrived_date">Ngày đến</label>
          <input type="text" id="arrived_date" name="arrived_date" value="<?php echo $form_values['arrived_date']; ?>" />
        </div>
      </div>

      <div class="pure-g-r">
      <div class="pure-control-group pure-u-1-2">
        <?php echo form_label("Số và Ký hiệu văn bản",'doc_code')?>
        <input type="text" id="doc_code" name="doc_code" value="<?php echo $form_values['doc_code'];?>"/>
      </div>

      <div class="pure-control-group pure-u-1-2">
        <label for="doc_author">Tổ chức ban hành </label>
        <input type="text" id="doc_author" name="doc_author" value="<?php echo $form_values['doc_author'];?>" />
      </div>
      </div>


      <div class="pure-control-group">
        <label for="doc_date">Ngày tháng văn bản</label>
        <input type="text" id="doc_date" name="doc_date" value="<?php echo $form_values['doc_date'];?>"/>
      </div>

      <div class="pure-g-r">
      <div class="pure-control-group pure-u-1-2">
        <?php echo form_label("Tiêu đề văn bản",'doc_title')?>
        <input type="text" id="doc_title" name="doc_title" value="<?php echo $form_values['doc_title'];?>"/>
      </div>

      <div class="pure-control-group pure-u-1-2">
        <label for="doc_pages">Số trang</label>
        <input type="text" id="doc_pages" name="doc_pages" value="<?php echo $form_values['doc_pages'];?>" />
      </div>
      </div>

    <div class="pure-g-r">
      <div class="pure-control-group pure-u-1-2">
        <label for="doc_security">Mức độ bảo mật</label>
        <select id="doc_security" name="doc_security">
          <option value="BTH">Bình thường</option>
          <option value="MAT">Mật</option>
          <option value="TMT">Tối mật</option>
          <option value="TTM">Tuyệt mật</option>
        </select>
      </div>

      <div class="pure-control-group pure-u-1-2">
        <label for="doc_priority">Mức độ khẩn</label>
        <select id="doc_priority" name="doc_priority">
          <option value="BTH">Bình thường</option>
          <option value="KHA">Khẩn</option>
          <option value="THK">Thượng khẩn</option>
          <option value="HTC">Hỏa tốc</option>
         </select>
      </div>
      </div>

      <div class="pure-control-group">
        <label for="doc_deadline">Thời hạn giải quyết</label>
        <input type="text" id="doc_deadline" name="doc_deadline" value="<?php echo $form_values['doc_deadline'];?>" />
      </div>

      <div class="pure-control-group">
        <label for="attachment">File</label>
        <input type="file" id="attachment" name="attachment"/>
      </div>

      <div class="pure-controls">
        <?php echo form_submit('submit', 'Cập nhật', "class='pure-button'"); ?>
      </div>

      <?php echo validation_errors('<p class="error">'); ?>
  </fieldset>
</form>