    <link href="<?= base_url('files/deletemember/styles.css')?>" type="text/css" rel="stylesheet"/>
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

<!-- <form class="form-horizontal" role="form" method="post" id="Info" enctype="multipart/form-data">
<input type="text" name="id" id="members_id" hidden="hidden" required>
<div id="u33" class="ax_h1">
  <div id="u34" class="text">
    <p><span>成员姓名</span></p>
  </div>
  <input type="text" id="u34_input" value="" name="members_name" required>
</div> 
<div id="u35" class="ax_h1">
  <div id="u36" class="text">
    <p><span>成员角色</span></p>
  </div>
  <select id="u36_select" name="role_id">
  <?php foreach ($member_role as $row):?>
    <option value="<?= $row['id']?>"><?= $row['role_name']?></option>
  <?php endforeach;?>
  </select>
</div> 
<div id="u37" class="ax_h1">
  <div id="u38" class="text">
    <p><span>成员简介</span></p>
  </div>
  <textarea id="u38_textarea" name="members_intro" required></textarea>
  <input type="submit"  id="u38_button" value="更新信息" onClick="javascript:Info.action='<?= site_url("members/update_members/")?>';javascript:Info.target='_self';" style="visibility:hidden"/>
</div>  
</form> -->
      <div id="u39" class="ax_h1">
        <img id="u39_img" class="img " src="<?= base_url('resources/images/transparent.gif')?>"/>
        <div id="u40" class="text">
          <p><span>现有成员</span></p>
        </div>
      </div>

      <div id="u41" class="ax_列表选择框" onclick="get_members_detail()">
        <select id="u41_input" size="2">
        <?php $member_role_count=count($members); 
        for($i=0;$i<$member_role_count;$i++): $members_count=count($members[$i]);?>
          <option value="-1">--<?= $member_role[$i]['role_name']?>--</option>
          <?php for($j=0;$j<$members_count;$j++):?>
          <option name="<?= $members[$i][$j]['id']?>" value="<?=  $members[$i][$j]['id']?>"><?= $members[$i][$j]['members_name']?></option>
          <?php endfor;?>
         <?php endfor;?>
        </select>
      </div>

      <div id="u42" class="ax_html__">
        <input id="u42_input" type="submit" value="删除成员" onclick="delete_members()" />
      </div>

      <div id="u43" class="ax_html__">
        <input id="u43_input" type="submit" value="上移" onclick="up_members()" />
      </div>

      <div id="u44" class="ax_html__">
        <input id="u44_input" type="submit" value="下移" onclick="down_members()"/>
      </div>

      <div id="j1" class="ax_html__">
        <input id="j2" type="submit" value="编辑成员" onclick="edit_members()" />
      </div>

      <div id="u45" class="ax_image">
        <img id="u45_img" class="img " src="<?= base_url('images/deletemember/u37.png')?>"/>
        <div id="u46" class="text">
          <p><span></span></p>
        </div>
      </div>

      <script type="text/javascript">
        function over2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
  }
  function down2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
  }
  function edit_members(){
    if($("#u41_input").val()!="-1"&&$("#u41_input").val()!="-2"&&$("#u41_input").val()!=null){
          window.location.href="<?= site_url('members/edit_member/')?>"+"/"+$("#u41_input").val();       
    }
  }
   
      function get_members_detail(){
       if($("#u41_input").val()!=-1&&$("#u41_input").val()!=-2&&$("#u41_input").val()!=null){
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u41_input").val()},
          url : "<?= site_url("members/get_members_detail/") ?>",
          cache : false,
          success : function(data) {
            var image=document.getElementById('u45_img');
            var path="<?= base_url('documents/members/')?>"+"/"+data[0]['pic_name'];
            image.src=path;
          }
        });
      }else{
        document.getElementById('u45_img').src="<?= base_url('images/deletemember/u37.png')?>";
        $("#u41_input").val("-2");
      }
      }
      function delete_members(num){
       if($("#u41_input").val()!=-1&&$("#u41_input").val()!=-2&&$("#u41_input").val()!=null){
          if(confirm("确定删除此成员？删除后不可恢复。")){
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u41_input").val()},
          url : "<?= site_url("members/delete_members/") ?>",
          cache : false,
          success : function(data) {
            alert('删除成员成功');
            $(document).find("option[name='"+$("#u41_input").val()+"']").remove();
            $("#u41_input").val("-2");
            $("#u34_input").val("");
            $("#u36_select").val("-2");
            $("#u38_textarea").val("");
            document.getElementById('u45_img').src="<?= base_url('images/deletemember/u37.png')?>";
          }
        });
      }
      }
      }

      function up_members(){
       if($("#u41_input").val()!=-1&&$("#u41_input").val()!=-2&&$("#u41_input").val()!=null){
          var prev=$(document).find("option[name='"+$("#u41_input").val()+"']").prev();
          if(prev.val()!=-1){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u41_input").val()},
          url : "<?= site_url("members/up_members/") ?>",
          cache : false,
          success : function(data) {
            alert('移动成员成功');
            var option=$(document).find("option[name='"+$("#u41_input").val()+"']");
            var prev=option.prev();
            prev.before(option);
          }
        });  
        }
            $("#u34_input").val("");
            $("#u36_select").val("-2");
            $("#u38_textarea").val("");
        }
            document.getElementById('u45_img').src="<?= base_url('images/deletemember/u37.png')?>";
      }
      function down_members(){
       if($("#u41_input").val()!=-1&&$("#u41_input").val()!=-2&&$("#u41_input").val()!=null){
          var next=$(document).find("option[name='"+$("#u41_input").val()+"']").next();
          if(next.val()!=-1){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u41_input").val()},
          url : "<?= site_url("members/down_members/") ?>",
          cache : false,
          success : function(data) {
            alert('移动成员成功');
            var option=$(document).find("option[name='"+$("#u41_input").val()+"']");
            var next=option.next();
            next.after(option);
        

           }
        });
       }
       $("#u41_input").val("-2");
                   $("#u41_input").val("-2");
            $("#u34_input").val("");
            $("#u36_select").val("-2");
            $("#u38_textarea").val("");
      }
            document.getElementById('u45_img').src="<?= base_url('images/deletemember/u37.png')?>";
      }
      </script>

    </div>
  </body>
</html>
