<div class="search-result">
  <table id="search-result-table" class="pure-table pure-table-bordered">
    <thead>
      <tr>
        <th>Mã</th>
        <th width="350px">T�n</th>
        <th>Ngày</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
    <?php if (count($content) > 0) :?>
    <?php foreach ($content as $key=>$value):?>
      <tr>
        <td>
      <?php echo($value['doc_code']);?>
        </td>
      <td>
        <?php echo($value['doc_title']);?>
       </td>
        <td><?php echo($value['doc_date']);?></td>
        <td>
          <a href="<?php echo $value['attachment'];?>" class="pure-button"><i class="icon-download-alt"></i></a>
          <?php if(modules::run('login/is_logged_in_as_admin')):?>
          <a href="edit/<?php echo $value['doc_id'];?>" class="pure-button"><i class="icon-edit"></i></a>
          <a href="assignees/<?php echo $value['doc_id'];?>" class="pure-button"><i class="icon-info-sign"></i></a>
           <a href="deliver/<?php echo $value['doc_id'];?>" class="pure-button">Chuyển</a>
          <?php endif;?>
        </td>

      </tr>
    <?php endforeach;?>
    <?php endif;?>
    </tbody>
  </table>
</div>
