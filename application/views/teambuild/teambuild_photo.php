    <link href="<?= base_url('files/teambuild_photo/styles.css')?>" type="text/css" rel="stylesheet"/>

  </head>
  <body>
    <div id="base" class="">

      <div id="u7" class="ax_形状">
      </div>

      <div id="u9" class="ax_形状">
      </div>

      <a href="<?= site_url('teambuild/teambuild_photo')?>" style="text-decoration:none;" onMouseOut ="over2('u11_img')" onMouseOver ="down2('u11_img')">
      <div id="u11" class="ax_形状">
        <img id="u11_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u12" class="text">
          <p><span>&nbsp; &nbsp; 往期照片</span></p></a>
        </div>
      </div>
      </a>
<!-- 
    <a href="<?= site_url('teambuild/manageteambuild')?>" style="text-decoration:none;" onMouseOut ="over2('u13_img')" onMouseOver ="down2('u13_img')">
      <div id="u13" class="ax_形状">
        <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u14" class="text">
          <p><span>&nbsp; &nbsp; 动态管理</span></p>
        </div>
      </div>
      </a>

    <a href="<?= site_url('teambuild/teambuild_photo')?>" style="text-decoration:none;" onMouseOut ="over2('u50_img')" onMouseOver ="down2('u50_img')">
      <div id="u50" class="ax_形状">
        <img id="u50_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u51" class="text">
        <p><span>&nbsp; &nbsp; 往期照片</span></p></a>
        </div>
      </div>
      </a> -->

      <script type="text/javascript">
  function over2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
  }
  function down2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
  }
      </script>

<form class="form-horizontal" role="form" method="post" id="Info" enctype="multipart/form-data">
<div id="u33" class="ax_h1">
  <div id="u34" class="text">
    <p><span>照片文件</span></p>
  </div>
  <input type="file" id="u34_input" name="pic_name" required>
</div> 

<div id="u37" class="ax_h1">
  <div id="u38" class="text">
    <p><span>照片描述</span></p>
  </div>
  <textarea id="u38_textarea" name="content" required></textarea>

  <input type="submit"  id="u38_button" value="添加照片" onClick="javascript:Info.action='<?= site_url("teambuild/add_teambuild_photo/")?>';javascript:Info.target='_self';"/>
</div>  
</form>
      <div id="u39" class="ax_h1">
        <img id="u39_img" class="img " src="<?= base_url('resources/images/transparent.gif')?>"/>
        <div id="u40" class="text">
          <p><span>现有照片</span></p>
        </div>
      </div>

      <div id="u41" class="ax_列表选择框" onclick="get_teambuild_photo_detail()">
        <select id="u41_input" size="2">
          <option value="-1" hidden="hidden" selected="selected"></option>
        <?php for($i=0;$i<count($teambuild_photo);$i++):?>
          <option name="<?= $teambuild_photo[$i]['id']?>" value="<?=  $teambuild_photo[$i]['id']?>"><?= $teambuild_photo[$i]['pic_name']?></option>
         <?php endfor;?>
        </select>
      </div>

      <div id="u42" class="ax_html__">
        <input id="u42_input" type="submit" value="删除往期照片" onclick="delete_teambuild_photo()" />
      </div>

      <div id="u43" class="ax_html__">
        <input id="u43_input" type="submit" value="上移" onclick="up_teambuild_photo()" />
      </div>

      <div id="u44" class="ax_html__">
        <input id="u44_input" type="submit" value="下移" onclick="down_teambuild_photo()"/>
      </div>

      <div id="u45" class="ax_image">
        <img id="u45_img" class="img " src="<?= base_url('images/deletemember/u37.png')?>"/>
        <div id="u46" class="text">
          <p><span></span></p>
        </div>
      </div>

      <script type="text/javascript">
      function get_teambuild_photo_detail(){
       if($("#u41_input").val()!=-1&&$("#u41_input").val()!=-2&&$("#u41_input").val()!=null){
        document.getElementById('u38_button').style.visibility="visible";
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u41_input").val()},
          url : "<?= site_url("teambuild/get_teambuild_photo_detail/") ?>",
          cache : false,
          success : function(data) {
            var image=document.getElementById('u45_img');
            var path="<?= base_url('documents/teambuild_photo/')?>"+"/"+data[0]['pic_name'];
            image.src=path;
          }
        });
      }
      }
      function delete_teambuild_photo(num){
       if($("#u41_input").val()!=-1&&$("#u41_input").val()!=-2&&$("#u41_input").val()!=null){
               if(confirm("确定删除此照片？删除后不可恢复。")){
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u41_input").val()},
          url : "<?= site_url("teambuild/delete_teambuild_photo/") ?>",
          cache : false,
          success : function(data) {
            alert('删除往期照片成功');
            $(document).find("option[name='"+$("#u41_input").val()+"']").remove();
            $("#u41_input").val("-1");
            document.getElementById('u45_img').src="<?= base_url('images/deletemember/u37.png')?>";
          }
        });
      }}
      }

      function up_teambuild_photo(){
       if($("#u41_input").val()!=-1&&$("#u41_input").val()!=-2&&$("#u41_input").val()!=null){
          var prev=$(document).find("option[name='"+$("#u41_input").val()+"']").prev();
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u41_input").val()},
          url : "<?= site_url("teambuild/up_teambuild_photo/") ?>",
          cache : false,
          success : function(data) {
            alert('移动往期照片成功');
            var option=$(document).find("option[name='"+$("#u41_input").val()+"']");
            var prev=option.prev();
            prev.before(option);
            $("#u41_input").val("-1");
            document.getElementById('u45_img').src="<?= base_url('images/deletemember/u37.png')?>"; }
        });  
        }
      }
      function down_teambuild_photo(){
       if($("#u41_input").val()!=-1&&$("#u41_input").val()!=-2&&$("#u41_input").val()!=null){
          var next=$(document).find("option[name='"+$("#u41_input").val()+"']").next();
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u41_input").val()},
          url : "<?= site_url("teambuild/down_teambuild_photo/") ?>",
          cache : false,
          success : function(data) {
            alert('移动往期照片成功');
            var option=$(document).find("option[name='"+$("#u41_input").val()+"']");
            var next=option.next();
            next.after(option);
        $("#u41_input").val("-1");
            document.getElementById('u45_img').src="<?= base_url('images/deletemember/u37.png')?>"; }
        });
       }
      }
      </script>

    </div>
  </body>
</html>
