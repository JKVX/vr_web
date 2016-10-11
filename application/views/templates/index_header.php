<body>
<link href="<?= base_url('files/index_header/styles.css')?>" type="text/css" rel="stylesheet"/>
<div class="index_head">
	<div class="log"><a href="<?= site_url('home')?>"><img src="<?= base_url('images/home/u3.png')?>" class="log_img"></a></div>
	<div class="vr_lab"><a href="<?= site_url('home')?>"><img src="<?= base_url('images/home/u5.png')?>" class="vr_lab_img"></a></div>
	<a href="<?= site_url('home/index')?>"><div class="title_a" onmouseover="over(this)" onmouseout="out(this)"><p class="p_a">主页</p></div></a>
	<a href="<?= site_url('intro/index')?>"><div class="title_a" onmouseover="over(this)" onmouseout="out(this)"><p class="p_a">简介</p></div></a>
	<a href="<?= site_url('members/index')?>"><div class="title_a" onmouseover="over(this)" onmouseout="out(this)"><p class="p_a">成员</p></div></a>
	<a href="<?= site_url('research/index')?>"><div class="title_b" onmouseover="over(this)" onmouseout="out(this)"><p class="p_b">主要研究</p></div></a>
	<a href="<?= site_url('teambuild/index')?>"><div class="title_b" onmouseover="over(this)" onmouseout="out(this)"><p class="p_b">团队建设</p></div></a>
	<a href="<?= site_url('contact/index')?>"><div class="title_b" onmouseover="over(this)" onmouseout="out(this)"><p class="p_b">联系我们</p></div></a>
</div>
<script type="text/javascript">
    function over(obj){
    	obj.style.backgroundColor="#d8af03";
    	obj.style.color="#faf5e0";
    }
    function  out(obj){
        obj.style.backgroundColor="#1c1c1c";
    	obj.style.color="#cccccc";
    }
</script>