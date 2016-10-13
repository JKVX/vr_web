    <link href="<?= base_url('files/newaddnewitem/styles.css')?>" type="text/css" rel="stylesheet"/>
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

      <form method="post" id="Info" enctype="multipart/form-data">
      <div id="u17" class="ax_h1">
        <div id="u18" class="text">
          <p><span>项目名称</span></p>
        </div>
      </div>

      <div id="u19" class="ax_文本框_单行_">
        <input id="u19_input" type="text" required name="title" />
      </div>

      <div id="u20" class="ax_h1">
        <div id="u21" class="text">
          <p><span>项目简介</span></p>
        </div>
      </div>

      <div id="u22" class="ax_文本框_多行_">
        <textarea id="u22_input" required name="summary"></textarea>
      </div>

      <div id="u42" class="ax_h1">
        <div id="u43" class="text">
          <p><span>视频Demo</span></p>
        </div>
      </div>
      
      <div id="u101" class="ax_文本框_多行_">
        <input type="file" id="u102" name="vid_name">
      </div>

      <div id="u103" class="ax_h1">
        <div id="u104" class="text">
          <p><span>图片区1</span></p>
        </div>
      </div>

      <div id="u105" class="ax_文本框_多行_">
        <input type="file" id="u106" multiple name="pic_name1[]">
      </div>
      
      <div id="u107" class="ax_h1">
        <div id="u108" class="text">
          <p><span>图片区2</span></p>
        </div>
      </div>

      <div id="u109" class="ax_文本框_多行_">
        <input type="file" id="u110" multiple name="pic_name2[]">
      </div>

      <div id="u111" class="ax_h1">
        <div id="u112" class="text">
          <p><span>文字区1</span></p>
        </div>
      </div>

      <div id="u113" class="ax_文本框_多行_">
        <input id="u113_input" type="text" required name="ctitle1" placeholder="文字区1小标题">
        <textarea id="u114" required name="content1" placeholder="文字区1介绍"></textarea>
      </div>

      <div id="u115" class="ax_h1">
        <div id="u116" class="text">
          <p><span>文字区2</span></p>
        </div>
      </div>

      <div id="u117" class="ax_文本框_多行_">
        <input id="u118_input" type="text" name="ctitle2" placeholder="文字区2小标题">
        <textarea id="u118" name="content2" placeholder="文字区2介绍"></textarea>
      </div>

      <div id="u15" class="ax_html__">
        <input id="u15_input" type="submit" value="新建项目" onClick="javascript:Info.action='<?= site_url("research/add_research/")?>';javascript:Info.target='_self';" />
      </div>

      </form>
    </div>
  </body>
</html>
<script type="text/javascript">
  function over2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
  }
  function down2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
  }
</script>

