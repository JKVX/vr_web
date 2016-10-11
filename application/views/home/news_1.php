<link href="<?= base_url('files/news_1/styles.css')?>" type="text/css" rel="stylesheet"/>
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

      <div id="u16" class="ax_h1">
        <div id="u17" class="text">
          <p><span>内容</span></p>
        </div>
      </div>

        <div id="u13" class="ax_h1">
          <div id="u14" class="text">
            <p><span>标题</span></p>
          </div>
        </div>

        <div id="u213" class="ax_h1">
          <div id="u214" class="text">
            <p><span>现有动态</span></p>
          </div>
        </div>

      <div id="u15" class="ax_文本框_单行_">
        <input id="u15_input" type="text" name="news_title" value="" required="required"/>
      </div>  
      <div id="u18" class="ax_文本框_多行_">
      <script id="editor" type="text/plain" style="width:800px;height:263px;"></script>
                 <div id="u11" class="ax_html__">
                 <input id="u11_input" type="submit" value="新建新闻" onClick="uptext()"/>
                 </div>
                 <div id="u_save" class="ax_html__">
                  <input id="u_save_input" type="submit" value="保存修改" onClick="update()"/>
                 </div>
      </div>

      <div id="u19" class="ax_image">
        <img id="u19_img" class="img " src="<?= base_url('images/news_1/u19.png')?>"/>
        <div id="u20" class="text">
          <p><span></span></p>
        </div>
      </div>

      <a href="<?= site_url('home/news_1')?>" style="text-decoration:none;" onMouseOut ="over2('u21_img')" onMouseOver ="down2('u21_img')">
      <div id="u21" class="ax_形状">
        <img id="u21_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u22" class="text"><p><span>&nbsp; &nbsp; 最新动态</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('home/wheel_pic')?>" style="text-decoration:none;" onMouseOut ="over2('u23_img')" onMouseOver ="down2('u23_img')">
      <div id="u23" class="ax_形状">
        <img id="u23_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u24" class="text"><p><span>&nbsp; &nbsp; 轮播图片</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('home/manage_account')?>" style="text-decoration:none;" onMouseOut ="over2('u115_img')" onMouseOver ="down2('u115_img')">
      <div id="u115" class="ax_形状">
        <img id="u115_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u116" class="text"><p><span>&nbsp; &nbsp; 账号管理</span></p>
        </div>
      </div>
      </a>

      <div id="u25" class="ax_列表选择框">
        <select id="u25_input" size="2" onclick="get_news_detail()">
        <option value="-1" selected="selected" hidden></option>
        <?php
        $count=0;
         foreach ($news as $rows) {?>
           <option name="<?=$rows['id']?>" value="<?=$rows['id']?>"><?=$rows['news_title']?></option>
         }
        <?php }?>
        </select>
      </div>
      <script type="text/javascript">
            function over2(id){
        document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
      }
      function down2(id){
        document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
      }
      function get_news_detail(){
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u25_input").val()},
          url : "<?= site_url("home/get_news_detail/") ?>",
          cache : false,
          success : function(data) {
            document.getElementById("u15_input").value=data[0]['news_title'];
            UE.getEditor('editor').setContent(data[0]['news_content']);
            document.all["u_save_input"].style.display="block"; 
          }
        });
      }
      function delete_news(){
        if($("#u25_input").val()!="-1"&&$("u25_input").val!=null){
          if(confirm("确定删除此动态？删除后不可恢复。")){
                $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u25_input").val()},
          url : "<?= site_url("home/delete_news/") ?>",
          cache : false,
          success : function(data) {
            alert('删除动态成功！');
            $(document).find("option[name='"+$("#u25_input").val()+"']").remove();
            document.getElementById("u15_input").value="";
            UE.getEditor('editor').setContent("");
            document.getElementById("u25_input").value="-1";
            document.all["u_save_input"].style.display="none"; 
          }
        });
        }
      }
    }

      function up_news(){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u25_input").val()},
          url : "<?= site_url("home/up_news/") ?>",
          cache : false,
          success : function(data) {
            alert('移动动态成功！');
            var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['news_title']+"</option>";
            }   
            $("#u25_input").empty().append(addHtml).trigger("create");            
            document.all["u_save_input"].style.display="none"; 
            document.getElementById("u25_input").value="-1";
            document.getElementById("u15_input").value="";
            UE.getEditor('editor').setContent("");
           }
        });
      }

      function down_news(){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u25_input").val()},
          url : "<?= site_url("home/down_news/") ?>",
          cache : false,
          success : function(data) {
            alert('移动动态成功！');
            var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['news_title']+"</option>";
            }   
            $("#u25_input").empty().append(addHtml).trigger("create");
            document.all["u_save_input"].style.display="none"; 
            document.getElementById("u25_input").value="-1";
            document.getElementById("u15_input").value="";
            UE.getEditor('editor').setContent("");
           }
        });
      }
      </script>

      <div id="u26" class="ax_html__">
        <input id="u26_input" type="submit" value="删除动态" onclick="delete_news()" />
      </div>

      <div id="u27" class="ax_html__">
        <input id="u27_input" type="submit" value="上移" onclick="up_news()" />
      </div>

      <div id="u28" class="ax_html__">
        <input id="u28_input" type="submit" value="下移" onclick="down_news()"/>
      </div>
    </div>
  </body>
</html>
<script>
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
        initialFrameHeight: 263,
        initialFrameWidth:800,
        scaleEnabled:true,
        textarea: 'news_content'
        //更多其他参数，请参考ueditor.config.js中的配置项
    });
    ue.render();

    function update(){
      var length=$('#u15_input').length;
      if($('#u15_input').val()==""){
        alert('动态标题不能为空！');
      }else if(UE.getEditor('editor').getContent()==""){
        alert('动态内容不能为空！')
      }else if(length>50){
        alert('动态标题长度不能超过五十字！')
      }else{
         $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u25_input").val(),'news_title':$("#u15_input").val(),'news_content':UE.getEditor('editor').getContent()},
          url : "<?= site_url("home/save_news/") ?>",
          cache : false,
          success : function(data) {
            alert('动态保存成功!');
           var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['news_title']+"</option>";
            }   
            $("#u25_input").empty().append(addHtml).trigger("create");
            document.getElementById("u25_input").value="-1";
            document.getElementById("u15_input").value="";
            document.all["u_save_input"].style.display="none"; 
            UE.getEditor('editor').setContent("");
           }
        });
      }

    }
    function uptext() {
      var length=$('#u15_input').length;
      if($('#u15_input').val()==""){
        alert('动态标题不能为空！');
      }else if(UE.getEditor('editor').getContent()==""){
        alert('动态内容不能为空！')
      }else if(length>50){
        alert('动态标题长度不能超过五十字！')
      }else{
         $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'news_title':$("#u15_input").val(),'news_content':UE.getEditor('editor').getContent()},
          url : "<?= site_url("home/create_post/") ?>",
          cache : false,
          success : function(data) {
            alert('添加动态成功!');
           var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['news_title']+"</option>";
            }   
            $("#u25_input").empty().append(addHtml).trigger("create");
            document.getElementById("u15_input").value="";
            document.getElementById("u25_input").value="-1";
            UE.getEditor('editor').setContent("");
           }
        });
      }
    }
</script>
