    <link href="<?= base_url('files/teambuild_admin/styles.css')?>" type="text/css" rel="stylesheet"/>  
    <div id="base" class="">

      <div id="u7" class="ax_形状">
      </div>

      <div id="u9" class="ax_形状">
      </div>

      <a href="<?= site_url('teambuild/teambuild_photo')?>" style="text-decoration:none;" onMouseOut ="over2('u11_img')" onMouseOver ="down2('u11_img')">
      <div id="u11" class="ax_形状">
        <img id="u11_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u12" class="text">
          <p><span>&nbsp; &nbsp; 往期照片</span></p>
        </div>
      </div>
      </a>

     <!--  <a href="<?= site_url('teambuild/manageteambuild')?>" style="text-decoration:none;" onMouseOut ="over2('u13_img')" onMouseOver ="down2('u13_img')">
     <div id="u13" class="ax_形状">
       <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
       <div id="u14" class="text">
         <p><span>&nbsp; &nbsp; 动态管理</span></p>
       </div>
     </div>
     </a>
     
     <a href="<?= site_url('teambuild/teambuild_photo')?>" style="text-decoration:none;" onMouseOut ="over2('u37_img')" onMouseOver ="down2('u37_img')">
     <div id="u37" class="ax_形状">
       <img id="u37_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
       <div id="u38" class="text">
         <p><span>&nbsp; &nbsp; 往期照片</span></p>
       </div>
     </div>
     </a> -->
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
