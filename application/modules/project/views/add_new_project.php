<div id="wrapper">
  <h2>Tạo dự án mới</h2>

  <?php echo form_open("project/add", "class='pure-form pure-form-aligned'");?>
  <div class="pure-control-group">
    <label for='project_name'>Tên dự án:</label>
    <input type='text' id='project_name' name="project_name">
  </div>

  <div class="pure-control-group">
    <label for='start_date'>Ngày bắt đầu:</label>
    <input type='text' id='start_date' name="start_date" class='datepicker'/>
  </div>

  <div class="pure-control-group">
    <label for='end_date'>Ngày kết thúc:</label>
    <input type='text' id='end_date' name="end_date" class='datepicker'/>
  </div>

  <div class="pure-control-group">
    <label>Trạng thái</label>
  <span id="status">
    <label for='yet_started' class='pure-radio'>Chưa bắt đầu</label>
    <input type='radio' id='yet_started' name='status' value='Chưa bắt đầu' />
    <label for='processing' class='pure-radio'>Đang tiến hành</label>
    <input type='radio' id='processing' name='status' value='Đang tiến hành' />
    <label for='finished' class='pure-radio'>Đã hoàn thành</label>
    <input type='radio' id='finished' name='status' value="Đã hoàn thành" />
  </span>
  </div>

  <div class="pure-control-group">
    <label for="assignee">Người thực hiện:</label>
    <input type='text' id='assignee' name='assignee'/>

  </div>
  <div class="pure-controls">
  <button type='submit' class='pure-button'>Tạo dự án mới</button>
  </div>
  <?php form_close();?>
</div>

<script type='text/javascript'>
  $(".datepicker").datepicker();
  $(".datepicker").datepicker("option","dateFormat","yy-mm-dd");
  $("#status").buttonset();
</script>