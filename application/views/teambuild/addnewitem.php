    <link href="<?= base_url('files/teambuild_admin/styles.css')?>" type="text/css" rel="stylesheet"/>  
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

      <a href="<?= site_url('teambuild/addnewitem')?>" style="text-decoration:none;" onMouseOut ="over2('u11_img')" onMouseOver ="down2('u11_img')">
      <div id="u11" class="ax_形状">
        <img id="u11_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u12" class="text">
          <p><span>&nbsp; &nbsp; 新建动态</span></p></a>
        </div>
      </div>

    <a href="<?= site_url('teambuild/manageteambuild')?>" style="text-decoration:none;" onMouseOut ="over2('u13_img')" onMouseOver ="down2('u13_img')">
      <div id="u13" class="ax_形状">
        <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u14" class="text">
          <p><span>&nbsp; &nbsp; 动态管理</span></p>
        </div>
      </div>

    <a href="<?= site_url('teambuild/teambuild_photo')?>" style="text-decoration:none;" onMouseOut ="over2('u37_img')" onMouseOver ="down2('u37_img')">
      <div id="u37" class="ax_形状">
        <img id="u37_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u38" class="text">
        <p><span>&nbsp; &nbsp; 往期照片</span></p></a>
        </div>
      </div>

      <script type="text/javascript">
  function over2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
  }
  function down2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
  }
</script>

      <div id="u15" class="ax_html__">
        <input id="u15_input" type="submit" value="新建动态" onclick="uptext()" />
      </div>

<!--       <div id="u16" class="ax_html__">
  <input id="u16_input" type="submit" value="取消"/>
</div> -->

      <div id="u17" class="ax_h1">
        <img id="u17_img" class="img " src="<?= base_url('resources/images/transparent.gif')?>"/>
        <div id="u18" class="text">
          <p><span>标题</span></p>
        </div>
      </div>

      <div id="u19" class="ax_文本框_单行_">
        <input id="u19_input" type="text" value="" maxlength="50" />
      </div>
      <div id="u20" class="ax_h1">
        <img id="u20_img" class="img " src="<?= base_url('resources/images/transparent.gif')?>"/>
        <div id="u21" class="text">
          <p><span>内容</span></p>
        </div>
      </div>

      <div id="u22" class="ax_文本框_多行_">
<script id="editor" type="text/plain" style="width:800px;height:280px;"></script>
      </div>
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
        initialFrameHeight: 300,
        initialFrameWidth:800,
        scaleEnabled:true,
        textarea: 'content'
        //更多其他参数，请参考ueditor.config.js中的配置项
    });
    function uptext() {
      if($("#u19_input").val()==""){
        alert('动态标题不能为空！');
      }else if(UE.getEditor('editor').getContent()==""){
        alert('动态内容不能为空！');
      }else{
         $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'title':$("#u19_input").val(),'content':UE.getEditor('editor').getContent()},
          url : "<?= site_url("teambuild/create_post/") ?>",
          cache : false,
          success : function(data) {
            alert('添加动态成功!');
            document.getElementById("u19_input").value="";
            UE.getEditor('editor').setContent("");
           }
        });
      }
    }
</script>

    </div>
  </body>
</html>
