<?php
class Research extends CI_Controller
{
    /**
     *构造函数
     */
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('projects_model','projects');
    }

    /*load->view--------------------START------------------*/
    /**
     *前台默认页面
     */
    public function index(){
        $first_id=$this->projects->get_top_id(0);
        if(count($first_id)==0){
            $first_id=$this->projects->get_top_id(1);
        }
        if(count($first_id)!=0){
            $data['projects']=$this->projects->get_by_id($first_id[0]['id'])[0];
            $data['pic1']=$this->projects->get_pic($first_id[0]['id'],1);
            $data['vid']=$this->projects->get_pic($first_id[0]['id'],0);
            $data['pic2']=$this->projects->get_pic($first_id[0]['id'],2);
        }
        $data['u_projects']=$this->projects->get_all_u_projects();
        $data['f_projects']=$this->projects->get_all_f_projects();
        $this->load->view('templates/header');
        $this->load->view('templates/index_header');
        $this->load->view('research/newresearch',$data);
    }

    /**
     *research后台默认初始化页面
     */
    public function research_admin(){
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('research/research_admin');
    }

    /**
     *projects详情页面
     */
    public function projects_detail(){
        $projects_id = $this->uri->segment(3, 0);
        if($projects_id=="0")$this->index();
        else{
            $data['projects']=$this->projects->get_by_id($projects_id)[0];
            $data['u_projects']=$this->projects->get_all_u_projects();
            $data['f_projects']=$this->projects->get_all_f_projects();
            $data['projects']=$this->projects->get_by_id($projects_id)[0];
            $data['pic1']=$this->projects->get_pic($projects_id,1);
            $data['pic2']=$this->projects->get_pic($projects_id,2);
            $data['vid']=$this->projects->get_pic($projects_id,0);
            $this->load->view('templates/header');
            $this->load->view('templates/index_header');
            $this->load->view('research/newresearch',$data);
        }
    }

    /**
     *增加新项目页面
     */
    public function addnewitem(){
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('research/newaddnewitem');
    }

    /**
     *管理项目页面
     */
    public function deleteitem(){
        $data['u_projects']=$this->projects->get_all_u_projects();
        $data['f_projects']=$this->projects->get_all_f_projects();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('research/deleteitem',$data);
    }

    public function edit_text(){
        $projects_id = $this->uri->segment(3, 0);
        $data['projects']=$this->projects->get_by_id($projects_id)[0];
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('research/edit_text',$data);
    }
    public function edit_pic(){
        $projects_id = $this->uri->segment(3, 0);
        $data['projects']=$this->projects->get_by_id($projects_id)[0];
        $data['media']=$this->projects->get_all_medias($projects_id);
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('research/edit_pic',$data);
    }
    public function edit_pic2($projects_id){
        $data['projects']=$this->projects->get_by_id($projects_id)[0];
        $data['media']=$this->projects->get_all_medias($projects_id);
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('research/edit_pic',$data);
    }
    /*load-view -------------------End--------------------*/
    
    /**
     *新建项目按钮触发事件
     */
    public function create_post(){
        $_POST['status']=0;
        $this->projects->insert($_POST);
    }

    /**
     *获取项目详情
     */
    public function get_projects_detail(){
        $result=$this->projects->get_by_id($_POST['id']);
        echo json_encode($result);
    }
    /**
     *删除项目
     */
    public function delete_projects(){
        $this->projects->delete_projects($_POST['id']);
    }
    /**
     *向上调整项目位置
     */
    public function up_projects(){
        $this->projects->up_projects($_POST['id']);
        $result[0]=$this->projects->get_all_u_projects();
        $result[1]=$this->projects->get_all_f_projects();
        echo json_encode($result);
    }
    /**
     *向下调整项目位置
     */
    public function down_projects(){
        $this->projects->down_projects($_POST['id']);
        $result[0]=$this->projects->get_all_u_projects();
        $result[1]=$this->projects->get_all_f_projects();
        echo json_encode($result);
    }

    /**
     *完成项目按钮触发事件
     */
    public function finish_projects(){
        $this->projects->finish_projects($_POST['id']);
        $result[0]=$this->projects->get_all_u_projects();
        $result[1]=$this->projects->get_all_f_projects();
        echo json_encode($result);
    }
        /**
     *完成项目按钮触发事件
     */
    public function update_projects(){
        $this->projects->update($_POST);
    }

    public function add_research(){
        $data['title']=$_POST['title'];
        $this->projects->insert($data);
        $insert_id=$this->db->insert_id();
        
        $count=$_FILES["pic_name1"]['name'][0];
        if($count!=""):
            $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/projects/".$insert_id."/";
            if (!is_dir($save_dir)){ 
                mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
            } 
            $count=count($_FILES["pic_name1"]['name']);           
            for($i=0;$i<$count;$i++):
                if ($_FILES["pic_name1"]["error"][$i] > 0){
                    show_error("上传图片出错，错误代码 ".$_FILES["pic_name1"]["error"][$i]);
                }else{
                    $file_name=$_FILES["pic_name1"]["name"][$i];
                    $file_name=strrchr($file_name,'.');
                    $file_name=time().'_'.rand().$file_name;
                    $save_path=iconv("UTF-8", "GBK", $save_dir.$file_name);         
                    $if_success=move_uploaded_file($_FILES["pic_name1"]["tmp_name"][$i],$save_path);
                    $pic['projects_id']=$insert_id;
                    $pic['pic_name']=$file_name;
                    $pic['old_pic_name']=$_FILES["pic_name1"]["name"][$i];
                    $pic['status']=1;
                    $this->projects->insert_pic($pic);
            }
            endfor;
        endif;
              
        $count=$_FILES["pic_name2"]['name'][0];
        if($count!=""):
            $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/projects/".$insert_id."/";
            if (!is_dir($save_dir)){ 
                mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
            } 
            $count=count($_FILES["pic_name2"]['name']);           
            for($i=0;$i<$count;$i++):
                if ($_FILES["pic_name2"]["error"][$i] > 0){
                    show_error("上传图片出错，错误代码 ".$_FILES["pic_name2"]["error"][$i]);
                }else{
                    $file_name=$_FILES["pic_name2"]["name"][$i];
                    $file_name=strrchr($file_name,'.');
                    $file_name=time().'_'.rand().$file_name;
                    $save_path=iconv("UTF-8", "GBK", $save_dir.$file_name);         
                    $if_success=move_uploaded_file($_FILES["pic_name2"]["tmp_name"][$i],$save_path);
                    $pic['projects_id']=$insert_id;
                    $pic['pic_name']=$file_name;
                    $pic['old_pic_name']=$_FILES["pic_name1"]["name"][$i];
                    $pic['status']=2;
                    $this->projects->insert_pic($pic);
                }
            endfor;
        endif;

        $count=$_FILES["vid_name"]['name'];
        if($count!=""):
            $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/projects/".$insert_id."/";
            if (!is_dir($save_dir)){ 
                mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
            } 
            if ($_FILES["vid_name"]["error"] > 0){
                show_error("上传视频出错，错误代码 ".$_FILES["vid_name"]["error"]);
            }else{
                $file_name=$_FILES["vid_name"]["name"];
                $file_name=strrchr($file_name,'.');
                $file_name=time().'_'.rand().$file_name;
                $save_path=iconv("UTF-8", "GBK", $save_dir.$file_name);         
                $if_success=move_uploaded_file($_FILES["vid_name"]["tmp_name"],$save_path);
                $pic['projects_id']=$insert_id;
                $pic['pic_name']=$file_name;
                $pic['old_pic_name']=$_FILES["vid_name"]["name"];
                $pic['status']=0;
                $this->projects->insert_pic($pic);
            }
        endif;

        unset($_POST['pic_name1']);
        unset($_POST['pic_name2']);      
        unset($_POST['vid_name']);
        
        /*获取未插入前第一个正在进行的项目id*/
        $down_id=$this->projects->get_top_id(0);
        /*判断是否存在正在进行的项目*/
        $_POST['up_id']=-1;
        $count=count($down_id);
        if(count($down_id)==0){
            $_POST['down_id']=-2;
        }else{
            $_POST['down_id']=$down_id[0]['id'];
        }
        /*插入新的项目*/
        $_POST['id']=$insert_id;
        $this->projects->update($_POST);
        
        if(count($down_id)!=0){
            $data=$this->projects->get_by_id($_POST['down_id'])[0];
            $data['up_id']=$insert_id;
            $this->projects->update($data);
        }

        echo "<script>alert('添加设备成功！')</script>";
        $this->addnewitem();
    }
    public function save_edit(){
        $this->projects->update($_POST);
        echo "<script>alert('保存修改成功！')</script>";
        $this->deleteitem();
    }
    public function delete_pic(){
        $this->projects->delete_pic($_POST['id']);
    }
    public function add_pic(){
        if($_POST['status']=='0'){
            $query=$this->projects->get_pic($_POST['id'],0);
            if(count($query)!=0){
                show_error('已存在Demo视频，不可再添加');
            }
        }
        if ($_FILES["pic_name"]["error"] > 0){
                show_error("上传视频出错，错误代码 ".$_FILES["pic_name"]["error"]);
        }else{
            $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/projects/".$_POST['id']."/";
            if (!is_dir($save_dir)){ 
                mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
            } 
            $file_name=$_FILES["pic_name"]["name"];
            $file_name=strrchr($file_name,'.');
            $file_name=time().'_'.rand().$file_name;
            $save_path=iconv("UTF-8", "GBK", $save_dir.$file_name);         
            $if_success=move_uploaded_file($_FILES["pic_name"]["tmp_name"],$save_path);
            $pic['projects_id']=$_POST['id'];
            $pic['pic_name']=$file_name;
            $pic['old_pic_name']=$_FILES["pic_name"]["name"];
            $pic['status']=$_POST['status'];
            $this->projects->insert_pic($pic);
            echo "<script>alert('添加图片/视频成功！')</script>";
            $this->edit_pic2($_POST['id']);
        }

    }
}