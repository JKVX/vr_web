    <link href="<?= base_url('files/teambuild/styles.css')?>" type="text/css" rel="stylesheet"/>
    <div id="base" class="">
      <div id="u18" class="ax_形状">
        <img id="u18_img" class="img " src="<?= base_url('images/research/u18.png')?>"/>
        <div id="u19" class="text">
          <p><span></span></p>
        </div>
      </div>
    <?php if($type==1):?>
      <div id="u16" class="ax_形状">
        <img id="u16_img" class="img " src="<?= base_url('images/research/u16.png')?>"/>
        <div id="u17" class="text">
          <p><span></span></p>
        </div>
      </div>
      
      <div id="teambuild_list"  >
      <?php for($i=0;$i<count($teambuild_list);$i++):?>
        <div id="<?= $i?>" class="teambuild_list_div">
        <a href="<?= site_url('teambuild/teambuild_detail').'/'.$teambuild_list[$i]['id'] ?>">
          <p class="teambuild_list_p"><span><?= $teambuild_list[$i]['title']?></span></p>
        </a>
        <?php if($teambuild['id']==$teambuild_list[$i]['id']){?>
          <img  src="<?=base_url('images/research/u24_mouseOver.png')?>" id="<?= $i.'img'?>" class="teambuild_list_img"/>
        <?php }else{ ?>
          <img  src="<?=base_url('images/research/u24.png')?>" id="<?= $i.'img'?>" class="teambuild_list_img"/>
        <?php }?>
        </div>
      <?php endfor;?>
      <a href="<?= site_url('teambuild/show_teambuild_photo')?>"><p id="photo_p"><span>往期照片</span></p></a>
      </div>

      <?php if(isset($teambuild)):?>
      <div id="teambuild_detail" class="autoScroll" style="overflow-x:auto;overflow-y:auto;">
        <div id="teambuild_title"><?= $teambuild['title']?></div>
        <div id="teambuild_content"><?= $teambuild['content']?></div>
      </div>
    <?php endif;?>
    <?php endif;?>

    <?php if($type==0):?>
      <div id="u39">
        <div id="u40">
          <p><span>往期照片</span></p>
        </div>
      </div>
      <div class="demo">
        <a class="control prev"></a><a class="control next abs"></a><!--自定义按钮，移动端可不写-->
        <div class="slider"><!--主体结构，请用此类名调用插件，此类名可自定义-->
          <ul>
          <?php for($i=0;$i<count($teambuild_photo);$i++):?>
            <li><a href="" style="list-style: none"><img src="<?= base_url('documents/teambuild_photo/'.$teambuild_photo[$i]['pic_name'])?>" alt="<?= $teambuild_photo[$i]['content']?>" /></a></li>
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
    <?php endif;?>
<script type="text/javascript">
        window.onload=function(){
          $("video").attr("autoplay",'autoplay');
          $("video").attr("preload",'preload');
        }      
</script>
      
    </div>
  </body>
</html>