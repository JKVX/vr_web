    <link href="<?= base_url('files/teambuild/styles.css')?>" type="text/css" rel="stylesheet"/>
    <div id="base" class="">
      <div id="u18" class="ax_形状">
        <img id="u18_img" class="img " src="<?= base_url('images/research/u18.png')?>"/>
        <div id="u19" class="text">
          <p><span></span></p>
        </div>
      </div>
      <div id="load_img_div" style="position: absolute;z-index: 109"></div>
      <a onclick="small()"><img src="" style="visibility: hidden;position:absolute;z-index:110" id="load_img"/></a>
    <?php if($type==0):?>
      <div id="u39">
      </div>
      <div class="demo">
      <div class="prev_next"><a class="control prev"></a><a class="control next abs"></a></div>
        <div class="slider"><!--主体结构，请用此类名调用插件，此类名可自定义-->
          <ul>
          <?php for($i=0;$i<count($teambuild_photo);$i++):?>
            <li><a href="javascript:void(0);" style="list-style: none;" onclick="preview('<?= base_url('documents/teambuild_photo/'.$teambuild_photo[$i]['pic_name'])?>')"><img src="<?= base_url('documents/teambuild_photo/'.$teambuild_photo[$i]['pic_name'])?>" alt="<?= $teambuild_photo[$i]['content']?>" /></a></li>
          <?php endfor;?>
          </ul>
        </div>
      </div>
      <style type="text/css">
        ul{padding:0;}
        #u18{height: 949px;width: 1280px;left: 0px}
        #u18_img{height: 949px;width: 1280px}
      </style>
      <script src="<?= base_url('js/YuxiSlider.jQuery.min.js')?>"></script>
      <script>
        $(".slider").YuxiSlider({
          width:1080, //容器宽度
          height:660, //容器高度
          control:$('.control'), //绑定控制按钮
          during:4000, //间隔4秒自动滑动
          speed:800, //移动速度0.8秒
          mousewheel:true, //是否开启鼠标滚轮控制
          direkey:true //是否开启左右箭头方向控制
          });
      </script>
      <script type="text/javascript">
      
        $(".demo").hover(function(){
            $(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
        },
        function(){
            $(this).find(".prev,.next").fadeOut()
        });
        function preview(url){
          var imgWidth=document.body.clientWidth*1.2;
          var imgHeight=imgWidth/1080*660;
          var width=Math.round((document.body.clientWidth-imgWidth)/2);
          var height=Math.round((document.body.clientHeight-imgHeight)/2);
          document.getElementById("load_img").src=url;
          document.getElementById("load_img").style.visibility="visible";
          document.getElementById("load_img").style.height=imgHeight+"px";
          document.getElementById("load_img").style.width=imgWidth+"px";
          document.getElementById("load_img_div").style.visibility="visible";
          document.getElementById("load_img_div").style.width=document.body.clientWidth+"px";
          document.getElementById("load_img_div").style.height=document.body.clientHeight+"px";
          document.getElementById("load_img_div").style.backgroundColor="black";
          document.getElementById("load_img_div").style.opacity=1;
          $("#load_img").css({'top':height,'left':width}); 
          $("#load_img_div").css({'top':0,'left':0}); 
        }
        function small(){
          document.getElementById("load_img").src="";
          document.getElementById("load_img").style.visibility="hidden";
          document.getElementById("load_img_div").style.visibility="hidden";
          document.getElementById("load_img").style.height=0;
          document.getElementById("load_img").style.width=0;
        }
      </script>
    <?php endif;?>
<!-- <script type="text/javascript">
        window.onload=function(){
          $("video").attr("preload",'preload');
        }      
</script>
       -->
    </div>
  </body>
</html>