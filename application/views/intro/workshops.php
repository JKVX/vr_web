    <link href="<?= base_url('files/workshops/styles.css')?>" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="<?= base_url('tools/ueditor/ueditor.config.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('tools/ueditor/ueditor.all.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('tools/ueditor/ueditor.all.min.js'); ?>"></script>
<!--建议手动加载语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" src="<?= base_url('tools/ueditor/lang/zh-cn/zh-cn.js'); ?>"></script>
  </head>
  <body>
   <div id="base">
      <div id="u7" class="ax_形状">
      </div>

      <div id="u9" class="ax_形状">
      </div>

      <a href="<?= site_url('intro/brief_intro')?>" style="text-decoration:none;" onMouseOut ="over2('u11_img')" onMouseOver ="down2('u11_img')" >
      <div id="u11" class="ax_形状">
        <img id="u11_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u12" class="text">
          <p><span>&nbsp; &nbsp; 简介</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('intro/facilities')?>" style="text-decoration:none;" onMouseOut ="over2('u13_img')" onMouseOver ="down2('u13_img')" >
      <div id="u13" class="ax_形状">
        <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u14" class="text">
          <p><span>&nbsp; &nbsp; 现有设备</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('intro/techniques')?>" style="text-decoration:none;" onMouseOut ="over2('u17_img')" onMouseOver ="down2('u17_img')" >
      <div id="u17" class="ax_形状">
        <img id="u17_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u18" class="text">
          <p><span>&nbsp; &nbsp; 现有技术</span></p>
        </div>
      </div>
      </a>

        <a href="<?= site_url('intro/workshops')?>" style="text-decoration:none;" onMouseOut ="over2('u19_img')" onMouseOver ="down2('u19_img')" >
      <div id="u19" class="ax_形状">
        <img id="u19_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u20" class="text">
          <p><span>&nbsp; &nbsp; 工作坊</span></p>
        </div>
      </div>
      </a>



      <div id="u33" class="ax_h1">
        <div id="u34" class="text">
          <p><span>工作坊信息</span></p>
        </div>
      </div>

        <div id="u37" class="ax_h1">
          <div id="u38" class="text">
            <p><span>标题</span></p>
          </div>
        </div>

        <div id="u39" class="ax_文本框_单行_">
          <input id="u39_input" name="workshops_title" type="text" maxlength="50"/>
        </div>

        <div id="u40" class="ax_h1">
          <div id="u41" class="text">
          <p><span>内容</span></p>
        </div>
        </div>

      <div id="u42" class="ax_文本框_多行_">
      <script id="editor" type="text/plain" style="display:block;width:800px;height:263px;"></script>
      <div id="u352" class="ax_html__">
      <input id="u35_input2" type="submit" value="新建工作坊" onclick="uptext()"/>
      </div>
      <div id="u35" class="ax_html__">
      <input id="u35_input" type="submit" style="display:none;" value="保存修改" onclick="update()"/>
      </div>

      </div>

  <script type="text/javascript">
    var ue = UE.getEditor('editor', {
        toolbars: [[/*'fullscreen', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset',
            'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'simpleupload', 'insertimage', 'emotion', 'insertvideo','background', '|',
            'horizontal', 'date', 'time', 'snapscreen', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
            'searchreplace', 'drafts'*/]],
        //focus时自动清空初始化时的内容
        autoClearinitialContent: false,
        //关闭字数统计
        wordCount: false,
        //关闭elementPath
        elementPathEnabled: false,
        //默认的编辑区域高度
        initialFrameHeight: 240,
        initialFrameWidth:800,
        scaleEnabled:true,      
        textarea: 'workshops_content'
        //更多其他参数，请参考ueditor.config.js中的配置项
    });
    /*ue.render();*/
          function over2(id){
        document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
      }
      function down2(id){
        document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
      }
    function uptext() {
      if($("#u39_input").val()==""){
        alert('标题不能为空');
      }else if(UE.getEditor('editor').getContent()==""){
        alert('内容不能为空');
      }else{
               $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'workshops_title':$("#u39_input").val(),'workshops_content':UE.getEditor('editor').getContent()},
          url : "<?= site_url("intro/create_post/") ?>",
          cache : false,
          success : function(data) {
           var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['workshops_title']+"</option>";
            }   
            $("#u43_input").empty().append(addHtml).trigger("create");
            UE.getEditor('editor').setContent("");
            document.getElementById("u39_input").value="";
            document.getElementById("u43_input").value="-1";
            alert('新建工作坊成功！');
           }
        });
      }
    }
    function update() {
            if($("#u39_input").val()==""){
        alert('标题不能为空');
      }else if(UE.getEditor('editor').getContent()==""){
        alert('内容不能为空');
      }else{
               $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u43_input").val(),'workshops_title':$("#u39_input").val(),'workshops_content':UE.getEditor('editor').getContent()},
          url : "<?= site_url("intro/save_workshops/") ?>",
          cache : false,
          success : function(data) {
           var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['workshops_title']+"</option>";
            }   
            $("#u43_input").empty().append(addHtml).trigger("create");
            UE.getEditor('editor').setContent("");
            document.getElementById("u39_input").value="";
            document.getElementById("u43_input").value="-1";
            document.getElementById('u35_input2').style.display="block";
            document.getElementById('u35_input').style.display="none";
            alert('保存信息成功！');
           }
        });
      }
    }
</script>
      <div id="u43" class="ax_列表选择框">
        <select id="u43_input" size="2" onchange="get_workshops_detail()">
        <option value="-1" hidden selected></option>
        <?php
        $count=0;
         foreach ($workshops as $rows) {?>
           <option name="<?=$rows['id']?>" value="<?=$rows['id']?>"><?=$rows['workshops_title']?></option>
         }
        <?php }?>
        </select>
      </div>

      <div id="u44" class="ax_html__">
        <input id="u44_input" type="submit" value="删除工作坊" onclick="delete_workshops()"/>
      </div>

      <div id="u45" class="ax_html__">
        <input id="u45_input" type="submit" value="上移" onclick="up_workshops()"/>
      </div>

      <div id="u46" class="ax_html__">
        <input id="u46_input" type="submit" value="下移" onclick="down_workshops()" />
      </div>

      <script type="text/javascript">
      function get_workshops_detail(){
        if($("#u43_input").val()!=-1&&$("#u43_input").val()!=null){
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u43_input").val()},
          url : "<?= site_url("intro/get_workshops_detail/") ?>",
          cache : false,
          success : function(data) {
            document.getElementById("u39_input").value=data[0]['workshops_title'];
            UE.getEditor('editor').setContent(data[0]['workshops_content']);
            document.getElementById('u35_input').style.display="block";
            document.getElementById('u35_input2').style.display="none";
          }
        });
         }
      }
      function delete_workshops(){
        if($("#u43_input").val()!=-1&&$("#u43_input").val()!=null){
          if(confirm("确定删除此工作坊？删除后不可恢复。")){
                $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u43_input").val()},
          url : "<?= site_url("intro/delete_workshops/") ?>",
          cache : false,
          success : function(data) {
            alert('删除工作坊成功！');
            $(document).find("option[name='"+$("#u43_input").val()+"']").remove();
            document.getElementById("u39_input").value="";
            document.getElementById("u43_input").value="-1";
            UE.getEditor('editor').setContent("");
            document.getElementById('u35_input2').style.display="block";
            document.getElementById('u35_input').style.display="none";
          }
        });
      }
    }
      }

      function up_workshops(){
        if($("#u43_input").val()!=-1&&$("#u43_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u43_input").val()},
          url : "<?= site_url("intro/up_workshops/") ?>",
          cache : false,
          success : function(data) {
            alert('移动工作坊成功！');
            var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['workshops_title']+"</option>";
            }   
            $("#u43_input").empty().append(addHtml).trigger("create");
            document.getElementById("u43_input").value="-1";
            UE.getEditor('editor').setContent("");
            document.getElementById("u39_input").value="";
            document.getElementById('u35_input2').style.visibility="visibility";
            document.getElementById('u35_input').style.display="none";
           }
        });
      }
      }

      function down_workshops(){
        if($("#u43_input").val()!=-1&&$("#u43_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u43_input").val()},
          url : "<?= site_url("intro/down_workshops/") ?>",
          cache : false,
          success : function(data) {
            alert('移动工作坊成功！');
            var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['workshops_title']+"</option>";
            }   
            $("#u43_input").empty().append(addHtml).trigger("create");
            document.getElementById("u43_input").value="-1";
            UE.getEditor('editor').setContent("");
            document.getElementById("u39_input").value="";
            document.getElementById('u35_input2').style.display="block";
            document.getElementById('u35_input').style.display="none";
           }
        });
      }
      }
      </script>
    </div>
  </body>
</html>
