      <link href="<?= base_url('files/contact_pic/styles.css')?>" type="text/css" rel="stylesheet"/>
     
    </head>
    <body>
      <div id="base" class="">

        <div id="u7" class="ax_形状">
        </div>

        <div id="u9" class="ax_形状">
        </div>

        <a href="<?= site_url('contact/contact_pic')?>" style="text-decoration:none;" onMouseOut ="over2('u11_img')" onMouseOver ="down2('u11_img')">
        <div id="u11" class="ax_形状">
          <img id="u11_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
          <div id="u12" class="text">
            <p><span>&nbsp; &nbsp; 联系管理</span></p>
          </div>
        </div>
        </a>

      <div id="img_div">
        <div id="j1"><p><span>现有图片</span></p></div>
        <div id="j2">
          <img src="<?= base_url('documents/contact/').'/'.$old_img?>" id="old_img">
        </div>
        <form class="form-horizontal" role="form" method="post" id="Info" enctype="multipart/form-data">
        <div id="j3"><p><span>替换图片</span></p></div>
        <div id="j4">
          <img id="new_img" src="<?= base_url('images/deletemember/u37.png')?>">
        </div>
        <div  id="j5">
        <input type="file" id="new_pic" name="lab_intro" onchange="pre_view()" accept="image/png,image/gif,image/jpg,image/jpeg" required>
        <input type="button" id="new_pic_input" value="上传文件">
        </div>
        <div id="j6">
        <input type="submit" id="new_pic_button" value="替换" onClick="javascript:Info.action='<?= site_url("contact/change_img/")?>';javascript:Info.target='_self';">
        </div>
        </form>
      </div>
        
        <script type="text/javascript">
          function over2(id){
            document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
          }
          function down2(id){
            document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
          }
          function pre_view(){
            var url = window.URL.createObjectURL(document.getElementById("new_pic").files[0])
            document.getElementById("new_img").src=url;
          }
        </script>
      </div>
    </body>
  </html>
