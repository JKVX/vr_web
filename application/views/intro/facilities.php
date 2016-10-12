    <link href="<?= base_url('files/facilities/styles.css')?>" type="text/css" rel="stylesheet"/>

  </head>
  <body>
    <div id="base" class="">

      <div id="u7" class="ax_形状">
      </div>

      <div id="u9" class="ax_形状">
      </div>

      <a href="<?= site_url('intro/brief_intro')?>" style="text-decoration:none;" onMouseOut ="over2('u11_img')" onMouseOver ="down2('u11_img')">
      <div id="u11" class="ax_形状">
        <img id="u11_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u12" class="text">
          <p><span>&nbsp; &nbsp; 简介</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('intro/facilities')?>" style="text-decoration:none;" onMouseOut ="over2('u13_img')" onMouseOver ="down2('u13_img')">
      <div id="u13" class="ax_形状">
        <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u14" class="text">
          <p><span>&nbsp; &nbsp; 现有设备</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('intro/techniques')?>" style="text-decoration:none;" onMouseOut ="over2('u17_img')" onMouseOver ="down2('u17_img')">
      <div id="u17" class="ax_形状">
        <img id="u17_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u18" class="text">
          <p><span>&nbsp; &nbsp; 现有技术</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('intro/workshops')?>" style="text-decoration:none;" onMouseOut ="over2('u19_img')" onMouseOver ="down2('u19_img')">
      <div id="u19" class="ax_形状">
        <img id="u19_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u20" class="text">
          <p><span>&nbsp; &nbsp; 工作坊</span></p>
        </div>
      </div>
      </a>

      <div id="u33" class="ax_列表选择框">
        <select id="u33_input" size="2" onclick="get_facilities_detail()" >
        <option value="-1" hidden="hidden" selected></option>
        <?php
        $count=0;
         foreach ($facilities as $rows) {?>
           <option name="<?=$rows['id']?>" value="<?=$rows['id']?>"><?=$rows['facilities_name']?></option>
         }
        <?php }?>
        </select>
       <div id="u19" class="text">
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

      function pre_view(){
        var url = window.URL.createObjectURL(document.getElementById("u49_input").files[0])
        document.getElementById("u42_img").src=url;
      }
      function get_facilities_detail(){
        if($("#u33_input").val()!=-1&&$("#u33_input").val()!=null){
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val()},
          url : "<?= site_url("intro/get_facilities_detail/") ?>",
          cache : false,
          success : function(data) {
            document.getElementById('u42_img').src="<?= base_url('documents/facilities/')?>"+"/"+data[0]['pic_name'];
          }
        });
      }
      }
      function delete_facilities(){
        if($("#u33_input").val()!=-1&&$("#u33_input").val()!=null){
          if(confirm("确定删除此设备？删除后不可恢复。")){
                $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val()},
          url : "<?= site_url("intro/delete_facilities/") ?>",
          cache : false,
          success : function(data) {
            alert('删除设备成功');
            $(document).find("option[name='"+$("#u33_input").val()+"']").remove();
            $("#u33_input").val('-1');
            document.getElementById('u42_img').src="<?= base_url('images/wheel_pic/u18.png')?>";
          }
        });
      }
    }
      }

      function up_facilities(){
        if($("#u33_input").val()!=-1&&$("#u33_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val()},
          url : "<?= site_url("intro/up_facilities/") ?>",
          cache : false,
          success : function(data) {
            alert('移动设备成功');
            var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['facilities_name']+"</option>";
            }   
            $("#u33_input").empty().append(addHtml).trigger("create");
            $("#u33_input").val('-1');
            document.getElementById('u42_img').src="<?= base_url('images/wheel_pic/u18.png')?>";
           }
        });
      }
      }

      function down_facilities(){
        if($("#u33_input").val()!=-1&&$("#u33_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u33_input").val()},
          url : "<?= site_url("intro/down_facilities/") ?>",
          cache : false,
          success : function(data) {
            alert('移动设备成功');
            var addHtml="";
           for(var i=0;i<data.length;i++){
            addHtml=addHtml+"<option name=\""+data[i]['id']+"\"";
            if(i==0){
              addHtml=addHtml+" selected ";
            }
              addHtml=addHtml+"value=\""+data[i]['id']+"\">";
              addHtml=addHtml+data[i]['facilities_name']+"</option>";
            }   
            $("#u33_input").empty().append(addHtml).trigger("create");
            $("#u33_input").val('-1');
            document.getElementById('u42_img').src="<?= base_url('images/wheel_pic/u18.png')?>";
           }
        });
      }
      }
      </script>
      <div id="u42" class="ax_image">
        <img id="u42_img" class="img " src="<?= base_url('images/wheel_pic/u18.png')?>"/>
        <div id="u43" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u201" class="ax_h1">
        <div id="u202" class="text">
          <p><span>现有设备</span></p>
        </div>
      </div>

      <div id="u203" class="ax_h1">
        <div id="u204" class="text">
          <p><span>设备图片</span></p>
        </div>
      </div>
            <div id="u207" class="ax_h1">
        <div id="u208" class="text">
          <p><span>设备介绍</span></p>
        </div>
      </div>

      <div id="u51" class="ax_html__">
        <input id="u51_input" type="submit" value="删除" onclick="delete_facilities()" />
      </div>

      <div id="u52" class="ax_html__">
        <input id="u52_input" type="submit" value="上移" onclick="up_facilities()" />
      </div>

      <div id="u53" class="ax_html__">
        <input id="u53_input" type="submit" value="下移" onclick="down_facilities()" />
      </div>

      <div id="u205" class="ax_h1">
        <div id="u206" class="text">
          <p><span>设备名称</span></p>
        </div>
      </div>

      <form class="form-horizontal" role="form" method="post" id="Info" enctype="multipart/form-data">
      <div id="u49" class="ax_html__">
        <input id="u49_input" type="file" value="打开文件" name="pic_name" required="required" onchange="pre_view()" />
      </div>
      <div id="u48" class="ax_文本框_单行_">
        <input id="u48_input" type="text" value="" name="facilities_name" required="required"/>
      </div>
      <div id="u58" class="ax_文本框_单行_">
        <textarea id="u58_input" name="facilities_intro" required="required"></textarea>
      </div>

      <div id="u59" class="ax_html__">
        <input id="u59_input" type="submit" value="添加设备" onClick="javascript:Info.action='<?= site_url("intro/add_facilities/")?>';javascript:Info.target='_self';"/>
      </div>

      </form>


    </div>
  </body>
</html>
<script type="text/javascript">
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
            alert('保存信息成功！');
           }
        });
      }
    }
</script>
