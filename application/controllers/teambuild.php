<?php
define('MAXSIZE', '32');
class TeamBuild extends CI_Controller
{
    /**
     *构造函数
     */
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('teambuild_model','teambuild');
        $this->load->model('teambuild_photo_model','teambuild_photo');
    }

    /*load->view--------------------START------------------*/
    /**
     *前台默认页面
     */
    public function index(){
        $teambuild_id=$this->teambuild->get_top_id();
         $data['type']=1;
        if(count($teambuild_id)!=0){       
            $data['teambuild']=$this->teambuild->get_by_id($teambuild_id[0]['id'])[0];
        }
        $data['teambuild_list']=$this->teambuild->get_all_teambuild();
        $this->load->view('templates/header');
        $this->load->view('templates/index_header');
        $this->load->view('teambuild/teambuild',$data);
    }

    /**
     *团队建设页面
     */
    public function teambuild_detail(){
        $id = $this->uri->segment(3, 0);
        $data['type']=1;
        $data['teambuild']=$this->teambuild->get_by_id($id)[0];
        $data['teambuild_list']=$this->teambuild->get_all_teambuild();
        $this->load->view('templates/header');
        $this->load->view('templates/index_header');
        $this->load->view('teambuild/teambuild',$data);
    }
    /**
     *团队建设往期照片页面
     */
    public function show_teambuild_photo(){
        $data['type']=0;
        $data['teambuild_list']=$this->teambuild->get_all_teambuild();
        $data['teambuild_photo']=$this->teambuild_photo->get_all_teambuild_photo();
        $this->load->view('templates/header');
        $this->load->view('templates/index_header');
        $this->load->view('teambuild/teambuild',$data);
    }

    /**
     *teambuild后台默认初始化页面
     */
    public function teambuild_admin(){
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('teambuild/teambuild_admin');
    }

    public function addnewitem(){
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('teambuild/addnewitem');
    }

    /**
     *团队建设管理页面
     */
    public function manageteambuild(){
        $data['teambuild']=$this->teambuild->get_all_teambuild();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('teambuild/manageteambuild',$data);
    }

    /**
     *团队建设往期照片页面
     */
    public function teambuild_photo(){
        $data['teambuild_photo']=$this->teambuild_photo->get_all_teambuild_photo();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('teambuild/teambuild_photo',$data);
    }
    /*load->view--------------------END------------------*/

    /**
     *增加团队建设
     */
    public function create_post(){
                /*获取未插入前第一个正在进行的项目id*/
        $down_id=$this->teambuild->get_top_id();
        /*判断是否存在正在进行的项目*/
        $_POST['up_id']=-1;
        if(count($down_id)==0){
            $_POST['down_id']=-2;
        }else{
            $_POST['down_id']=$down_id[0]['id'];
        }
        /*插入新的项目*/
        $this->teambuild->insert($_POST);
        $insert_id=$this->db->insert_id();
        if(count($down_id)!=0){
            $data=$this->teambuild->get_by_id($_POST['down_id'])[0];
            $data['up_id']=$insert_id;
            $this->teambuild->update($data);
        }
    }

    /**
     *修改团队建设
     */
    public function update_teambuild(){
        $this->teambuild->update($_POST);
        $result=$this->teambuild->get_all_teambuild();
        echo json_encode($result);
    }

    public function get_teambuild_detail(){
        $result=$this->teambuild->get_by_id($_POST['id']);
        echo json_encode($result);
    }

    /**
     *删除团队建设
     */
    public function delete_teambuild(){
        $this->teambuild->delete_teambuild($_POST['id']);
    }

    /**
     *向上调整团队建设位置
     */
     public function up_teambuild(){
        $this->teambuild->up_teambuild($_POST['id']);
        $result=$this->teambuild->get_all_teambuild();
        echo json_encode($result);
    }

    /**
     *向下调整团队建设位置
     */
    public function down_teambuild(){
        $this->teambuild->down_teambuild($_POST['id']);
        $result=$this->teambuild->get_all_teambuild();
        echo json_encode($result);
    }

    public function add_teambuild_photo(){
        if(count($this->teambuild_photo->get_by_pic_name($_FILES["pic_name"]["name"]))>0){
            echo "<script>alert('已存在同名图片,添加往期照片失败！')</script>";
            $this->teambuild_photo();
        }
        else if (($_FILES["pic_name"]["size"] < MAXSIZE*1024*1024)){
            if ($_FILES["pic_name"]["error"] > 0){
                show_error($_FILES["pic_name"]["error"]);
            }else{
                $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/teambuild_photo/";
                if (!is_dir($save_dir)){ 
                    mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
                }
                $save_path=iconv("UTF-8", "GBK", $save_dir.$_FILES["pic_name"]["name"]);         
                $if_success=move_uploaded_file($_FILES["pic_name"]["tmp_name"],$save_path);
                $_POST['pic_name']=$_FILES["pic_name"]["name"];       
                $this->teambuild_photo->insert($_POST);
                echo "<script>alert('添加往期照片成功！')</script>";
                $this->teambuild_photo();
            }
        }else{
            $file_size=$_FILES["new_pic"]["size"]/1024/1024;
            echo "<script>alert('图片大小超过".MAXSIZE."M,当前大小为:".$file_size."M')</script>";
            $this->wheel_pic();
        }
    }
    public function get_teambuild_photo_detail(){
        $result=$this->teambuild_photo->get_by_id($_POST['id']);
        echo json_encode($result);
    }
    /**
     *删除往期照片
     */
     public function delete_teambuild_photo(){
          $this->teambuild_photo->delete_teambuild_photo($_POST['id']);
    }
    /**
     *向上调整往期照片位置
     */
     public function up_teambuild_photo(){
        $this->teambuild_photo->up_teambuild_photo($_POST['id']);
    }
    /**
     *向下调整往期照片位置
     */
     public function down_teambuild_photo(){
        $this->teambuild_photo->down_teambuild_photo($_POST['id']);
    }
}