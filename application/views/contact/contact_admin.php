    <link href="<?= base_url('files/contact_admin/styles.css')?>" type="text/css" rel="stylesheet"/>
   
  </head>
  <body>
    <div id="base" class="">

      <div id="u7" class="ax_形状">
      </div>

      <div id="u9" class="ax_形状">
      </div>

      <a href="<?= site_url('contact/contact_admin')?>" style="text-decoration:none;" onMouseOut ="over2('u11_img')" onMouseOver ="down2('u11_img')">
      <div id="u11" class="ax_形状">
        <img id="u11_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u12" class="text">
          <p><span>&nbsp; &nbsp; 联系管理</span></p>
        </div>
      </div>
      </a>


      <div style="position: absolute;left: 350px;top:250px;overflow :auto;height: 900px;width: 930px">
        <table class="altrowstable" id="alternatecolor">
          <tr>
            <th hidden="hidden">ID</th>
            <th>序号</th>
            <th>姓名</th>
            <th>联系方式</th>
            <th>专业/学校</th>
            <th>留言时间</th>
            <th>留言详情</th>
            <th>操作</th>
          </tr>
          <tbody id="tbody">
          <?php for($i=0;$i<count($contact_list);$i++):?>
            <tr>
              <td hidden="hidden"><?= $contact_list[$i]['id']?></td>
              <td style="width: 6%"><?= ($i+1) ?></td>
              <td style="width: 8%"><?= $contact_list[$i]['name'] ?></td>
              <td style="width: 10%"><?= $contact_list[$i]['tel'] ?></td>
              <td style="width: 15%"><?= $contact_list[$i]['school'] ?></td>
              <td style="width: 25%"><?= $contact_list[$i]['createtime'] ?></td>
              <td style="width: 25%"><?= $contact_list[$i]['message'] ?></td>
              <td style="width: 25%"><a onclick="delete_message(<?= $contact_list[$i]['id']?>)">删除</a></td>
            </tr>
          <?php endfor;?>
          </tbody>
        </table>      
      </div>
      <div id="download_a">
          <a href="<?= site_url('contact/download_contact') ?>">下载详情表</a>
        </div>
      <script type="text/javascript">
        function over2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
  }
  function down2(id){
    document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
  }
      function altRows(id){
        if(document.getElementsByTagName){  
          var table = document.getElementById(id);  
          var rows = table.getElementsByTagName("tr"); 
          for(i = 0; i < rows.length; i++){          
            if(i % 2 == 0){
              rows[i].className = "evenrowcolor";
            }else{
              rows[i].className = "oddrowcolor";
            }      
          }
        }
      }
      window.onload=function(){
        altRows('alternatecolor');
      }
      function delete_message(id){
               if(confirm("确定删除此留言？删除后不可恢复。")){
         $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':id},
          url : "<?= site_url("contact/delete_message/") ?>",
          cache : false,
          success : function(data) {
            alert('删除留言成功');
            var addHtml="";
           for(var i=0;i<data.length;i++){
            if(i%2==0){
              addHtml=addHtml+"<tr class=\"oddrowcolor\">";
            }else{
              addHtml=addHtml+"<tr class=\"evenrowcolor\">";
            }
                addHtml=addHtml+"<td hidden=\"hidden\">"+data[i]['id']+"</td>";
                addHtml=addHtml+"<td style=\"width:6%\">"+(i+1)+"</td>";
                addHtml=addHtml+"<td style=\"width:8%\">"+data[i]['name']+"</td>";
                addHtml=addHtml+"<td style=\"width:10%\">"+data[i]['tel']+"</td>";
                addHtml=addHtml+"<td style=\"width:15%\">"+data[i]['school']+"</td>";
                addHtml=addHtml+"<td style=\"width:25%\">"+data[i]['createtime']+"</td>";
                addHtml=addHtml+"<td style=\"width:25%\">"+data[i]['message']+"</td>";
                addHtml=addHtml+"<td style=\"width:25%\"><a onclick=\"delete_message("+data[i]['id']+")\">删除</a></td></tr>";
            }
            $("#tbody").empty().append(addHtml).trigger("create");
           }
        });
      }
      }
      </script>
    </div>
  </body>
</html>
