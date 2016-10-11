    <link href="<?= base_url('files/deleteitem/styles.css')?>" type="text/css" rel="stylesheet"/>
   <script type="text/javascript" src="<?= base_url('tools/ueditor/ueditor.config.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('tools/ueditor/ueditor.all.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('tools/ueditor/ueditor.all.min.js'); ?>"></script>
<!--建议手动加载语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" src="<?= base_url('tools/ueditor/lang/zh-cn/zh-cn.js'); ?>"></script>
  </head>
  <body>
    <div id="base" class="">

      <div id="u7" class="ax_形状">
      </div>

      <div id="u9" class="ax_形状">
      </div>

      <a href="<?= site_url('teambuild/addnewitem')?>" style="text-decoration:none;" onMouseOut ="over2('u11_img')" onMouseOver ="down2('u11_img')">
      <div id="u11" class="ax_形状">
        <img id="u11_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u12" class="text">
          <p><span>&nbsp; &nbsp; 新建动态</span></p></a>
        </div>
      </div>
      </a>

      <a href="<?= site_url('teambuild/manageteambuild')?>" style="text-decoration:none;" onMouseOut ="over2('u13_img')" onMouseOver ="down2('u13_img')">
      <div id="u13" class="ax_形状">
        <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u14" class="text">
          <p><span>&nbsp; &nbsp; 动态管理</span></p>
        </div>
      </div> 
      </a>

      <a href="<?= site_url('teambuild/teambuild_photo')?>" style="text-decoration:none;" onMouseOut ="over2('u73_img')" onMouseOver ="down2('u73_img')">
      <div id="u73" class="ax_形状">
        <img id="u73_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u74" class="text">
        <p><span>&nbsp; &nbsp; 往期照片</span></p></a>
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

      <div id="u17" class="ax_h1">
        <img id="u17_img" class="img " src="<?= base_url('resources/images/transparent.gif')?>	"/>
        <div id="u18" class="text">
          <p><span>已有动态</span></p>
        </div>
      </div>


      <div id="u33" class="ax_列表选择框">
        <select id="u33_input" size="2" onclick="get_teambuild_detail()">
        <?php
        for($count=0;$count<count($teambuild);$count++){?>
          <option name="<?= $teambuild[$count]['id']?>" value="<?=  $teambuild[$count]['id']?>"><?= $teambuild[$count]['title']?></option>
         <?php }?>
        </select>
      </div>

      <div id="u34" class="ax_html__">
        <input id="u34_input" type="submit" value="删除动态" onclick="delete_teambuild()" />
      </div>

      <div id="u35" class="ax_html__">
        <input id="u35_input" type="submit" value="上移" onclick="up_teambuild()" />
      </div>

      <div id="u36" class="ax_html__">
        <input id="u36_input" type="submit" value="下移" onclick="down_teambuild()" />
      </div>

      <script type="text/javascript">
      function get_teambuild_detail(){
        if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
                $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val()},
          url : "<?= site_url("teambuild/get_teambuild_detail/") ?>",
          cache : false,
          success : function(data) {
            document.getElementById("u69_input").value=data[0]['title'];
            UE.getEditor('editor').setContent(data[0]['content']);
          }
        });
        }else{
          document.getElementById("u69_input").value="";
          document.getElementById("u33_input").value="-2";
          UE.getEditor('editor').setContent("");
        }
      }
      function delete_teambuild(){
        if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
               if(confirm("确定删除此动态？删除后不可恢复。")){
                $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val()},
          url : "<?= site_url("teambuild/delete_teambuild/") ?>",
          cache : false,
          success : function(data) {
            alert("删除动态成功！");
            $(document).find("option[name='"+$("#u33_input").val()+"']").remove();
          }
        });
      }}
           document.getElementById("u69_input").value="";
          document.getElementById("u33_input").value="-2";
          UE.getEditor('editor').setContent("");
      }

      function up_teambuild(){
      if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val()},
          url : "<?= site_url("teambuild/up_teambuild/") ?>",
          cache : false,
          success : function(data) {
            alert("移动动态成功！");
            var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['title']+"</option>";
            }  
            $("#u33_input").empty().append(addHtml).trigger("create");
           }
        });
      }
          document.getElementById("u69_input").value="";
          document.getElementById("u33_input").value="-2";
          UE.getEditor('editor').setContent("");
    }

      function down_teambuild(){
      if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val()},
          url : "<?= site_url("teambuild/down_teambuild/") ?>",
          cache : false,
          success : function(data) {
            alert("移动动态成功！");
            var addHtml=""
            for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['title']+"</option>";
            }  
            $("#u33_input").empty().append(addHtml).trigger("create");
           }
        });
      }
          document.getElementById("u69_input").value="";
            document.getElementById("u33_input").value="-2";
            UE.getEditor('editor').setContent("");
      }
      var ue = UE.getEditor('editor', {
        toolbars: [['fullscreen', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset',
            'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'simpleupload', 'insertimage', 'emotion', 'insertvideo','background', '|',
            'horizontal', 'date', 'time', 'snapscreen', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
            'searchreplace', 'drafts']],
        //focus时自动清空初始化时的内容
        autoClearinitialContent: false,
        //关闭字数统计
        wordCount: false,
        //关闭elementPath
        elementPathEnabled: false,
        //默认的编辑区域高度
        initialFrameHeight: 200,
        initialFrameWidth:800,
        scaleEnabled:true,
        textarea: 'content'
        //更多其他参数，请参考ueditor.config.js中的配置项
    });
        function uptext(){
      if($("#u33_input").val()!="-1"&&$("#u33_input").val()!="-2"&&$("#u33_input").val()!=null){
         $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val(),'content':UE.getEditor('editor').getContent(),'title':$("#u69_input").val()},
          url : "<?= site_url("teambuild/update_teambuild/") ?>",
          cache : false,
          success : function(data) {
            alert('修改动态成功！');            
             var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['title']+"</option>";
            }  
            $("#u33_input").empty().append(addHtml).trigger("create");
            document.getElementById("u69_input").value="";
            document.getElementById("u33_input").value="-2";
            UE.getEditor('editor').setContent("");
           }
        });
    }
    else{
      document.getElementById("u69_input").value="";
            document.getElementById("u33_input").value="-2";
            UE.getEditor('editor').setContent("");
    }
  }
</script>   
 <div id="u65" class="ax_html__">
        <input id="u65_input" type="submit" value="保存修改" onclick="uptext()" />
      </div>

      <div id="u67" class="ax_h1">
        <div id="u68" class="text">
          <p><span>标题</span></p>
        </div>
      </div>

      <div id="u69" class="ax_文本框_单行_">
        <input id="u69_input" type="text" value="" maxlength="50" />
      </div>
      <div id="u70" class="ax_h1">
        <div id="u71" class="text">
          <p><span>内容</span></p>
        </div>
      </div>

      <div id="u72" class="ax_文本框_多行_">
        <script id="editor" type="text/plain"></script>
      </div>


    </div>
  </body>
</html>
