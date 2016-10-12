<link href="<?= base_url('files/wheel_pic/styles.css')?>" type="text/css" rel="stylesheet"/>
  </head>
  <body>
    <div id="base" class="">
      <div id="u7" class="ax_形状">
      </div>

      <div id="u9" class="ax_形状">
      </div>

      <div id="u11" class="ax_image">
        <img id="u11_img" class="img " src="<?= base_url('images/news_1/u19.png')?>"/>
        <div id="u12" class="text">
          <p><span></span></p>
        </div>
      </div>

      <a href="<?= site_url('home/news_1')?>" style="text-decoration:none;" onMouseOut ="over2('u13_img')" onMouseOver ="down2('u13_img')">
      <div id="u13" class="ax_形状">
        <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u14" class="text"><p><span>&nbsp; &nbsp; 最新动态</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('home/wheel_pic')?>" style="text-decoration:none;" onMouseOut ="over2('u15_img')" onMouseOver ="down2('u15_img')">
      <div id="u15" class="ax_形状">
        <img id="u15_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u16" class="text"><p><span>&nbsp; &nbsp; 轮播图片</span></p>
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
      
      <div id="u18" class="ax_列表选择框">
        <select id="u18_input" size="2" onclick="get_wheel_pic_detail()" >
        <option value="-1" hidden="hidden" selected></option>
        <?php
        $count=0;
         foreach ($wheel_pic as $rows) {?>
           <option name="<?=$rows['id']?>" value="<?=$rows['id']?>"><?=$rows['pic_name']?></option>
         }
        <?php }?>
        </select>
     </div>
         
      <div id="u22" class="ax_image">
        <img id="u22_img" class="img " src="<?= base_url('images/wheel_pic/u18.png')?>"/>
        <div id="u23" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u201" class="ax_h1">
          <div id="u202" class="text">
            <p><span>现有图片</span></p>
          </div>
      </div>

      <div id="u203" class="ax_h1">
          <div id="u204" class="text">
            <p><span>添加图片</span></p>
          </div>
      </div>

      <form class="form-horizontal" role="form" method="post" id="Info" enctype="multipart/form-data">
      <div id="u29" class="ax_html__">
        <input id="u29_input" name="new_pic" type="file" value="打开文件" required onchange="pre_view()" />
      </div>

      <div id="u30" class="ax_html__">
        <input id="u30_input" type="submit" value="添加" onClick="javascript:Info.action='<?= site_url("home/upload_file/")?>';javascript:Info.target='_self';"/>
      </div>
      </form>

      <div id="u31" class="ax_html__">
        <input id="u31_input" type="submit" value="删除" onclick="delete_wheel_pic()" />
      </div>

      <div id="u32" class="ax_html__">
        <input id="u32_input" type="submit" value="上移" onclick="up_wheel_pic()" />
      </div>

      <div id="u33" class="ax_html__">
        <input id="u33_input" type="submit" value="下移" onclick="down_wheel_pic()" />
      </div>
<script type="text/javascript">
    function over2(id){
        document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
      }
      function down2(id){
        document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
      }

      function pre_view(){
        var url = window.URL.createObjectURL(document.getElementById("u29_input").files[0])
        document.getElementById("u22_img").src=url;
      }

      function get_wheel_pic_detail(){
        if($("#u18_input").val()!=-1&&$("#u18_input").val()!=null){
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u18_input").val()},
          url : "<?= site_url("home/get_wheel_pic_detail/") ?>",
          cache : false,
          success : function(data) {
            document.getElementById('u22_img').src="<?= base_url('documents/wheel_pic/')?>"+"/"+data[0]['pic_name'];
          }
        });
      }
      }
      function delete_wheel_pic(){
        if($("#u18_input").val()!=-1&&$("#u18_input").val()!=null){
          if(confirm("确定删除此轮播图？删除后不可恢复。")){
                $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u18_input").val()},
          url : "<?= site_url("home/delete_wheel_pic/") ?>",
          cache : false,
          success : function(data) {
            alert('删除轮播图成功');
            $(document).find("option[name='"+$("#u18_input").val()+"']").remove();
            $("#u18_input").val('-1');
            document.getElementById('u22_img').src="<?= base_url('images/wheel_pic/u18.png')?>";
          }
        });
      }
      }
      }

      function up_wheel_pic(){
        if($("#u18_input").val()!=-1&&$("#u18_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u18_input").val()},
          url : "<?= site_url("home/up_wheel_pic/") ?>",
          cache : false,
          success : function(data) {
            alert('移动轮播图成功');
            var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['pic_name']+"</option>";
            }   
            $("#u18_input").empty().append(addHtml).trigger("create");
            $("#u18_input").val('-1');
            document.getElementById('u22_img').src="<?= base_url('images/wheel_pic/u18.png')?>";
           }
        });
      }
      }

      function down_wheel_pic(){
        if($("#u18_input").val()!=-1&&$("#u18_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u18_input").val()},
          url : "<?= site_url("home/down_wheel_pic/") ?>",
          cache : false,
          success : function(data) {
            alert('移动轮播图成功');
            var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['pic_name']+"</option>";
            }   
            $("#u18_input").empty().append(addHtml).trigger("create");
            $("#u18_input").val('-1');
            document.getElementById('u22_img').src="<?= base_url('images/wheel_pic/u18.png')?>";
           }
        });
      }
      }
      </script>
    </div>
  </body>
</html>
