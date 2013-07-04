<script>$(function() {
  $("#radio").buttonset();

}
</script>
<div id="wrapper">
  <h2>Tạo dư án mới</h2>
  <?php echo form_open("project/add");?>
  <?php echo form_label("Project Name:", "project_name");?>
  <?php echo form_input("project_name");?>
  <?php echo form_label("Start Date","start_date");?>
  <?php echo form_input("start","","class='datepicker'")?>
  <?php echo form_label("End Date","end_date");?>
  <?php echo form_input("end","","class='datepicker'")?>

  <?php echo form_label("Status","status");?>
  <div id="radio">
  <?php echo form_radio('status', 'yet_started', TRUE);?>
  <?php echo form_label("Yet Started", 'yet_started')?>
  <?php echo form_radio('status', 'processing', FALSE);?>
  <?php echo form_label("Starting", 'processing')?>
  <?php echo form_radio('status', 'finished', FALSE);?>
  <?php echo form_label("Finished", 'finished')?>
  </div>
  <?php echo form_input("user_id")?>
  <?php echo form_submit("submit", "Thêm Dự án")?>
  <?php echo form_close();?>
</div>

<script type='text/javascript'>
  $(".datepicker").datepicker();
  $(".datepicker").datepicker("option","dateFormat","yy-mm-dd");
  $("input[type=submit],button").button().click(function(event) {event.preventDefault();});
</script>