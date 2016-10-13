    <link href="<?= base_url('files/edit_pic/styles.css')?>" type="text/css" rel="stylesheet"/>
      </head>
  <body>
    <div id="base" class="">

      <div id="u7" class="ax_形状">
      </div>

      <div id="u9" class="ax_形状">
      </div>

      <a href="<?= site_url('research/deleteitem')?>" style="text-decoration:none;" onMouseOut ="over2('u11_img')" onMouseOver ="down2('u11_img')">
      <div id="u11" class="ax_形状">
        <img id="u11_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u12" class="text">
          <p><span>&nbsp; &nbsp;已有项目</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('research/addnewitem')?>" style="text-decoration:none;" onMouseOut ="over2('u13_img')" onMouseOver ="down2('u13_img')">
      <div id="u13" class="ax_形状">
        <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u14" class="text">
          <p><span>&nbsp; &nbsp;新建项目</span></p>
        </div>
      </div>
      </a>

      <div id="u17" class="ax_h1">
        <div id="u18" class="text">
          <p><span>已有图片/视频</span></p>
        </div>
      </div>
      
      <div id="u101" class="ax_列表选择框">
        <select id="u102" size="2">
        <option value="-1" hidden="hidden" selected></option>
        <?php for($i=0;$i<count($media);$i++):?>
          <option value="<?= $media[$i]['pic_id']?>" name="<?= $media[$i]['pic_id']?>">
            <?php switch($media[$i]['status']){
              case 0:?><?= '&nbsp视&nbsp&nbsp频&nbsp&nbsp——'.$media[$i]['old_pic_name']?><?php ;break;
              case 1:?><?= '图片区1——'.$media[$i]['old_pic_name']?><?php ;break;
              case 2:?><?= '图片区2——'.$media[$i]['old_pic_name']?><?php ;break;
            }?>
          </option>
        <?php endfor;?>
        </select>
     </div>

      <div id="u109" class="ax_html__">
        <input id="u110" type="submit" value="删除" onclick="delete_pic()" />
      </div>

      <script type="text/javascript">
      function delete_pic(){
        if($("#u102").val()!=-1&&$("#u102").val()!=null){
          if(confirm("确定删除此图片/视频？删除后不可恢复。")){
            $
            .ajax({
              type : "post",
              async : false,
              dataType : "json", //收受数据格式
              data:{'id':$("#u102").val()},
              url : "<?= site_url("research/delete_pic/") ?>",
              cache : false,
              success : function(data) {
                alert('删除图片/视频成功');
                $(document).find("option[name='"+$("#u102").val()+"']").remove();
                $("#u102").val('-1');
              }
            });
          }
        }
      }
  function over2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
  }
  function down2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
  }
  function check(){
    var flag=true;
    if($("#u108").val()=="0"){
    $
            .ajax({
              type : "post",
              async : false,
              dataType : "json", //收受数据格式
              data:{'id':$("#id").val()},
              url : "<?= site_url("research/get_video_num/") ?>",
              cache : false,
              success : function(data) {
                if(data=="1"){
                  alert('已存在DEMO视频，无法上传');
                  flag=false;
                }
              }
            });
          }
      if(!flag){
        return false;
      }
  }
      </script>

      <div id="u111" class="ax_h1">
        <div id="u112" class="text">
          <p><span>添加图片/视频</span></p>
        </div>
      </div>

      <form class="form-horizontal" role="form" method="post" id="Info" enctype="multipart/form-data" onsubmit="return check()">
      <input name="id" id="id" hidden="hidden" type="text" value="<?= $projects['id']?>">
      <div id="u103" class="ax_html__">
        <input id="u104" name="pic_name" type="file" value="打开文件" required />
      </div>

      <div id="u107" class="ax_html__">
        <select id="u108" name="status" type="text"  required>
          <option value="0">视频</option>
          <option value="1">图片区1</option>
          <option value="2">图片区2</option>
        </select>
      </div>

      <div id="u105" class="ax_html__">
        <input id="u106" type="submit" value="添加" onClick="javascript:Info.action='<?= site_url("research/add_pic/")?>';javascript:Info.target='_self';"/>
      </div>
      </form>

    </div>
  </body>
</html>

