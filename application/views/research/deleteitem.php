    <link href="<?= base_url('files/deleteitem/styles.css')?>" type="text/css" rel="stylesheet"/>
       <script type="text/javascript" src="<?= base_url('tools/ueditor/ueditor.config.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('tools/ueditor/ueditor.all.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('tools/ueditor/ueditor.all.min.js'); ?>"></script>
<!--建议手动加载语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" src="<?= base_url('tools/ueditor/lang/zh-cn/zh-cn.js'); ?>"></script>
    <div id="base" class="">

      <div id="u7" class="ax_形状">
      </div>

      <div id="u9" class="ax_形状">
      </div>

      <a href="<?= site_url('research/addnewitem')?>" style="text-decoration:none;" onMouseOut ="over2('u11_img')" onMouseOver ="down2('u11_img')">
      <div id="u11" class="ax_形状">
        <img id="u11_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u12" class="text">
          <p><span>&nbsp; &nbsp; </span><span>新建项目</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('research/deleteitem')?>" style="text-decoration:none;" onMouseOut ="over2('u13_img')" onMouseOver ="down2('u13_img')">
      <div id="u13" class="ax_形状">
        <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u14" class="text">
          <p><span>&nbsp; &nbsp; </span><span>已有项目</span></p>
        </div>
      </div>
      </a>

      <div id="u17" class="ax_h1">
        <div id="u18" class="text">
          <p><span>已有项目</span></p>
        </div>
      </div>

      <div id="u33" class="ax_列表选择框">
        <select id="u33_input" size="2" onclick="get_projects_detail()">
        <option value="-1">--------------------进行中项目-------------------</option>
        <?php
        for($count=0;$count<count($u_projects);$count++){?>
          <option name="<?= $u_projects[$count]['id']?>" value="<?=  $u_projects[$count]['id']?>"><?= $u_projects[$count]['title']?></option>
         <?php }?>
        <option value="-1">--------------------已完成项目-------------------</option>
        <?php
        for($count=0;$count<count($f_projects);$count++){?>
          <option name="<?= $f_projects[$count]['id']?>" value="<?=  $f_projects[$count]['id']?>"><?= $f_projects[$count]['title']?></option>
         <?php }?>
        </select>

      </div>

      <div id="u34" class="ax_html__">
        <input id="u34_input" type="submit" value="删除项目" onclick="delete_projects()" />
      </div>

      <div id="u35" class="ax_html__">
        <input id="u35_input" type="submit" value="上移" onclick="up_projects()" />
      </div>

      <div id="u36" class="ax_html__">
        <input id="u36_input" type="submit" value="下移" onclick="down_projects()" />
      </div>

      <div id="u37" class="ax_html__">
        <input id="u37_input" type="submit" value="已完成" onclick="finish_projects()" />
      </div>

      <div id="u101" class="ax_html__">
        <input id="u102" type="submit" value="编辑文字"  onclick="edit_projects()"/>
      </div>

      <div id="u103" class="ax_html__">
        <input id="u104" type="submit" value="编辑图片/视频"  onclick="edit_pic()"/>
      </div>

      <script type="text/javascript">
      
  function over2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
  }
  function down2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
  }
      function get_projects_detail(){
         if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
        }else{
            document.getElementById('u33_input').value="-2";
        }
      }
      function delete_projects(){
        if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
               if(confirm("确定删除此项目？删除后不可恢复。")){
                $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val()},
          url : "<?= site_url("research/delete_projects/") ?>",
          cache : false,
          success : function(data) {
            alert("删除项目成功！");
            $(document).find("option[name='"+$("#u33_input").val()+"']").remove();
            document.getElementById('u33_input').value="-2";
          }
        });
        }}
      }
      function edit_projects(){
        if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
          window.location.href="<?= site_url('research/edit_text/')?>"+"/"+$("#u33_input").val();       
        }
      }
      function edit_pic(){
        if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
          window.location.href="<?= site_url('research/edit_pic/')?>"+"/"+$("#u33_input").val();       
        }
      }



      function up_projects(){
         if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val()},
          url : "<?= site_url("research/up_projects/") ?>",
          cache : false,
          success : function(data) {
            alert("移动项目成功！");
            var addHtml="<option value=\"-1\" >--------------------进行中项目-------------------</option>"
           for(var i=0;i<data[0].length;i++){
            addHtml=addHtml+"<option name=\""+data[0][i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[0][i]['id']+"\">";
              addHtml=addHtml+data[0][i]['title']+"</option>";
            }  
            addHtml=addHtml+"<option value=\"-1\">--------------------已完成项目-------------------</option>"
            for(var i=0;i<data[1].length;i++){
            addHtml=addHtml+"<option name=\""+data[1][i]['id']+"\"";
              addHtml=addHtml+"value=\""+data[1][i]['id']+"\">";
              addHtml=addHtml+data[1][i]['title']+"</option>";
            }   
            $("#u33_input").empty().append(addHtml).trigger("create");
            document.getElementById('u33_input').value="-2";
           }
        });
      }
    }

      function down_projects(){
        if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val()},
          url : "<?= site_url("research/down_projects/") ?>",
          cache : false,
          success : function(data) {
            alert("移动项目成功！");
            var addHtml="<option value=\"-1\">--------------------进行中项目-------------------</option>"
           for(var i=0;i<data[0].length;i++){
            addHtml=addHtml+"<option name=\""+data[0][i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[0][i]['id']+"\">";
              addHtml=addHtml+data[0][i]['title']+"</option>";
            }  
            addHtml=addHtml+"<option value=\"-1\">--------------------已完成项目-------------------</option>"
            for(var i=0;i<data[1].length;i++){
            addHtml=addHtml+"<option name=\""+data[1][i]['id']+"\"";
              addHtml=addHtml+"value=\""+data[1][i]['id']+"\">";
              addHtml=addHtml+data[1][i]['title']+"</option>";
            }   
            $("#u33_input").empty().append(addHtml).trigger("create");
            document.getElementById('u33_input').value="-2";
           }
        });
        }
      }
        function finish_projects(){
           if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val()},
          url : "<?= site_url("research/finish_projects/") ?>",
          cache : false,
          success : function(data) {
            alert("已完成项目成功！"); 
             var addHtml="<option value=\"-1\">--------------------进行中项目-------------------</option>"
           for(var i=0;i<data[0].length;i++){
            addHtml=addHtml+"<option name=\""+data[0][i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[0][i]['id']+"\">";
              addHtml=addHtml+data[0][i]['title']+"</option>";
            }  
            addHtml=addHtml+"<option value=\"-1\">--------------------已完成项目-------------------</option>"
            for(var i=0;i<data[1].length;i++){
            addHtml=addHtml+"<option name=\""+data[1][i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[1][i]['id']+"\">";
              addHtml=addHtml+data[1][i]['title']+"</option>";
            }   
            $("#u33_input").empty().append(addHtml).trigger("create");
            document.getElementById('u33_input').value="-2";
           }
        });
      }
    }
    function uptext(){
      if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
      if($("#u52_input").val().length>300){
        alert('项目简介不能超过300字');
      }else{
         $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val(),'projects_content':UE.getEditor('editor').getContent(),'projects_summary':$("#u52_input").val()},
          url : "<?= site_url("research/update_projects/") ?>",
          cache : false,
          success : function(data) {
            alert('项目修改成功！');
            document.getElementById("u52_input").value="";
            document.getElementById("u33_input").value="-2";
            UE.getEditor('editor').setContent("");
           }
        });
      }
    }
  }
</script>      
    </div>
  </body>
</html>
