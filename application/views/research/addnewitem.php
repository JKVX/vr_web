    <link href="<?= base_url('files/addnewitem/styles.css')?>" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="<?= base_url('tools/ueditor/ueditor.config.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('tools/ueditor/ueditor.all.min.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('tools/ueditor/ueditor.all.min.js'); ?>"></script>
<!--建议手动加载语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" src="<?= base_url('tools/ueditor/lang/zh-cn/zh-cn.js'); ?>"></script>
      </head>
  <body>
    <div id="base" class="">

      <div id="u0" class="ax_形状">
        <img id="u0_img" class="img " src="<?= base_url('images/home/u0.png')?>"/>
        <div id="u1" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u2" class="ax_image">
        <img id="u2_img" class="img " src="<?= base_url('images/home/u5.png')?>"/>
        <div id="u3" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u5" class="ax_image">
        <img id="u5_img" class="img " src="<?= base_url('images/home/u3.png')?>"/>
        <div id="u6" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u7" class="ax_形状">
        <img id="u7_img" class="img " src="<?= base_url('images/teambuild/u16.png')?>"/>
        <div id="u8" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u9" class="ax_形状">
        <img id="u9_img" class="img " src="<?= base_url('images/teambuild/u18.png')?>"/>
        <div id="u10" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u11" class="ax_形状">
        <img id="u11_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u12" class="text">
          <p><span>&nbsp; &nbsp; </span><span>新建项目</span></p>
        </div>
      </div>

      <div id="u13" class="ax_形状">
        <img id="u13_img" class="img " src="<?= base_url('images/research/u24.png')?>"/>
        <div id="u14" class="text">
          <p><span>&nbsp; &nbsp; </span><span>已有项目</span></p>
        </div>
      </div>

      <div id="u23" class="ax_image">
        <img id="u23_img" class="img " src="<?= base_url('images/news_1/u19.png')?>"/>
        <div id="u24" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u25" class="ax_image">
        <img id="u25_img" class="img " src="<?= base_url('images/home/u7.png')?>"/>
        <div id="u26" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u27" class="ax_image">
        <img id="u27_img" class="img " src="<?= base_url('images/home/u9.png')?>"/>
        <div id="u28" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u29" class="ax_image">
        <img id="u29_img" class="img " src="<?= base_url('images/home/u11.png')?>"/>
        <div id="u30" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u31" class="ax_image">
        <img id="u31_img" class="img " src="<?= base_url('images/home/u13.png')?>"/>
        <div id="u32" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u33" class="ax_image">
        <img id="u33_img" class="img " src="<?= base_url('images/home/u15.png')?>"/>
        <div id="u34" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u35" class="ax_image">
        <img id="u35_img" class="img " src="<?= base_url('images/home/u17.png')?>"/>
        <div id="u36" class="text">
          <p><span></span></p>
        </div>
      </div>

      <div id="u17" class="ax_h1">
        <img id="u17_img" class="img " src="<?= base_url('resources/images/transparent.gif')?>  "/>
        <div id="u18" class="text">
          <p><span>项目名称</span></p>
        </div>
      </div>

      <div id="u19" class="ax_文本框_单行_">
        <input id="u19_input" type="text" value=""/>
      </div>

      <div id="u20" class="ax_h1">
        <img id="u20_img" class="img " src="<?= base_url('resources/images/transparent.gif')?>  "/>
        <div id="u21" class="text">
          <p><span>项目简介</span></p>
        </div>
      </div>

      <div id="u22" class="ax_文本框_多行_">
        <textarea id="u22_input"></textarea>
      </div>
      <div id="u42" class="ax_h1">
        <img id="u42_img" class="img " src="<?= base_url('resources/images/transparent.gif')?>	"/>
        <div id="u43" class="text">
          <p><span>项目</span><span>内容</span></p>
        </div>
      </div>

      <div id="u44" class="ax_文本框_多行_">
       <script id="editor" type="text/plain"></script>
      </div>
      <div id="u15" class="ax_html__">
        <input id="u15_input" type="submit" value="新建项目" onclick="uptext()" />
      </div>
      <script type="text/javascript">
    var ue = UE.getEditor('editor', {
        toolbars: [['fullscreen', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset',
            'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
            'simpleupload', 'insertimage', 'emotion', 'insertvideo','background', '|',
            'horizontal', 'date', 'time', 'snapscreen', '|',
            'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
            'searchreplace', 'drafts']],
        //focus时自动清空初始化时的内容
        autoClearinitialContent: false,
        //关闭字数统计
        wordCount: false,
        overflow:scroll, 
        //关闭elementPath
        elementPathEnabled: false,
        //默认的编辑区域高度
        initialFrameHeight:300,
        initialFrameWidth:800,
        scaleEnabled:true,
        textarea: 'projects_content'
        //更多其他参数，请参考ueditor.config.js中的配置项
    });
    ue.render();
    function uptext() {
      if($("#u19_input").val()==""){
        alert('项目名称不能为空！');
      }else if($("#u22_input").val()==""){
        alert('项目简介不能为空！');
      }else if(UE.getEditor('editor').getContent()==""){
        alert('项目内容不能为空！');
      }else if($("#u19_input").val().length>300){
        alert('项目简介不能超过300字');
      }else{
         $
        .ajax({
          type : "post",
          async : false,
          dataType : "json", //收受数据格式
          data:{'projects_title':$("#u19_input").val(),'projects_content':UE.getEditor('editor').getContent(),'projects_summary':$("#u22_input").val()},
          url : "<?= site_url("research/create_post/") ?>",
          cache : false,
          success : function(data) {
            alert('新建项目成功！');
            document.getElementById("u19_input").value="";
            document.getElementById("u22_input").value="";
            UE.getEditor('editor').setContent("");
           }
        });
      }
    }
</script>

    </div>
  </body>
</html>
<script type="text/javascript">
    $axure.loadCurrentPage(
(function() {
    var _ = function() { var r={},a=arguments; for(var i=0; i<a.length; i+=2) r[a[i]]=a[i+1]; return r; }
    var _creator = function() { return _(b,c,d,e,f,g,h,[i],j,_(k,l,m,n,o,p,q,_(),r,_(s,t,u,v,w,_(x,y,z,A),B,null,C,v,D,v,E,F,G,null,H,I,J,K,L,M,N,I),O,_(),P,_(),Q,_(R,[_(S,T,U,V,m,W,X,W,Y,Z,r,_(w,_(x,y,z,ba),bb,_(bc,bd,be,bf)),O,_(),R,[_(S,bg,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(w,_(x,y,z,ba),bb,_(bc,bd,be,bf)),O,_())],bk,_(bl,bm)),_(S,bn,U,V,m,bo,X,bo,Y,Z,r,_(bp,_(bq,br,bs,bt),bb,_(bc,bu,be,bv)),O,_(),R,[_(S,bw,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(bp,_(bq,br,bs,bt),bb,_(bc,bu,be,bv)),O,_())],P,_(bx,_(by,bz,bA,[_(by,bB,bC,g,bD,[_(bE,bF,by,bG,bH,_(bI,j,b,bJ,bK,Z),bL,bM)])])),bN,Z,bk,_(bl,bO)),_(S,bP,U,V,m,bQ,X,bQ,Y,Z,r,_(),O,_(),bR,bS),_(S,bT,U,V,m,W,X,W,Y,Z,r,_(w,_(x,y,z,bU),bp,_(bq,bV,bs,bf),bb,_(bc,bW,be,bX),bY,_(x,y,z,bZ)),O,_(),R,[_(S,ca,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(w,_(x,y,z,bU),bp,_(bq,bV,bs,bf),bb,_(bc,bW,be,bX),bY,_(x,y,z,bZ)),O,_())],bk,_(bl,cb)),_(S,cc,U,V,m,W,X,W,Y,Z,r,_(w,_(x,y,z,cd),bp,_(bq,bW,bs,bf),bb,_(bc,ce,be,bX)),O,_(),R,[_(S,cf,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(w,_(x,y,z,cd),bp,_(bq,bW,bs,bf),bb,_(bc,ce,be,bX)),O,_())],bk,_(bl,cg)),_(S,ch,U,V,m,W,X,W,Y,Z,r,_(L,ci,cj,ck,cl,cm,cn,_(x,y,z,co,cp,cq),cr,_(cs,_(w,_(x,y,z,ct)),cu,_(w,_(x,y,z,ct))),bp,_(bq,bV,bs,bf),bb,_(bc,bW,be,cv),bY,_(x,y,z,bZ)),O,_(),R,[_(S,cw,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(L,ci,cj,ck,cl,cm,cn,_(x,y,z,co,cp,cq),cr,_(cs,_(w,_(x,y,z,ct)),cu,_(w,_(x,y,z,ct))),bp,_(bq,bV,bs,bf),bb,_(bc,bW,be,cv),bY,_(x,y,z,bZ)),O,_())],P,_(bx,_(by,bz,bA,[_(by,bB,bC,g,bD,[_(bE,bF,by,cx,bH,_(bI,j,b,c,bK,Z),bL,bM)])])),bN,Z,bk,_(bl,cy,cz,cA,cB,cA)),_(S,cC,U,V,m,W,X,W,Y,Z,r,_(L,ci,cj,ck,cl,cm,cn,_(x,y,z,co,cp,cq),cr,_(cs,_(w,_(x,y,z,ct)),cu,_(w,_(x,y,z,ct))),bp,_(bq,bV,bs,cD),bb,_(bc,bW,be,cv),bY,_(x,y,z,bZ)),O,_(),R,[_(S,cE,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(L,ci,cj,ck,cl,cm,cn,_(x,y,z,co,cp,cq),cr,_(cs,_(w,_(x,y,z,ct)),cu,_(w,_(x,y,z,ct))),bp,_(bq,bV,bs,cD),bb,_(bc,bW,be,cv),bY,_(x,y,z,bZ)),O,_())],P,_(bx,_(by,bz,bA,[_(by,bB,bC,g,bD,[_(bE,bF,by,cF,bH,_(bI,j,b,cG,bK,Z),bL,bM)])])),bN,Z,bk,_(bl,cy,cz,cA,cB,cA)),_(S,cH,U,V,m,cI,X,cI,Y,Z,r,_(bp,_(bq,cJ,bs,cK),bb,_(bc,cL,be,cM)),O,_()),_(S,cN,U,V,m,cI,X,cI,Y,Z,r,_(bp,_(bq,cO,bs,cK),bb,_(bc,cL,be,cM)),O,_()),_(S,cP,U,V,m,W,X,cQ,Y,Z,r,_(L,ci,cj,cR,bp,_(bq,cS,bs,cT),bb,_(bc,cU,be,cV)),O,_(),R,[_(S,cW,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(L,ci,cj,cR,bp,_(bq,cS,bs,cT),bb,_(bc,cU,be,cV)),O,_())],bk,_(bl,cX)),_(S,cY,U,V,m,cZ,X,cZ,Y,Z,r,_(bp,_(bq,cS,bs,da),bb,_(bc,db,be,dc)),O,_()),_(S,dd,U,V,m,W,X,cQ,Y,Z,r,_(L,ci,cj,cR,bp,_(bq,cS,bs,de),bb,_(bc,cU,be,cV)),O,_(),R,[_(S,df,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(L,ci,cj,cR,bp,_(bq,cS,bs,de),bb,_(bc,cU,be,cV)),O,_())],bk,_(bl,cX)),_(S,dg,U,V,m,dh,X,dh,Y,Z,r,_(L,ci,cj,di,bp,_(bq,cS,bs,cS),bb,_(bc,dj,be,dk)),O,_()),_(S,dl,U,V,m,bo,X,bo,Y,Z,r,_(bp,_(bq,dm,bs,dn),bb,_(bc,dp,be,dp)),O,_(),R,[_(S,dq,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(bp,_(bq,dm,bs,dn),bb,_(bc,dp,be,dp)),O,_())],bk,_(bl,dr)),_(S,ds,U,V,m,bo,X,bo,Y,Z,r,_(cr,_(cs,_()),bp,_(bq,dt,bs,bV),bb,_(bc,du,be,bf)),O,_(),R,[_(S,dv,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(cr,_(cs,_()),bp,_(bq,dt,bs,bV),bb,_(bc,du,be,bf)),O,_())],P,_(bx,_(by,bz,bA,[_(by,bB,bC,g,bD,[_(bE,bF,by,dw,bH,_(bI,j,b,dx,bK,Z),bL,bM)])])),bN,Z,bk,_(bl,dy,cz,dz)),_(S,dA,U,V,m,bo,X,bo,Y,Z,r,_(cr,_(cs,_()),bp,_(bq,dB,bs,bV),bb,_(bc,du,be,bf)),O,_(),R,[_(S,dC,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(cr,_(cs,_()),bp,_(bq,dB,bs,bV),bb,_(bc,du,be,bf)),O,_())],P,_(bx,_(by,bz,bA,[_(by,bB,bC,g,bD,[_(bE,bF,by,dD,bH,_(bI,j,b,dE,bK,Z),bL,bM)])])),bN,Z,bk,_(bl,dF,cz,dG)),_(S,dH,U,V,m,bo,X,bo,Y,Z,r,_(cr,_(cs,_()),bp,_(bq,dI,bs,bV),bb,_(bc,du,be,bf)),O,_(),R,[_(S,dJ,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(cr,_(cs,_()),bp,_(bq,dI,bs,bV),bb,_(bc,du,be,bf)),O,_())],P,_(bx,_(by,bz,bA,[_(by,bB,bC,g,bD,[_(bE,bF,by,dK,bH,_(bI,j,b,dL,bK,Z),bL,bM)])])),bN,Z,bk,_(bl,dM,cz,dN)),_(S,dO,U,V,m,bo,X,bo,Y,Z,r,_(cr,_(cs,_()),bp,_(bq,dP,bs,bV),bb,_(bc,dQ,be,bf)),O,_(),R,[_(S,dR,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(cr,_(cs,_()),bp,_(bq,dP,bs,bV),bb,_(bc,dQ,be,bf)),O,_())],P,_(bx,_(by,bz,bA,[_(by,bB,bC,g,bD,[_(bE,bF,by,dS,bH,_(bI,j,b,dT,bK,Z),bL,bM)])])),bN,Z,bk,_(bl,dU,cz,dV)),_(S,dW,U,V,m,bo,X,bo,Y,Z,r,_(cr,_(cs,_()),bp,_(bq,dX,bs,bV),bb,_(bc,dQ,be,bf)),O,_(),R,[_(S,dY,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(cr,_(cs,_()),bp,_(bq,dX,bs,bV),bb,_(bc,dQ,be,bf)),O,_())],P,_(bx,_(by,bz,bA,[_(by,bB,bC,g,bD,[_(bE,bF,by,dZ,bH,_(bI,j,b,ea,bK,Z),bL,bM)])])),bN,Z,bk,_(bl,eb,cz,ec)),_(S,ed,U,V,m,bo,X,bo,Y,Z,r,_(cr,_(cs,_()),bp,_(bq,ee,bs,bV),bb,_(bc,dQ,be,bf)),O,_(),R,[_(S,ef,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(cr,_(cs,_()),bp,_(bq,ee,bs,bV),bb,_(bc,dQ,be,bf)),O,_())],P,_(bx,_(by,bz,bA,[_(by,bB,bC,g,bD,[_(bE,bF,by,eg,bH,_(bI,j,b,eh,bK,Z),bL,bM)])])),bN,Z,bk,_(bl,ei,cz,ej)),_(S,ek,U,V,m,W,X,cQ,Y,Z,r,_(L,ci,cj,cR,bp,_(bq,cS,bs,el),bb,_(bc,em,be,cV)),O,_(),R,[_(S,en,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(L,ci,cj,cR,bp,_(bq,cS,bs,el),bb,_(bc,em,be,cV)),O,_())],bk,_(bl,cX)),_(S,eo,U,V,m,cZ,X,cZ,Y,Z,r,_(bp,_(bq,cS,bs,ep),bb,_(bc,dp,be,dc)),O,_()),_(S,eq,U,V,m,cI,X,cI,Y,Z,r,_(L,er,cj,di,es,et,bp,_(bq,eu,bs,ep),bb,_(bc,cL,be,dc)),O,_()),_(S,ev,U,V,m,cI,X,cI,Y,Z,r,_(L,er,cj,di,es,et,bp,_(bq,ew,bs,ep),bb,_(bc,cL,be,dc)),O,_()),_(S,ex,U,V,m,W,X,cQ,Y,Z,r,_(L,ci,cj,cR,bp,_(bq,cS,bs,ey),bb,_(bc,cU,be,cV)),O,_(),R,[_(S,ez,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(L,ci,cj,cR,bp,_(bq,cS,bs,ey),bb,_(bc,cU,be,cV)),O,_())],bk,_(bl,cX)),_(S,eA,U,V,m,dh,X,dh,Y,Z,r,_(L,eB,cj,di,es,eC,bp,_(bq,cS,bs,eD),bb,_(bc,dj,be,eE)),O,_())])),eF,_(eG,_(k,eG,m,eH,o,eI,q,_(),r,_(s,t,u,v,w,_(x,y,z,A),B,null,C,v,D,v,E,F,G,null,H,I,J,K,L,M,N,I),O,_(),P,_(),Q,_(R,[_(S,eJ,U,V,m,bo,X,bo,Y,Z,r,_(bp,_(bq,eK,bs,eL),bb,_(bc,cL,be,cL)),O,_(),R,[_(S,eM,U,V,bh,Z,m,bi,X,bj,Y,Z,r,_(bp,_(bq,eK,bs,eL),bb,_(bc,cL,be,cL)),O,_())],P,_(bx,_(by,bz,bA,[_(by,bB,bC,g,bD,[_(bE,bF,by,bG,bH,_(bI,j,b,bJ,bK,Z),bL,bM)])])),bN,Z,bk,_(bl,eN))]))),eO,_(eP,_(eQ,eR),eS,_(eQ,eT),eU,_(eQ,eV),eW,_(eQ,eX),eY,_(eQ,eZ,fa,_(eQ,fb),fc,_(eQ,fd)),fe,_(eQ,ff),fg,_(eQ,fh),fi,_(eQ,fj),fk,_(eQ,fl),fm,_(eQ,fn),fo,_(eQ,fp),fq,_(eQ,fr),fs,_(eQ,ft),fu,_(eQ,fv),fw,_(eQ,fx),fy,_(eQ,fz),fA,_(eQ,fB),fC,_(eQ,fD),fE,_(eQ,fF),fG,_(eQ,fH),fI,_(eQ,fJ),fK,_(eQ,fL),fM,_(eQ,fN),fO,_(eQ,fP),fQ,_(eQ,fR),fS,_(eQ,fT),fU,_(eQ,fV),fW,_(eQ,fX),fY,_(eQ,fZ),ga,_(eQ,gb),gc,_(eQ,gd),ge,_(eQ,gf),gg,_(eQ,gh),gi,_(eQ,gj),gk,_(eQ,gl),gm,_(eQ,gn),go,_(eQ,gp),gq,_(eQ,gr),gs,_(eQ,gt),gu,_(eQ,gv),gw,_(eQ,gx),gy,_(eQ,gz),gA,_(eQ,gB)));}; 
var b="url",c="addnewitem",d="generationDate",e=new Date(1473686786900.66),f="isCanvasEnabled",g=false,h="variables",i="OnLoadVariable",j="page",k="packageId",l="51f652b10151429d8a9005f917127a1f",m="type",n="Axure:Page",o="name",p="AddNewItem",q="notes",r="style",s="baseStyle",t="627587b6038d43cca051c114ac41ad32",u="pageAlignment",v="near",w="fill",x="fillType",y="solid",z="color",A=0xFFFFFFFF,B="image",C="imageHorizontalAlignment",D="imageVerticalAlignment",E="imageRepeat",F="auto",G="favicon",H="sketchFactor",I="0",J="colorStyle",K="appliedColor",L="fontName",M="Applied Font",N="borderWidth",O="adaptiveStyles",P="interactionMap",Q="diagram",R="objects",S="id",T="64b2f5a26e1541a0aa93c691ae0f6db6",U="label",V="",W="buttonShape",X="styleType",Y="visible",Z=true,ba=0xFF1C1C1C,bb="size",bc="width",bd=1280,be="height",bf=155,bg="943f5f94ab744afa9acdf3c2f43f9ded",bh="isContained",bi="richTextPanel",bj="paragraph",bk="images",bl="normal~",bm="<?= base_url('images/home/u0.png')?>",bn="73c107f6ff854ebe9ad735d0eeae024b",bo="imageBox",bp="location",bq="x",br=149,bs="y",bt=42,bu=252,bv=83,bw="156a7744b7184c3484a4d0ffc59dda41",bx="onClick",by="description",bz="OnClick",bA="cases",bB="用例 1",bC="isNewIfGroup",bD="actions",bE="action",bF="linkWindow",bG="在 当前窗口 打开 Home",bH="target",bI="targetType",bJ="<?= site_url('home')?>",bK="includeVariables",bL="linkType",bM="current",bN="tabbable",bO="<?= base_url('images/home/u5.png')?>",bP="891cebaa8c894871bc17a0fb5a7110da",bQ="referenceDiagramObject",bR="masterId",bS="32f7970ad85b4334b69447759f49bd3d",bT="9c78170e36264c63bdc91cd1d8530b06",bU=0xFFF2F2F2,bV=0,bW=319,bX=1000,bY="borderFill",bZ=0xFFFFFF,ca="29d793905435468e800b904dc1a5e8c8",cb="<?= base_url('images/teambuild/u16.png')?>",cc="e2152dd1fd3c4ac595df4993f6a24db8",cd=0xFF999999,ce=961,cf="7eff5139cf974e81b0da4844353e1e6e",cg="<?= base_url('images/teambuild/u18.png')?>",ch="a3a103bf2fb04da3a773fab1c36db411",ci="'微软雅黑 Regular', '微软雅黑'",cj="fontSize",ck="26px",cl="horizontalAlignment",cm="left",cn="foreGroundFill",co=0xFF666666,cp="opacity",cq=1,cr="stateStyles",cs="mouseOver",ct=0xFFFFCC00,cu="mouseDown",cv=53,cw="d707df4f72c649bfb6e8b3b6e394bf41",cx="在 当前窗口 打开 AddNewItem",cy="<?= base_url('images/research/u24.png')?>",cz="mouseOver~",cA="<?= base_url('images/research/u24_mouseOver.png')?>",cB="mouseDown~",cC="5d4c8bebf6df45cf8b0c6f19c7550ff4",cD=208,cE="93650d9bf0c84030baacee687ac62f66",cF="在 当前窗口 打开 DeleteItem",cG="deleteitem",cH="8901995b4ff24ca2af6122267331308e",cI="button",cJ=680,cK=1018,cL=100,cM=25,cN="cb793681f8fd43dd90da0f5a6c6ca9f8",cO=807,cP="a853fce208834324b0fa4b7c31dfb45c",cQ="h1",cR="36px",cS=400,cT=216,cU=145,cV=46,cW="32c3d7c16ad746bbb28c2144b0742ea6",cX="<?= base_url('resources/images/transparent.gif')?>  ",cY="a80f27faab044e3a94dccfab3ff93759",cZ="textBox",da=272,db=500,dc=40,dd="edf2115079004415a76cf8adb83aa760",de=334,df="bf25b2905a144af78b551269f556a124",dg="6a56fd6d362b48768fe4cbb6f19a3bbd",dh="textArea",di="20px",dj=800,dk=120,dl="525ab3f39b1a4435a6efa2c8c397d869",dm=10,dn=855,dp=300,dq="de9100d56035433185d629e80f99e691",dr="<?= base_url('images/news_1/u19.png')?>",ds="aac456fe32354fd598637fafe2a5ab8e",dt=642,du=86,dv="aee9fc3b48124c5b8a01968d14f7fc5b",dw="在 当前窗口 打开 Home_admin",dx="<?= site_url('home/home_admin')?>",dy="<?= base_url('images/home/u7.png')?>",dz="<?= base_url('images/home/u7_mouseOver.png')?>",dA="c0ca3dc79348450f9e4e3b209474631b",dB=728,dC="8850eac4748a450aba72afc8df660d92",dD="在 当前窗口 打开 Intro_admin",dE="<?= site_url('intro/intro_admin')?>",dF="<?= base_url('images/home/u9.png')?>",dG="<?= base_url('images/home/u9_mouseOver.png')?>",dH="268f8cfffce34f4c8bfe5f017c178823",dI=814,dJ="f1a5442fffd24f57bf0abf44fb00f51a",dK="在 当前窗口 打开 Members_admin",dL="<?= site_url('members/members_admin')?>",dM="<?= base_url('images/home/u11.png')?>",dN="<?= base_url('images/home/u11_mouseOver.png')?>",dO="ec14845e54a84bd39e5d79fefe30719b",dP=900,dQ=122,dR="d0255f47a340455db28f49b9386bcb7e",dS="在 当前窗口 打开 Research_admin",dT="research_admin",dU="<?= base_url('images/home/u13.png')?>",dV="<?= base_url('images/home/u13_mouseOver.png')?>",dW="6c1c1e2dabfa46998406e6350e125e9b",dX=1022,dY="c61f176c707144569a105309271e13db",dZ="在 当前窗口 打开 TeamBuild_admin",ea="<?= site_url('teambuild/teambuild_admin')?>",eb="<?= base_url('images/home/u15.png')?>",ec="<?= base_url('images/home/u15_mouseOver.png')?>",ed="3c950d5fb7ea40e4830ce34e75ada478",ee=1144,ef="838cb2df211245329714c258c52c3cc3",eg="在 当前窗口 打开 Contact_admin",eh="<?= site_url('contact/contact_admin')?>",ei="<?= base_url('images/home/u17.png')?>",ej="<?= base_url('images/home/u17_mouseOver.png')?>",ek="88bce8c7e49648e1b56a8ef81a9fa14b",el=532,em=234,en="2bd45335b9ec40a09580f8d6f2a97278",eo="792d97bd99174a8ea14d682c6f35a3ab",ep=593,eq="0f944c694c4740e8b52a84b11c1ca1fe",er="'微软雅黑 Bold', '微软雅黑'",es="fontWeight",et="700",eu=727,ev="3ce331de31674f659416a937232f96df",ew=858,ex="851800ffbf484201a802051def7dd30a",ey=682,ez="c57439e6bdee4451865afe9387fced70",eA="b92d029d26bd46d7b80d3a502f89967a",eB="'微软雅黑 Light', '微软雅黑'",eC="290",eD=741,eE=239,eF="masters",eG="32f7970ad85b4334b69447759f49bd3d",eH="Axure:Master",eI="Logo",eJ="22ae6236e0e54ee9adfd857df0bef3b9",eK=44,eL=29,eM="2826e5e49b54408b8c73f6482c93e3fe",eN="<?= base_url('images/home/u3.png')?>",eO="objectPaths",eP="64b2f5a26e1541a0aa93c691ae0f6db6",eQ="scriptId",eR="u0",eS="943f5f94ab744afa9acdf3c2f43f9ded",eT="u1",eU="73c107f6ff854ebe9ad735d0eeae024b",eV="u2",eW="156a7744b7184c3484a4d0ffc59dda41",eX="u3",eY="891cebaa8c894871bc17a0fb5a7110da",eZ="u4",fa="22ae6236e0e54ee9adfd857df0bef3b9",fb="u5",fc="2826e5e49b54408b8c73f6482c93e3fe",fd="u6",fe="9c78170e36264c63bdc91cd1d8530b06",ff="u7",fg="29d793905435468e800b904dc1a5e8c8",fh="u8",fi="e2152dd1fd3c4ac595df4993f6a24db8",fj="u9",fk="7eff5139cf974e81b0da4844353e1e6e",fl="u10",fm="a3a103bf2fb04da3a773fab1c36db411",fn="u11",fo="d707df4f72c649bfb6e8b3b6e394bf41",fp="u12",fq="5d4c8bebf6df45cf8b0c6f19c7550ff4",fr="u13",fs="93650d9bf0c84030baacee687ac62f66",ft="u14",fu="8901995b4ff24ca2af6122267331308e",fv="u15",fw="cb793681f8fd43dd90da0f5a6c6ca9f8",fx="u16",fy="a853fce208834324b0fa4b7c31dfb45c",fz="u17",fA="32c3d7c16ad746bbb28c2144b0742ea6",fB="u18",fC="a80f27faab044e3a94dccfab3ff93759",fD="u19",fE="edf2115079004415a76cf8adb83aa760",fF="u20",fG="bf25b2905a144af78b551269f556a124",fH="u21",fI="6a56fd6d362b48768fe4cbb6f19a3bbd",fJ="u22",fK="525ab3f39b1a4435a6efa2c8c397d869",fL="u23",fM="de9100d56035433185d629e80f99e691",fN="u24",fO="aac456fe32354fd598637fafe2a5ab8e",fP="u25",fQ="aee9fc3b48124c5b8a01968d14f7fc5b",fR="u26",fS="c0ca3dc79348450f9e4e3b209474631b",fT="u27",fU="8850eac4748a450aba72afc8df660d92",fV="u28",fW="268f8cfffce34f4c8bfe5f017c178823",fX="u29",fY="f1a5442fffd24f57bf0abf44fb00f51a",fZ="u30",ga="ec14845e54a84bd39e5d79fefe30719b",gb="u31",gc="d0255f47a340455db28f49b9386bcb7e",gd="u32",ge="6c1c1e2dabfa46998406e6350e125e9b",gf="u33",gg="c61f176c707144569a105309271e13db",gh="u34",gi="3c950d5fb7ea40e4830ce34e75ada478",gj="u35",gk="838cb2df211245329714c258c52c3cc3",gl="u36",gm="88bce8c7e49648e1b56a8ef81a9fa14b",gn="u37",go="2bd45335b9ec40a09580f8d6f2a97278",gp="u38",gq="792d97bd99174a8ea14d682c6f35a3ab",gr="u39",gs="0f944c694c4740e8b52a84b11c1ca1fe",gt="u40",gu="3ce331de31674f659416a937232f96df",gv="u41",gw="851800ffbf484201a802051def7dd30a",gx="u42",gy="c57439e6bdee4451865afe9387fced70",gz="u43",gA="b92d029d26bd46d7b80d3a502f89967a",gB="u44";
return _creator();
})());
    </script>

