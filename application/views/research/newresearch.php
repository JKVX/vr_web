<link href="<?= base_url('files/newresearch/styles.css')?> " type="text/css" rel="stylesheet"/>
    <div id="base" class="">
      <div id="u16" class="ax_形状">
        <img id="u16_img" class="img " src="<?= base_url('images/research/u16.png')?>"/>
        <div id="u17" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u18" class="ax_形状">
        <img id="u18_img" class="img " src="<?= base_url('images/research/u18.png')?>"/>
        <div id="u19" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u20" class="ax_image">
        <a  onclick="openProjects(1)"><img id="u20_img" class="img " src="<?= base_url('images/research/u20.png')?>"/></a>
      </div>

    <div id="u_projects_div" class="ax_形状">
      <div id="u_pro" <?php if(isset($projects)&&$projects['status']==1):?> style="display: none" <?php endif;?>>
      <?php for($i=0;$i<count($u_projects);$i++):?>
        <div id="<?= $u_projects[$i]['id']?>" style="height: 53px;">
        <a href="<?= site_url('research/projects_detail').'/'.$u_projects[$i]['id'] ?>" id="pa"><p id="projects_p">  <span><?= $u_projects[$i]['title']?></span></p>
          <img class="u_img"
            <?php if(isset($projects)&&$projects['id']==$u_projects[$i]['id']){?> 
              src="<?=base_url('images/research/u24_mouseOver.png')?>" 
            <?php }else{?> 
              src="<?=base_url('images/research/u24.png')?>"<?php }?>  id="<?= 'img'.$u_projects[$i]['id']?>"/>
        </a>
      </div>
      <?php endfor;?>
      </div>

      <div id="u22" class="ax_image">
        <a onclick="openProjects(2)"><img id="u22_img" class="img " src="<?= base_url('images/research/u22.png')?>"/></a>
      </div>
      
      <div id="f_pro" <?php if(isset($projects)&&$projects['status']==0):?> style="display: none" <?php endif;?>>
      <div id="f_projects_div" class="ax_形状">
        <?php for($i=0;$i<count($f_projects);$i++):?>
          <div style="height: 53px;" id="<?= $f_projects[$i]['id']?>">
            <a href="<?= site_url('research/projects_detail').'/'.$f_projects[$i]['id'] ?>"><p id="projects_p"><span><?= $f_projects[$i]['title']?></span></p>
              <img class="u_img"
                <?php if(isset($projects)&&$projects['id']==$f_projects[$i]['id']){?> 
                  src="<?=base_url('images/research/u24_mouseOver.png')?>" 
                <?php }else{?> 
                  src="<?=base_url('images/research/u24.png')?>"<?php }?>  id="<?= 'img'.$f_projects[$i]['id']?>"/>
            </a>
          </div>
      <?php endfor;?>
      </div>
      </div>
      </div>
 <script type="text/javascript">
      function openProjects(count){
        if(count==1){
          document.all["f_pro"].style.display="none"; 
          document.all["u_pro"].style.display="block"; 
        }else{
          document.all["f_pro"].style.display="block"; 
          document.all["u_pro"].style.display="none";
        }
      }
      </script>
      <?php if(isset($projects)): ?>
      <div id="projects_detail_div" class="autoScroll" style="overflow-x:auto;overflow-y:auto;">
        <div id="detail_div">
          <?= $projects['title']?>
        </div>
        <div id="summary_div"><?= $projects['summary']?></div>
        <?php if(count($vid)!=0) :?>
        <div id="video_div" >
          <video id="video_detail" controls preload src="<?=base_url('documents/projects/')."/".$projects['id']."/".$vid[0]['pic_name'] ?>">您的浏览器不支持video播放
          </video>
          <div id="DEMO">DEMO</div>
        </div>
      <?php endif;?>
      <?php if(count($pic1)!=0) :?>
        <div id="pic1_div" class="container">
          <table id="idSlider1" class="container_table">
            <tbody>
              <tr>
              <?php for($i=0;$i<count($pic1);$i++): ?>
                <td class="td_f">
                  <img src="<?= site_url('documents/projects/').'/'.$pic1[$i]['projects_id'].'/'.$pic1[$i]['pic_name']?>">
                </td>
              <?php endfor;?>
              </tr>
            </tbody>
          </table>
          <div id="page_div">
            <ul id="page_ul1" class="page_ul"></ul>
          </div>
        </div>
      <?php endif;?>
        <div id="intro1_div" <?php if(count($vid)==0&&count($pic1)==0) :?> style="margin-left:64px;"<?php endif;?>>
          <div id="title1_div">
          <p><?= str_replace(array("\r\n", "\r", "\n"),"<br/>",$projects['ctitle1'])?></p>
          </div>
          <div id="content1_div">
          <p><?= str_replace(array("\r\n", "\r", "\n"),"<br/>",$projects['content1'])?></p>
          </div>
        </div>
      <?php if(count($pic2)!=0) :?>
        <div id="pic2_div" class="container">
          <table id="idSlider2" class="container_table">
            <tbody>
              <tr>
                <?php for($i=0;$i<count($pic2);$i++): ?>
                  <td class="td_f">
                    <img src="<?= site_url('documents/projects/').'/'.$pic2[$i]['projects_id'].'/'.$pic2[$i]['pic_name']?>">
                  </td>
                <?php endfor;?>
              </tr>
            </tbody>
          </table>
          <div id="page_div">
            <ul id="page_ul2" class="page_ul"></ul>
          </div>
        </div>
      <?php endif;?>
        <div id="intro2_div" <?php if(count($vid)==0&&count($pic2)==0) :?> style="margin-right:64px;"<?php endif;?>>
          <div id="title2_div">
          <p><?= str_replace(array("\r\n", "\r", "\n"),"<br/>",$projects['ctitle2'])?></p>
          </div>
          <div id="content2_div">
          <p><?= str_replace(array("\r\n", "\r", "\n"),"<br/>",$projects['content2'])?></p>
          </div>
        </div>
      </div>
    <?php endif;?>
    </div>
  </body>
</html>
 <script type="text/javascript">
    </script>
  </head>
<script type="text/javascript">
if(typeof(pgvMain) == 'function')
pgvMain();
var gtopTab="one";
function $id(id){
 return document.getElementById(id);
}
function changesTab(tab_id){
 if (tab_id==gtopTab){
  return;
 }else{
  $id(gtopTab).className="unselect";
  $id(tab_id).className="select";
  $id("tab_"+gtopTab).style.display="none";
  $id("tab_"+tab_id).style.display="block";
  gtopTab=tab_id;
 }
}
var $ = function (id) {
 return "string" == typeof id ? document.getElementById(id) : id;
};
var Extend = function(destination, source) {
 for (var property in source) {
  destination[property] = source[property];
 }
 return destination;
}
var CurrentStyle = function(element){
 return element.currentStyle || document.defaultView.getComputedStyle(element, null);
}
var Bind = function(object, fun) {
 var args = Array.prototype.slice.call(arguments).slice(2);
 return function() {
  return fun.apply(object, args.concat(Array.prototype.slice.call(arguments)));
 }
}
var Tween = {
 Quart: {
  easeOut: function(t,b,c,d){
   return -c * ((t=t/d-1)*t*t*t - 1) + b;
  }
 },
 Back: {
  easeOut: function(t,b,c,d,s){
   if (s == undefined) s = 1.70158;
   return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
  }
 },
 Bounce: {
  easeOut: function(t,b,c,d){
   if ((t/=d) < (1/2.75)) {
    return c*(7.5625*t*t) + b;
   } else if (t < (2/2.75)) {
    return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
   } else if (t < (2.5/2.75)) {
    return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
   } else {
    return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
   }
  }
 }
}
//容器对象,滑动对象,切换数量
var SlideTrans = function(container, slider, count, options) {
 this._slider = $(slider);
 this._container = $(container);//容器对象
 this._timer = null;//定时器
 this._count = Math.abs(count);//切换数量
 this._target = 0;//目标值
 this._t = this._b = this._c = 0;//tween参数
 this.Index = 0;//当前索引
 this.SetOptions(options);
 this.Auto = !!this.options.Auto;
 this.Duration = Math.abs(this.options.Duration);
 this.Time = Math.abs(this.options.Time);
 this.Pause = Math.abs(this.options.Pause);
 this.Tween = this.options.Tween;
 this.onStart = this.options.onStart;
 this.onFinish = this.options.onFinish;
 var bVertical = !!this.options.Vertical;
 this._css = bVertical ? "top" : "left";//方向
 //样式设置
 var p = CurrentStyle(this._container).position;
 p == "relative" || p == "absolute" || (this._container.style.position = "relative");
 this._container.style.overflow = "hidden";
 this._slider.style.position = "absolute";
 this.Change = this.options.Change ? this.options.Change :
  this._slider[bVertical ? "offsetHeight" : "offsetWidth"] / this._count;
};
SlideTrans.prototype = {
  //设置默认属性
  SetOptions: function(options) {
 this.options = {//默认值
  Vertical: true,//是否垂直方向（方向不能改）
  Auto:  true,//是否自动
  Change:  0,//改变量
  Duration: 50,//滑动持续时间
  Time:  10,//滑动延时
  Pause:  4000,//停顿时间(Auto为true时有效)
  onStart: function(){},//开始转换时执行
  onFinish: function(){},//完成转换时执行
  Tween:  Tween.Quart.easeOut//tween算子
 };
 Extend(this.options, options || {});
  },
  //开始切换
  Run: function(index) {
 //修正index
 index == undefined && (index = this.Index);
 index < 0 && (index = this._count - 1) || index >= this._count && (index = 0);
 //设置参数
 this._target = -Math.abs(this.Change) * (this.Index = index);
 this._t = 0;
 this._b = parseInt(CurrentStyle(this._slider)[this.options.Vertical ? "top" : "left"]);
 this._c = this._target - this._b;
 this.onStart();
 this.Move();
  },
  //移动
  Move: function() {
 clearTimeout(this._timer);
 //未到达目标继续移动否则进行下一次滑动
 if (this._c && this._t < this.Duration) {
  this.MoveTo(Math.round(this.Tween(this._t++, this._b, this._c, this.Duration)));
  this._timer = setTimeout(Bind(this, this.Move), this.Time);
 }else{
  this.MoveTo(this._target);
  this.Auto && (this._timer = setTimeout(Bind(this, this.Next), this.Pause));
 }
  },
  //移动到
  MoveTo: function(i) {
 this._slider.style[this._css] = i + "px";
  },
  //下一个
  Next: function() {
 this.Run(++this.Index);
  },
  //上一个
  Previous: function() {
 this.Run(--this.Index);
  },
  //停止
  Stop: function() {
 clearTimeout(this._timer); this.MoveTo(this._target);
  }
};
</SCRIPT>
<script type="text/javascript">
//new SlideTrans("idContainer", "idSlider", 3).Run();
///////////////////////////////////////////////////////////
var forEach = function(array, callback, thisObject){
 if(array.forEach){
  array.forEach(callback, thisObject);
 }else{
  for (var i = 0, len = array.length; i < len; i++) { callback.call(thisObject, array[i], i, array); }
 }
}
st = new SlideTrans("pic1_div", "idSlider1",<?= count($pic1)?>, { Vertical: false });
sp = new SlideTrans("pic2_div", "idSlider2",<?= count($pic2)?>, { Vertical: false });
var nums = [];
var nums2=[];
//插入数字
for(var i = 0, n = st._count - 1; i <= n;){
  var addHtml="<img src=\""+"<?= base_url('images/home/u44.png')?>"+"\" />";
 (nums[i] = $("page_ul1").appendChild(document.createElement("li"))).innerHTML =++i;
}

forEach(nums, function(o, i){
 o.onmouseover = function(){ 
  o.className = "on"; 
  st.Auto = false; 
  st.Run(i);
}
 o.onmouseout = function(){ o.className = ""; st.Auto = true; st.Run(); }
})
//设置按钮样式
st.onStart = function(){
 forEach(nums, function(o, i){ o.className = st.Index == i ? "on" : ""; 
  });
}
st.Run();
/*第二个轮播图区域*/
for(var i = 0, n = sp._count - 1; i <= n;){
  var addHtml="<img src=\""+"<?= base_url('images/home/u44.png')?>"+"\" />";
 (nums2[i] = $("page_ul2").appendChild(document.createElement("li"))).innerHTML =++i;
}

forEach(nums2, function(o, i){
 o.onmouseover = function(){ 
  o.className = "on"; 
  sp.Auto = false; 
  sp.Run(i);
}
 o.onmouseout = function(){ o.className = ""; sp.Auto = true; sp.Run(); }
})
//设置按钮样式
sp.onStart = function(){
 forEach(nums2, function(o, i){ o.className = sp.Index == i ? "on" : ""; 
  });
}
sp.Run();
</script>
