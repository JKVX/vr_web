    <link href="<?= site_url('files/addnewmember/styles.css')?>" type="text/css" rel="stylesheet"/>
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

      <a href="<?= site_url('members/manage_role')?>" style="text-decoration:none;" onMouseOut ="over2('u39_img')" onMouseOver ="down2('u39_img')">
      <div id="u39" class="ax_形状">
        <img id="u39_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u40" class="text">
          <p><span>&nbsp; &nbsp; 角色管理</span></p>
        </div>
      </div>
       </a>

      <script type="text/javascript">
  function over2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
  }
  function down2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
  }
      </script>

      <div id="u29" class="ax_h1">
        <div id="u30" class="text">
          <p><span>增加成员</span></p>
        </div>
      </div>


      <form class="form-horizontal" role="form" method="post" id="Info" enctype="multipart/form-data">
      <div id="u32" class="ax_html__">
        <input id="u32_input" type="file" value="选择图片" name="pic_name" required="required" />
      </div>
      
      <div id="u34" class="ax_html__">
        <input id="u34_input" type="text" name="members_name" required="required" />
      </div>
        <select id="u38_select" name="role_id">
        <?php foreach ($member_role as $row):?>
          <option value="<?= $row['id']?>"><?= $row['role_name']?></option>
        <?php endforeach; ?>
        </select>
        <textarea id="u38_textarea" name="members_intro" required="required" ></textarea>
      <input type="submit" name="" value="添加成员" id="u38_button" onClick="javascript:Info.action='<?= site_url("members/add_members/")?>';javascript:Info.target='_self';">
      </form>

      <div id="u33" class="text">
        <p><span>成员姓名</span></p>
      </div>

      <div id="u35" class="text">
          <p><span>成员图片</span></p>
      </div>

      <div id="u36" class="text">
          <p><span>成员角色</span></p>
      </div>

      <div id="u37" class="text">
          <p><span>成员简介</span></p>
      </div>
     
    </div>
  </body>
</html>
