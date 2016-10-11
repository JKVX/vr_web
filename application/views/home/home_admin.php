<link href="<?= base_url('files/home_admin/styles.css')?>" type="text/css" rel="stylesheet"/>
    <div id="base" class="">
      <div id="u9" class="ax_形状">
      </div>

      <div id="u11" class="ax_形状">
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
        <div id="u116" class="text">
          <p><span>&nbsp; &nbsp; 账号管理</span></p>
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
      
    </div>
  </body>
</html>
