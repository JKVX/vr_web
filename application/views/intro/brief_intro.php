 <link href="<?= base_url('files/brief_intro/styles.css')?>" type="text/css" rel="stylesheet"/>
   
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



      <div id="u23" class="ax_h1">
        <div id="u24" class="text">
          <p><span>实验室简介</span></p>
        </div>
      </div>

      <div id="u25" class="ax_文本框_多行_">
        <textarea id="u25_input"><?= $lab_intro['lab_intro'] ?></textarea>
      </div>
      <div id="u21" class="ax_html__">
        <input id="u21_input" type="submit" value="确认修改" onclick="updateIntro()"/>
      </div>

      <div id="u22" class="ax_html__">
        <input id="u22_input" type="submit" value="取消" onclick="cancleUpdate()"/>
      </div>


      <div id="u42" class="ax_h1">
        <div id="u38" class="text">
          <p><span>实验室标语</span></p>
        </div>
      </div>

      <div id="u39" class="ax_文本框_多行_">
        <textarea id="u39_input"><?= $lab_slogan['lab_intro'] ?></textarea>
      </div>
      <div id="u40" class="ax_html__">
        <input id="u40_input" type="submit" value="确认修改" onclick="updateSlogan()"/>
      </div>

      <div id="u41" class="ax_html__">
        <input id="u41_input" type="submit" value="取消" onclick="cancleUpdateSlogan()"/>
      </div>

      <script type="text/javascript">
      function over2(id){
        document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
      }
      function down2(id){
        document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
      }
      function updateIntro(){
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'lab_intro':$("#u25_input").val()},
          url : "<?= site_url("intro/update_lab_intro/") ?>",
          cache : false,
          success : function(data) {
            alert("修改成功！");
          }
        });
      }
      function cancleUpdate(){
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          url : "<?= site_url("intro/get_lab_intro/") ?>",
          cache : false,
          success : function(data) {
            document.getElementById("u25_input").value = data['lab_intro'];
          }
        });
      }
            function updateSlogan(){
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'lab_intro':$("#u39_input").val()},
          url : "<?= site_url("intro/update_lab_slogan/") ?>",
          cache : false,
          success : function(data) {
            alert("修改成功！");
          }
        });
      }
      function cancleUpdateSlogan(){
        $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          url : "<?= site_url("intro/get_lab_slogan/") ?>",
          cache : false,
          success : function(data) {
            document.getElementById("u39_input").value = data['lab_intro'];
          }
        });
      }
      </script>

    </div>
  </body>
</html>
