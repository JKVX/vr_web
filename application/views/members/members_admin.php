    <link href="<?= base_url('files/members_admin/styles.css')?>" type="text/css" rel="stylesheet"/>
    
  </head>
  <body>
    <div id="base" class="">
      <div id="u7" class="ax_形状">
      </div>

      <div id="u9" class="ax_形状">
      </div>

      <a href="<?= site_url('members/deletemember')?>" style="text-decoration:none;" onMouseOut ="over2('u11_img')" onMouseOver ="down2('u11_img')">
      <div id="u11" class="ax_形状">
        <img id="u11_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u12" class="text">
          <p><span>&nbsp; &nbsp; 成员管理</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('members/addnewmember')?>" style="text-decoration:none;" onMouseOut ="over2('u13_img')" onMouseOver ="down2('u13_img')">
      <div id="u13" class="ax_形状">
        <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u14" class="text">
          <p><span>&nbsp; &nbsp; 新加成员</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('members/manage_role')?>" style="text-decoration:none;" onMouseOut ="over2('u50_img')" onMouseOver ="down2('u50_img')">
      <div id="u50" class="ax_形状">
        <img id="u50_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u51" class="text">
          <p><span>&nbsp; &nbsp; 角色管理</span></p>
        </div>
      </div>
      </a>
            
  </body>
</html>
<script type="text/javascript">
  function over2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
  }
  function down2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
  }
</script>