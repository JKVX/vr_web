<link href="<?= base_url('files/manage_account/styles.css')?>" type="text/css" rel="stylesheet"/>
    <div id="base" class="">

      <div id="u9" class="ax_形状">
      </div>

      <div id="u11" class="ax_形状">
      </div>

      <a href="<?= site_url('home/news_1')?>" style="text-decoration:none;" onMouseOut ="over2('u13_img')" onMouseOver ="down2('u13_img')">
      <div id="u13" class="ax_形状">
        <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u14" class="text"><p><span>&nbsp; &nbsp; 最新动态</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('home/wheel_pic')?>" style="text-decoration:none;" onMouseOut ="over2('u15_img')" onMouseOver ="down2('u15_img')">
      <div id="u15" class="ax_形状">
        <img id="u15_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u16" class="text"><p><span>&nbsp; &nbsp; 轮播图片</span></p>
        </div>
      </div>
      </a>

      <a href="<?= site_url('home/manage_account')?>" style="text-decoration:none;" onMouseOut ="over2('u115_img')" onMouseOver ="down2('u115_img')">
      <div id="u115" class="ax_形状">
        <img id="u115_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u116" class="text"><p><span>&nbsp; &nbsp; 账号管理</span></p>
        </div>
      </div>
      </a>
      
      <script type="text/javascript">
      function over2(id){
        document.getElementById(id).src="<?= base_url('images/research/u24.png')?>";
      }
      function down2(id){
        document.getElementById(id).src="<?= base_url('images/research/u24_mouseOver.png')?>";
      }
      </script>
      <div id="account_table">
        <table class="altrowstable" id="alternatecolor">
          <tr>
            <th style="width: 5%">序号</th>
            <th style="width: 20%">账号</th>
            <th style="width: 20%">密码</th>
            <th style="width: 15%">角色</th>
            <th style="width: 20%">备注</th>
            <th style="width: 20%">操作</th>
          </tr>
          <tbody id="tbody">
            <?php for($i=0;$i<count($account);$i++):?>
            <tr>
              <td><?= $i+1 ?></td>
              <td><?= $account[$i]['username']?></td>
              <td id="<?= 'password_'.$account[$i]['id']?>"><?= $account[$i]['password']?></td>
              <td><?= $account[$i]['role_name']?></td>
              <td><?= $account[$i]['remark']?></td>
              <td id="<?= 'operation_'.$account[$i]['id']?>">
              <?php if($account[$i]['role']!=1):?>
                <a onclick="delete_account(<?=$account[$i]['id']?>)">删除</a>
              <?php endif;?>
                <a onclick="begin_edit(<?=$account[$i]['id']?>)">修改密码</a>
              </td>
            </tr>
          <?php endfor;?>
          </tbody>
          <tr style="visibility: hidden;" id="add_tr">
            <td></td>
            <td><input type="text" id="add_username"></td>
            <td><input type="text" id="add_password"></td>
            <td>
              <select id="add_role">
                <?php for($i=1;$i<count($account_role);$i++):?>
                  <option value="<?= $account_role[$i]['role_id']?>"><?= $account_role[$i]['role_name']?></option>
                <?php endfor; ?>
              </select>
            </td>
            <td><input type="text" id="add_remark"></td>
            <td>
              <a onclick="save_add()">保存</a>
              <a onclick="cancle_add()">取消</a>
            </td>
          </tr>
        </table>   
      </div>
      <a onclick="begin_add()" id="add_a">新建账号</a>    
      <script type="text/javascript">
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
        function begin_add(){
          document.getElementById('add_tr').style.visibility="visible";
          document.getElementById('add_a').style.visibility="hidden";
           document.getElementById('add_username').focus();
        }
        function cancle_add(){
          $("#add_username").val("");
          $("#add_password").val("");
          $("#add_role").val("");
          $("#add_remark").val("");
          document.getElementById('add_tr').style.visibility="hidden";
          document.getElementById('add_a').style.visibility="visible";
        }
        function save_add(){
          if($("#add_username").val()==""){
            alert('账号不能为空！');
          }else if($("#add_password").val()==""){
            alert('密码不能为空！');
          }else{
            $
            .ajax({
              type: "post",
              async : false,
              dataType : "json", //收受数据格式
              data:{'username':$("#add_username").val(),'password':$("#add_password").val(),'role':$("#add_role").val(),'remark':$("#add_remark").val()},
              url : "<?= site_url("home/add_account/") ?>",
              cache : false,
              success:function(data){
                if(data[0]==0){
                  alert('账号已存在！');
                }else{
                  alert('新建账号成功！');
                  var className;
                  if(data[3] % 2 == 1){
                    className = "evenrowcolor";
                  }else{
                    className = "oddrowcolor";
                  }      
                  $("#add_username").val("");
                  $("#add_password").val("");
                  $("#add_role").val("");
                  $("#add_remark").val("");      
                  document.getElementById('add_tr').style.visibility="hidden";
                  document.getElementById('add_a').style.visibility="visible";
                  var addHtml="<tr class=\""+className+"\">";
                  addHtml=addHtml+"<td>"+data[2]+"</td>"
                  addHtml=addHtml+"<td>"+data[1]['username']+"</td>"
                  addHtml=addHtml+"<td id=\"password_"+data[1]['id']+"\">"+data[1]['password']+"</td>";
                  addHtml=addHtml+"<td>"+data[1]['role_name']+"</td>"
                  addHtml=addHtml+"<td>"+data[1]['remark']+"</td>"
                  addHtml=addHtml+"<td id=\"operation_"+data[1]['id']+"\">";
                  addHtml=addHtml+"<a onclick=\"delete_account("+data[1]['id']+")\">删除 </a>";
                  addHtml=addHtml+"<a onclick=\"begin_edit("+data[1]['id']+")\">修改密码</a>";
                  addHtml=addHtml+"</td></tr>"
                  $("#tbody").append(addHtml).trigger("create");
                }
              }
            });
          }
        }
        function delete_account(id){
          if(confirm("确定删除此账号？删除后不可恢复。")){
          $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':id},
          url : "<?= site_url("home/delete_account/") ?>",
          cache : false,
          success : function(data) {
            alert('删除账号成功');
            var addHtml="";
            for(var i=0;i<data.length;i++){
              if(i%2==0){
                addHtml=addHtml+"<tr class=\"oddrowcolor\">";
              }else{
                addHtml=addHtml+"<tr class=\"evenrowcolor\">";
              }
              addHtml=addHtml+"<td>"+(i+1)+"</td>";
              addHtml=addHtml+"<td>"+data[i]['username']+"</td>";
              addHtml=addHtml+"<td id=\"password_"+data[i]['id']+"\">"+data[i]['password']+"</td>";
              addHtml=addHtml+"<td>"+data[i]['role_name']+"</td>";
              addHtml=addHtml+"<td>"+data[i]['remark']+"</td>";
              addHtml=addHtml+"<td id=\"operation_"+data[i]['id']+"\">";
              if(data[i]['role']!=1){
                addHtml=addHtml+"<a onclick=\"delete_account("+data[i]['id']+")\">删除 </a>";
              }
              addHtml=addHtml+"<a onclick=\"begin_edit("+data[i]['id']+")\">修改密码</a></td></tr>"
            }
            $("#tbody").empty().append(addHtml).trigger("create");
           }
        });
      }
        }
        function begin_edit(id){
          var addHtml="<input type=\"text\" id=\"password_inputd_"+id+"\">";
          $("#password_"+id).empty().append(addHtml).trigger("create");
          addHtml="<a onclick=\"save_edit("+id+")\">保存 </a>";
          addHtml=addHtml+"<a onclick=\"cancle_edit("+id+")\">取消</a>";
          $("#operation_"+id).empty().append(addHtml).trigger("create");
        }
        function cancle_edit(id){
          $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':id},
          url : "<?= site_url("home/get_account_detail/") ?>",
          cache : false,
          success : function(data) {
            var addHtml=data[0]['password'];
            $("#password_"+id).empty().append(addHtml).trigger("create");
            var addHtml="";
            if(data[0]['role']!=1)
            {
              addHtml="<a onclick=\"delete_account("+data[0]['id']+")\">删除 </a>";
            }
            addHtml=addHtml+"<a onclick=\"begin_edit("+data[0]['id']+")\">修改密码</a>";
            $("#operation_"+id).empty().append(addHtml).trigger("create");
           }      
        });
        }
        function save_edit(id){
          if($("#password_inputd_"+id).val()==""){
            alert('密码不能为空！');
          }else{
          $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'id':id,'password':$("#password_inputd_"+id).val()},
          url : "<?= site_url("home/edit_account/") ?>",
          cache : false,
          success : function(data) {
            alert('修改密码成功！');
            var addHtml=data[0]['password'];
            $("#password_"+id).empty().append(addHtml).trigger("create");
            var addHtml="";
            if(data[0]['role']!=1)
            {
              addHtml="<a onclick=\"delete_account("+data[0]['id']+")\">删除 </a>";
            }
            addHtml=addHtml+"<a onclick=\"begin_edit("+data[0]['id']+")\">修改密码</a>";
            $("#operation_"+id).empty().append(addHtml).trigger("create");
           }      
        });
        }
      }
      </script>
    </div>
  </body>
</html>
