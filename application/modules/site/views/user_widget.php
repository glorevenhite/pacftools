<div id="horizontal-menu" class="pure-menu pure-menu-horizontal pure-menu-notouch pure-menu-open">
  <a href="#" class="pure-menu-heading"><?php echo $full_name;?></a>
    <ul id="std-menu-items">
        <li><?php echo anchor(base_url().'site/members_area','Dashboard');?></li>
        <li><?php echo anchor(base_url().'site/profile/'.$id,'Profile');?></li>
        <li><?php echo anchor(base_url().'site/message/'.$id,'Message');?></li>
        <li><?php echo anchor(base_url().'project', 'Dự án');?></li>
        <li><?php echo anchor(base_url().'priceboard','Bảng giá');?></li>
        <li><?php echo anchor(base_url().'login/logout', 'Logout');?></li>
    </ul>
</div>

<script>
YUI({
    classNamePrefix: 'pure'
}).use('gallery-sm-menu', function (Y) {

    var horizontalMenu = new Y.Menu({
        container         : '#horizontal-menu',
        sourceNode        : '#std-menu-items',
        orientation       : 'horizontal',
        hideOnOutsideClick: false,
        hideOnClick       : false
    });

    horizontalMenu.render();
    horizontalMenu.show();

});
</script>
