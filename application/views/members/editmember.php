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
          <p><span>编辑成员</span></p>
        </div>
      </div>


      <form class="form-horizontal" role="form" method="post" id="Info" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $members['id']?>">
      <div id="u32" class="ax_html__">
        <input id="u32_input" type="file" value="选择图片" name="pic_name" onchange="pre_view()" />
      </div>
      
      <div id="u34" class="ax_html__">
        <input id="u34_input" type="text" name="members_name" required="required" value="<?= $members['members_name']?>" />
      </div>
        <select id="u38_select" name="role_id" required value="<?= $members['role_id']?>">
        <?php foreach ($member_role as $row):?>
          <option value="<?= $row['id']?>" <?php if($row['id']==$members['role_id']):?> selected <?php endif;?>><?= $row['role_name']?></option>
        <?php endforeach; ?>
        </select>
        <input type="text" name="admission_year" id="admission_year" required value="<?= $members['admission_year']?>">
        <input type="text" name="major" id="major" required value="<?= $members['major']?>">
        <div id="skill_div">
          <input type="text" name="skill1" class="skill" value="<?= $members['skill1']?>">
          <input type="text" name="skill2" class="skill" value="<?= $members['skill2']?>">
          <input type="text" name="skill3" class="skill" value="<?= $members['skill3']?>">
          <input type="text" name="skill4" class="skill" value="<?= $members['skill4']?>">
          <input type="text" name="skill5" class="skill" value="<?= $members['skill5']?>">
          <input type="text" name="skill6" class="skill" value="<?= $members['skill6']?>">
          <input type="text" name="skill7" class="skill" value="<?= $members['skill7']?>">
          <input type="text" name="skill8" class="skill" value="<?= $members['skill8']?>">
          <input type="text" name="skill9" class="skill" value="<?= $members['skill9']?>">
          <input type="text" name="skill10" class="skill" value="<?= $members['skill10']?>">
        </div>
      <input type="submit" value="保存修改" id="u38_button" onClick="javascript:Info.action='<?= site_url("members/update_members/")?>';javascript:Info.target='_self';">
      </form>

      <div id="img_show"><img id="img_show_img" src="<?= site_url('documents/members/').'/'.$members['pic_name']?>"></div>
      <div id="u33" class="text">
        <p><span>姓名</span></p>
      </div>

      <div id="u35" class="text">
          <p><span>图片</span></p>
      </div>

      <div id="u36" class="text">
          <p><span>角色</span></p>
      </div>

      <div id="j1" class="text">
          <p><span>年级</span></p>
      </div>

      <div id="j2" class="text">
          <p><span>专业</span></p>
      </div>
     
         <div id="j3" class="text">
          <p><span>技能</span></p>
      </div>
     <script type="text/javascript">
     function pre_view(){
            var url = window.URL.createObjectURL(document.getElementById("u32_input").files[0])
            document.getElementById("img_show_img").src=url;
          }
     </script>
    </div>
  </body>
</html>
