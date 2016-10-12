    <link href="<?= base_url('files/members/styles.css')?>" type="text/css" rel="stylesheet"/>

    <div id="base" class="">
      <div id="u24">
      <?php $members_role_count=count($members);for ($i=0;$i<$members_role_count;$i++) :
        $members_count=count($members[$i]);
          if($members_count==0) continue;?>
        <div style="width: 1280px;height: 420px;">
          <div id="head">
            <div id="head_name"><p><?= $member_role[$i]['role_name'] ?></p></div>
            <div id="head_line"><hr></div>
          </div>
          <?php for ($j=0;$j<$members_count;$j++) :?>
            <div id="<?= $members[$i][$j]['id']?>" style="position:relative;float: left;width:280px;left: 50px;margin-bottom: 20px;" onMouseOut ="over2(this)" onMouseOver ="down2(this)">
              <img id="u24_img"  src="<?= base_url('documents/members/').'/'.$members[$i][$j]['pic_name']?>"/>
              <div id="u24_text">
                <p><span><?= $members[$i][$j]['members_name']?></span></p>
              </div>
              <div id="<?= 'intro'.$members[$i][$j]['id']?>" style="display:none;position: absolute;top:20px;left: 200px;">
                <div id="intro_div_txt" class="text">
                <div style="height: 60px;position: relative;">
                <div class="float_div"><p><span><?= $members[$i][$j]['admission_year']?></span></p></div>
                <div class="float_div"><p><span><?= $members[$i][$j]['major']?></span></p></div>
                <div class="float_div"><p><span><?= $member_role[$i]['role_name']?></span></p></div>
                </div>
                <div style="margin-top: 15px;width:250px;position: relative;float: left;">
                <div class="float_div"><p><span><?= $members[$i][$j]['skill1']?></span></p></div>
                <div class="float_div"><p><span><?= $members[$i][$j]['skill2']?></span></p></div>
                <div class="float_div"><p><span><?= $members[$i][$j]['skill3']?></span></p></div>
                <div class="float_div"><p><span><?= $members[$i][$j]['skill4']?></span></p></div>
                <div class="float_div"><p><span><?= $members[$i][$j]['skill5']?></span></p></div>
                <div class="float_div"><p><span><?= $members[$i][$j]['skill6']?></span></p></div>
                <div class="float_div"><p><span><?= $members[$i][$j]['skill7']?></span></p></div>
                <div class="float_div"><p><span><?= $members[$i][$j]['skill8']?></span></p></div>
                <div class="float_div"><p><span><?= $members[$i][$j]['skill9']?></span></p></div>
                <div class="float_div"><p><span><?= $members[$i][$j]['skill10']?></span></p></div>
                </div>
                </div>
                <img id="intro_div_img" class="img " src="<?= base_url('images/members/b_u88.png')?>"/>  
              </div>
            </div>
          <?php endfor;?>
        </div>
      <?php endfor;?>
      </div>

      <script type="text/javascript">
        function over2(obj){
          var members_id=obj.id;
          $("#intro"+members_id).css('display','none');
      }
      function down2(obj){
          var members_id=obj.id;
          $("#intro"+members_id).css('display','block');
      }
      </script>

    </div>
  </body>
</html>
