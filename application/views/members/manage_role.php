    <link href="<?= base_url('files/manage_role/styles.css')?>" type="text/css" rel="stylesheet"/>
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

      <a href="<?= site_url('members/manage_role')?>" style="text-decoration:none;" onMouseOut ="over2('u17_img')" onMouseOver ="down2('u17_img')">
      <div id="u17" class="ax_形状">
        <img id="u17_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u18" class="text">
          <p><span>&nbsp; &nbsp; 角色管理</span></p>
        </div>
      </div>
      </a>

      <div id="u33" class="ax_h1">
        <div id="u34" class="text">
          <p><span>角色信息</span></p>
        </div>
      </div>

        <div id="u37" class="ax_h1">
          <div id="u38" class="text">
            <p><span>角色名称</span></p>
          </div>
        </div>
        <div id="u39" class="ax_文本框_单行_">
          <input id="u39_input" name="member_role_title" type="text" value="" maxlength="150" />
        </div>

      <div id="u42" class="ax_文本框_多行_">
      <input id="u35_input" type="submit" value="添加角色" onclick="create_member_role()"/>
      </div>     
<script>
  function over2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
  }
  function down2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
  }
    function create_member_role() {
      if($("#u39_input").val()!=""){
               $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'role_name':$("#u39_input").val(),},
          url : "<?= site_url("members/create_member_role/") ?>",
          cache : false,
          success : function(data) {
            alert('添加成员角色成功！');
           var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['role_name']+"</option>";
            }   
            $("#u43_input").empty().append(addHtml).trigger("create");
            document.getElementById('u39_input').value="";
            $("#u43_input").val("-1");
           }
        });
      }else{
        alert("角色名不能为空！");
      }
    }
</script>
      <div id="u43" class="ax_列表选择框">
        <select id="u43_input" size="2">
        <option value="-1" hidden="hidden" selected="selected"></option>
        <?php
        $count=0;
         foreach ($member_role as $rows) {?>
           <option name="<?=$rows['id']?>" value="<?=$rows['id']?>"><?=$rows['role_name']?></option>
         }
        <?php }?>
        </select>
      </div>
      <div id="u44" class="ax_html__">
        <input id="u44_input" type="submit" value="删除角色" onclick="delete_member_role()"/>
      </div>
      <div id="u45" class="ax_html__">
        <input id="u45_input" type="submit" value="上移" onclick="up_member_role()"/>
      </div>
      <div id="u46" class="ax_html__">
        <input id="u46_input" type="submit" value="下移" onclick="down_member_role()" />
      </div>
      <script type="text/javascript">
      function delete_member_role(){
               if(confirm("确定删除此角色？删除后不可恢复。")){ $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u43_input").val()},
          url : "<?= site_url("members/delete_member_role/") ?>",
          cache : false,
          success : function(data) {
            if(data=="1"){
              alert('删除角色成功！');
              $(document).find("option[name='"+$("#u43_input").val()+"']").remove();
              document.getElementById("u39_input").value="";
              UE.getEditor('editor').setContent("");
            }else if(data=="0"){
              alert('请先删除该角色下的成员');
            }
            $("#u43_input").val("-1");
          }
        });
      }
      }

      function up_member_role(){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u43_input").val()},
          url : "<?= site_url("members/up_member_role/") ?>",
          cache : false,
          success : function(data) {
            alert('移动成员角色成功！');
            var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['role_name']+"</option>";
            }   
            $("#u43_input").empty().append(addHtml).trigger("create");
            $("#u43_input").val("-1");
           }
        });
      }

      function down_member_role(){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u43_input").val()},
          url : "<?= site_url("members/down_member_role/") ?>",
          cache : false,
          success : function(data) {
            alert('移动成员角色成功！');
            var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['role_name']+"</option>";
            }   
            $("#u43_input").empty().append(addHtml).trigger("create");
            $("#u43_input").val("-1");
           }
        });
      }
      </script>
    </div>
  </body>
</html>
