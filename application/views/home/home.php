<link href="<?= base_url('files/home/styles.css')?>" type="text/css" rel="stylesheet"/>
<script src="<?= base_url('js/three.min.js'); ?>"></script>
<script src="<?= base_url('js/photo-sphere-viewer.min.js'); ?>"></script>
<script src="<?= base_url('js/example1.js'); ?>"></script>
       <div id="base" class="">
      
      <div id="u19" class="ax_动态面板" data-label="Home_Wheel">
        <div id="u19_state0" class="panel_state" data-label="Pic1">
        <div class="prev_next">
        <input type="text" id="img_id" hidden="hidden">
            <span class="prev" onclick="load_prev_img()"></span>
            <span class="next" onclick="load_next_img()"></span>
        </div>
          <div id="container" class="panel_state_content" style="background-color:#403e40;z-index: 0;"></div>
        </div>
      </div>
  

      <div id="u26" class="ax_形状">
        <img id="u26_img" class="img " src="<?= base_url('images/home/u26.png')?>"/>
      </div>

      <div id="u28" class="ax_image">
        <img id="u28_img" class="img " src="<?= base_url('images/home/u28.png')?>"/>
      </div>

      <div id="u30" class="ax_image">
        <img id="u30_img" class="img " src="<?= base_url('images/home/u30.png')?>"/>
        <div id="u31">
          <p><?= str_replace(array("\r\n", "\r", "\n"),"<br/>",$slogan['lab_intro'])?></p>
        </div>
      </div>

      <div id="u32" class="ax_文本">
        <div id="u33" class="text">
        <?php for($i=0;$i<count($news)&&$i<3;$i++){?>
          <a style="text-decoration:none;" href="<?="/home/news_detail/".$news[$i]['id']?>"><p><span><?= $news[$i]['news_title']?></span><p></a>
        <?php }?>
        </div>
      </div>

      <div id="u34" class="ax_形状">
        <img id="u34_img" class="img " src="<?= base_url('images/home/u34.png')?>"/>
      </div>

      <div id="u36" class="ax_image">
        <img id="u36_img" class="img " src="<?= base_url('images/home/u36.png')?>"/>
      </div>


      <div id="u40" class="ax_image">
        <img id="u40_img" class="img " src="<?= base_url('images/home/u40.png')?>"/>
      </div>

      <form class="form-horizontal" role="form" method="post" id="Info" enctype="multipart/form-data"> 
        <div id="u42" class="ax_文本框_单行_">
          <input id="u42_input" type="text" value="" name="username" required="required" />
          <!-- 微软雅黑light 20px 字距0 -->
        </div>
        <div id="u43" class="ax_文本框_单行_">
          <input id="u43_input" type="text" value="" name="password"  required="required"/>
        </div>
        <div id="u38" class="ax_image">
        <input type="submit" onClick="javascript:Info.action='<?= site_url("home/login/")?>';javascript:Info.target='_self';" style="left:0px;position:absolute;z-index:1000;cursor:pointer;border:1px;width: 150px;background:rgba(0, 0, 0, 0);height: 38px;" value="">
          <img id="submit_img" src="<?= base_url('images/home/u38.png')?>"/>
          <div id="u39" class="text">
            <p><span></span></p>
          </div>
        </div>
      </form>
      <div id="u45">
          <?php for($i=0;$i<count($wheel_pic);$i++):?>
          <div id="u44_div">
              <img id="<?= 'u44_img'.$i ?>" style="cursor:pointer;" class="imga" onMouseOut="mouse_out('<?= $i ?>')" onMouseOver="mouse_over('<?= $i ?>')" src="<?= base_url('images/home/u44.png')?>" onclick="load_img('<?= $i ?>')"/>
          </div>
          <?php endfor;?>
      </div>
    </div>
  </body>
</html>

<script type="text/javascript">
function mouse_out(count){
          document.getElementById("u44_img"+count).src="<?= base_url('images/home/u44.png')?>";
        }
        function mouse_over(count){
          document.getElementById("u44_img"+count).src="<?= base_url('images/home/u44_selected.png')?>";
        }
        $(".panel_state").hover(function(){
            $(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
        },
        function(){
            $(this).find(".prev,.next").fadeOut()
        });
      var wheel_pic=new Array();
      var pic_num;
      window.onload=function(){
        pic_num=<?= count($wheel_pic)?>;
        <?php for($i=0;$i<count($wheel_pic);$i++):?>
          wheel_pic[<?= $i?>]="<?= $wheel_pic[$i]?>";
        <?php endfor;?>
        load_img(0);
      }
      function load_img(count){
        $("#img_id").val(count);
      // Retrieve the chosen file and create the FileReader object
      var div = document.getElementById('container');
      var PSV = new PhotoSphereViewer({
      // Path to the panorama
      panorama: '<?= base_url('documents/wheel_pic/'); ?>'+"/"+wheel_pic[count],
      // Container
      container: div,
      // Deactivate the animation
      time_anim: false,
      // 导航条
      navbar: true,
      // Resize the panorama
      autoload:true,
      loading_msg:"图片太大啦，正在加载~",
      loading_img: '<?= base_url('documents/wheel_pic/background.jpg'); ?>',
      size: {
        width: '100%',
        height: '854px'
      },
    });
    }
    function load_prev_img(){
        var id=parseInt($("#img_id").val());
        if(id==0){
          id=pic_num-1;
        }else{
          id=id-1;
        }
        load_img(id);
    } 
    function load_next_img(){
        var id=parseInt($("#img_id").val());
        if(id==pic_num-1){
          id=0;
        }else{
          id=id+1;
        }
        load_img(id);
    } 
   
</script>
