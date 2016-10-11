   <link href="<?= base_url('files/techniques/styles.css')?>" type="text/css" rel="stylesheet"/>
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

      <div id="u50" class="ax_列表选择框">
        <select id="u50_input" size="2" onclick="get_techniques_detail()">
        <option value="-1" hidden selected="selected"></option>
        <?php
        $count=0;
         foreach ($techniques as $rows) {?>
           <option name="<?=$rows['id']?>" value="<?=$rows['id']?>"><?=$rows['techniques_name']?></option>
         }
        <?php }?>
        </select>
      </div>

      <div id="u38" class="ax_image">
        <img id="u38_img" class="img " src="<?= base_url('images/wheel_pic/u18.png')?>"/>
        <div id="u39" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u47" class="ax_html__">
        <input id="u47_input" type="submit" value="删除" onclick="delete_techniques()" />
      </div>

      <div id="u48" class="ax_html__">
        <input id="u48_input" type="submit" value="上移" onclick="up_techniques()" />
      </div>

      <div id="u49" class="ax_html__">
        <input id="u49_input" type="submit" value="下移" onclick="down_techniques()" />
      </div>
<script type="text/javascript">
      function over2(id){
        document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
      }
      function down2(id){
        document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
      }
      function get_techniques_detail(){
        if($("#u50_input").val()!=-1&&$("#u50_input").val()!=null){
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u50_input").val()},
          url : "<?= site_url("intro/get_techniques_detail/") ?>",
          cache : false,
          success : function(data) {
            document.getElementById('u38_img').src="<?= base_url('documents/techniques/')?>"+"/"+data[0]['pic_name'];
          }
        });
      }
      }
      function delete_techniques(){
        if($("#u50_input").val()!=-1&&$("#u50_input").val()!=null){
          if(confirm("确定删除此技术？删除后不可恢复。")){
                $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u50_input").val()},
          url : "<?= site_url("intro/delete_techniques/") ?>",
          cache : false,
          success : function(data) {
            alert('删除设备成功');
            $(document).find("option[name='"+$("#u50_input").val()+"']").remove();
            document.getElementById("u50_input").value="-1";
            document.getElementById('u38_img').src="<?= base_url('images/wheel_pic/u18.png')?>";

          }
        });}}}

      function up_techniques(){
        if($("#u50_input").val()!=-1&&$("#u50_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u50_input").val()},
          url : "<?= site_url("intro/up_techniques/") ?>",
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
              addHtml=addHtml+data[i]['techniques_name']+"</option>";
            }   
            $("#u50_input").empty().append(addHtml).trigger("create");
            document.getElementById('u50_input').value="-1";
            document.getElementById('u38_img').src="<?= base_url('images/wheel_pic/u18.png')?>";
           }
        });
      }
      }

      function down_techniques(){
        if($("#u50_input").val()!=-1&&$("#u50_input").val()!=null){
                        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':$("#u50_input").val()},
          url : "<?= site_url("intro/down_techniques/") ?>",
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
              addHtml=addHtml+data[i]['techniques_name']+"</option>";
            }   
            $("#u50_input").empty().append(addHtml).trigger("create");
            document.getElementById('u50_input').value="-1";
            document.getElementById('u38_img').src="<?= base_url('images/wheel_pic/u18.png')?>";
           }
        });
      }

      }
      </script>

      <div id="u201" class="ax_h1">
        <div id="u202" class="text">
          <p><span>现有技术</span></p>
        </div>
      </div>

      <div id="u203" class="ax_h1">
        <div id="u204" class="text">
          <p><span>技术图片</span></p>
        </div>
      </div>
            <div id="u207" class="ax_h1">
        <div id="u208" class="text">
          <p><span>技术介绍</span></p>
        </div>
      </div>      

      <div id="u205" class="ax_h1">
        <div id="u206" class="text">
          <p><span>技术名称</span></p>
        </div>
      </div>

     <form class="form-horizontal" role="form" method="post" id="Info" enctype="multipart/form-data">
      <div id="u45" class="ax_html__">
        <input id="u45_input" type="file" value="打开文件" name="pic_name" required="required"/>
      </div>
      <div id="u44" class="ax_文本框_单行_">
        <input id="u44_input" type="text" value="" name="techniques_name" required="required"/>
      </div>
      <div id="u58" class="ax_文本框_单行_">
        <textarea id="u58_input" name="techniques_intro" required="required" onchange="lengthcontrol()"></textarea>
      </div>

      <div id="u59" class="ax_html__">
        <input id="u59_input" type="submit" value="添加技术" onClick="javascript:Info.action='<?= site_url("intro/add_techniques/")?>';javascript:Info.target='_self';"/>
      </div>
      </form>
    </div>
  </body>
</html>
