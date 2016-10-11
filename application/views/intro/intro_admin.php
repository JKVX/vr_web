    <link href="<?= base_url('files/intro_admin/styles.css')?>" type="text/css" rel="stylesheet"/>
    <div id="base" class="">
      
      <div id="u9" class="ax_形状">
        <img id="u9_img" class="img " src="<?= base_url('images/teambuild/u16.png')?>"/>
      </div>

      <div id="u11" class="ax_形状">
        <img id="u11_img" class="img " src="<?= base_url('images/teambuild/u18.png')?>"/>
      </div>

      
        <a href="<?= site_url('intro/brief_intro')?>" style="text-decoration:none;" onMouseOut ="over2('u13_img')" onMouseOver ="down2('u13_img')">
        <div id="u13" class="ax_形状">
        <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u14" class="text"><p><span>&nbsp; &nbsp; 简介</span></p>
        </div>
      </div>
      </a>

      
      <a href="<?= site_url('intro/facilities')?>" style="text-decoration:none;" onMouseOut ="over2('u15_img')" onMouseOver ="down2('u15_img')">
      <div id="u15" class="ax_形状">
        <img id="u15_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u16" class="text"><p><span>&nbsp; &nbsp; 现有设备</span></p>
        </div>
      </div>
      </a>

      
      <a href="<?= site_url('intro/techniques')?>" style="text-decoration:none;" onMouseOut ="over2('u19_img')" onMouseOver ="down2('u19_img')">
          <div id="u19" class="ax_形状">
        <img id="u19_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u20" class="text"><p><span>&nbsp; &nbsp; 现有技术</span></p>
        </div>
      </div>
      </a>

      
        <a href="<?= site_url('intro/workshops')?>" style="text-decoration:none;" onMouseOut ="over2('u21_img')" onMouseOver ="down2('u21_img')">
        <div id="u21" class="ax_形状">
        <img id="u21_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u22" class="text"><p><span>&nbsp; &nbsp; 工作坊</span></p>
        </div>
        </a>
      </div>
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
