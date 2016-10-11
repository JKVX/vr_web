<link href="<?= base_url('files/intro/styles.css')?>" type="text/css" rel="stylesheet"/>
    <div id="base">
      <div id="u16" class="ax_image">
        <img id="u16_img" class="img " src="<?= base_url('images/intro/u16.png')?>"/>
      </div>

      <div id="u18" class="ax_文本">
        <div id="u19" class="text">
          <p><span><?= $lab_intro['lab_intro'] ?></span></p>
        </div>
      </div>

      <div id="u20" class="ax_image">
        <img id="u20_img" class="img " src="<?= base_url('images/intro/u20.png')?>"/>
      </div>

      <!--facilities  START-->
        <!-- 图片 -->
      <div id="u92" class="ax_动态面板" data-label="Intro_Wheel">     
        <div id="idContainer2" class="container">
          <table id="idSlider2">
            <tbody>
              <tr>
              <?php for($i=0;$i<count($facilities);$i++):?>
                <td class="td_f"><IMG src="<?= site_url('documents/facilities/').'/'.$facilities[$i]['pic_name']?>"></td>
              <?php endfor;?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- 标题和介绍 -->
      <div id="u93" class="ax_动态面板" data-label="Equip_intro">
        <div id="u93_state0" class="panel_state" data-label="状态1">
          <div id="u93_state0_content" class="panel_state_content">
            <div id="u94" class="ax_image">
              <img id="u94_img" class="img " src="<?= base_url('images/intro/u30.png')?>"/>
            </div>
            <div id="u95" class="ax_h1">
             <?php if(0<count($facilities)):?>
                <p><span><?= $facilities[0]['facilities_name']?></span></p>
              <?php endif;?>

            </div>
            <div id="u96" class="ax_文本">
             <?php if(0<count($facilities)):?>
                <p><span><?= $facilities[0]['facilities_intro']?></span></p>
            <?php endif;?>
            </div>
          </div>
        </div>
      </div>
      <!-- 翻页标签 -->
      <div id="u91">
        <ul id="u91_ul" class="csrcode"></ul>
      </div>
      <!--facilities  END-->
      <div id="techniques_div">
      <div id="u48"><img id="u48_img" class="img " src="<?= base_url('images/intro/u48.png')?>"/></div>
      <?php for($i=0;$i<count($techniques);$i++):?>
        <div class="techniques_row">
          <div class="techniques_left">
            <img class="techniques_backimg" src="<?= base_url('images/intro/u50.png')?>"/>
            <img class="techniques_img " src="<?= base_url('documents/techniques/').'/'.$techniques[$i]['pic_name'] ?>"/>
            <p class="techniques_title"><?= $techniques[$i]['techniques_name']?></p>
            <input class="techniques_intro" type="text" value="<?= $techniques[$i]['techniques_intro'] ?>"/>
          </div>
        <?php $i++;if($i<count($techniques)):?>
          <div class="techniques_left">
            <img class="techniques_backimg" src="<?= base_url('images/intro/u50.png')?>"/>
            <img class="techniques_img " src="<?= base_url('documents/techniques/').'/'.$techniques[$i]['pic_name'] ?>"/>
            <p class="techniques_title"><?= $techniques[$i]['techniques_name']?></p>
            <input class="techniques_intro" type="text" value="<?= $techniques[$i]['techniques_intro'] ?>"/>
          </div>
        <?php endif;?>
        </div>
      <?php endfor;?>
      <img id="u65_img" class="img " src="<?= base_url('images/intro/u65.png')?>"/>
            <div id="wmain">
     <?php foreach ($workshops as $rows):?>
     <div id="uwdiv" class="ax_h1">  
        <div id="uwt" class="text">
          <p id="wtp"><span id="wtp1">·</span><span id="wtp2"> <?= $rows['workshops_title']?></span></p>
        </div>
         <div id="uwc">
        <div type="text" id="uwc_input"><?= $rows['workshops_content']?></div>
      </div>
     </div>   
     <?php endforeach; ?>
      </div>
      </div>
     
    </div>
  </body>
</html>
<script type="text/javascript">
        var facilities=new Array();
        <?php for($i=0;$i<count($facilities);$i++):?>
            facilities[<?= $i?>]=[];
            facilities[<?= $i?>]['pic_name']="<?= $facilities[$i]['pic_name'] ?>";
            facilities[<?= $i?>]['facilities_name']="<?= str_replace(array("\r\n", "\r", "\n"),"<br/>",$facilities[$i]['facilities_name'])?>";
            facilities[<?= $i?>]['facilities_intro']="<?= str_replace(array("\r\n", "\r", "\n"),"<br/>",$facilities[$i]['facilities_intro'])?>";
        <?php endfor;?>
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
var st = new SlideTrans("idContainer2", "idSlider2",<?= count($facilities)?>, { Vertical: false });
var nums = [];
//插入数字
for(var i = 0, n = st._count - 1; i <= n;){
  var addHtml="<img src=\""+"<?= base_url('images/home/u44.png')?>"+"\" />";
 (nums[i] = $("u91_ul").appendChild(document.createElement("li"))).innerHTML =++i;
}

forEach(nums, function(o, i){
 o.onmouseover = function(){ 
  o.className = "on"; 
  st.Auto = false; 
  st.Run(i);
 var addHtml="<p><span>"+facilities[i]['facilities_name']+"</span></p>";
  $("u95").innerHTML=addHtml;
  addHtml="<p><span>"+facilities[i]['facilities_intro']+"</span></p>";
  $("u96").innerHTML=addHtml;
}
 o.onmouseout = function(){ o.className = ""; st.Auto = true; st.Run(); }
})
//设置按钮样式
st.onStart = function(){
 forEach(nums, function(o, i){ o.className = st.Index == i ? "on" : ""; 
  });
 var addHtml="<p><span>"+facilities[st.Index]['facilities_name']+"</span></p>";
 $("u95").innerHTML=addHtml;
 addHtml="<p><span>"+facilities[st.Index]['facilities_intro']+"</span></p>";
 $("u96").innerHTML=addHtml;
}
st.Run();
</script>
