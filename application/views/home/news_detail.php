  <link href="<?= base_url('files/news_detail/styles.css')?>" type="text/css" rel="stylesheet"/>
    <div id="base" class="">
      <div id="u20" class="ax_形状">
        <img id="u20_img" class="img " src="<?= base_url('images/research/u18.png')?>"/>
        <div id="u21" class="text">
          <p><span></span></p>
        </div>
      </div>
      <div id="u32" class="autoScroll">
        <div id="title_div"><?= $news['news_title']?></div>
        <div id="title_time">发布时间：<?= $news['news_createtime']?></div>
        <div id="content_div"><?= $news['news_content']?></div>
      </div>
    </div>
  </body>
</html>