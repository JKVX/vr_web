<?php
define('MAXSIZE', '32');
class Intro extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('intro_model','intro');
        $this->load->model('workshops_model','workshops');
        $this->load->model('facilities_model','facilities');
        $this->load->model('techniques_model','techniques');
    }
    /*load->view--------------------START------------------*/
    
    /**
     *前台初始化页面
     */
    public function index(){
        $data['workshops']=$this->workshops->get_all_workshops();
        $data['lab_intro']=$this->intro->get_lab_intro();
        $data['facilities']=$this->facilities->get_show_facilities();
        $data['techniques']=$this->techniques->get_show_techniques();
        $this->load->view('templates/header');
        $this->load->view('templates/index_header');
        $this->load->view('intro/intro',$data);
    }
    
    /**
     *后台初始化页面
     */
    public function intro_admin(){
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('intro/intro_admin');
    }
    
    /**
     *简介页面
     */
    public function brief_intro(){
        $data['lab_intro']=$this->intro->get_lab_intro();
        $data['lab_slogan']=$this->intro->get_lab_slogan();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('intro/brief_intro',$data);
    }
    
    /**
     *现有设备页面
     */
    public function facilities(){
        $data['facilities']=$this->facilities->get_all_facilities();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('intro/facilities',$data);
    }
    
    /**
     *现有技术页面
     */
    public function techniques(){
        $data['techniques']=$this->techniques->get_all_techniques();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('intro/techniques',$data);
    }
    
    /**
     *工作坊页面
     */
    public function workshops(){
        $data['workshops']=$this->workshops->get_all_workshops();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('intro/workshops',$data);
    }

    /*load->view--------------------END------------------*/
    /*brief_intro函数--------------------START------------------*/
    /**
     *更新实验室信息
     */
    public function update_lab_intro(){
        $this->intro->update_lab_intro($_POST);
    }
    
    /**
     *获取实验室信息
     */
    public function get_lab_intro(){
        $query=$this->intro->get_lab_intro();
        echo json_encode($query);
    }
    /**
     *更新实验室标语
     */
    public function update_lab_slogan(){
        $this->intro->update_lab_slogan($_POST);
    }
    
    /**
     *获取实验室信息
     */
    public function get_lab_slogan(){
        $query=$this->intro->get_lab_slogan();
        echo json_encode($query);
    }
    /*brief_intro函数--------------------END------------------*/
    /*workshop函数--------------------START------------------*/
    /**
     *添加工作坊
     */
    public function create_post(){
        $down_id=$this->workshops->get_top_id();
        /*判断是否存在正在进行的项目*/
        $_POST['up_id']=-1;
        $count=count($down_id);
        if(count($down_id)==0){
            $_POST['down_id']=-2;
        }else{
            $_POST['down_id']=$down_id[0]['id'];
        }
        $this->workshops->insert($_POST);
        $insert_id=$this->db->insert_id();
        if(count($down_id)!=0){
            $data=$this->workshops->get_by_id($_POST['down_id'])[0];
            $data['up_id']=$insert_id;
            $this->workshops->update($data);
        }
        $result=$this->workshops->get_all_workshops();
        echo json_encode($result);
    }

    public function save_workshops(){
        $this->workshops->update($_POST);
        $result=$this->workshops->get_all_workshops();
        echo json_encode($result);
    }
    /**
     *删除工作坊
     */
    public function delete_workshops(){
        $this->workshops->delete_workshops($_POST['id']);
    }
    
    /**
     *获取工作坊
     */
    public function get_workshops_detail(){
        $result=$this->workshops->get_by_id($_POST['id']);
        echo json_encode($result);
    }

    /**
     *向上调整工作坊位置
     */
     public function up_workshops(){
        $this->workshops->up_workshops($_POST['id']);
        $result=$this->workshops->get_all_workshops();
        echo json_encode($result);
    }
   
    /**
     *向下调整工作坊位置
     */
    public function down_workshops(){
        $this->workshops->down_workshops($_POST['id']);
        $result=$this->workshops->get_all_workshops();
        echo json_encode($result);
    }
    /*workshop函数--------------------END------------------*/
    /*facilities函数--------------------START------------------*/
    /**
     *添加设备
     */
    public function add_facilities(){
        if(count($this->facilities->get_by_name($_FILES["pic_name"]["name"]))>0){
            $this->facilities();
            $data['message']="已存在同名设备图片,添加设备失败！";
            $this->load->view('templates/blank',$data);
        }
        else if (($_FILES["pic_name"]["size"] < MAXSIZE*1024*1024)){
            if ($_FILES["pic_name"]["error"] > 0){
                show_error($_FILES["pic_name"]["error"]);
            }else{
                $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/facilities/";
                if (!is_dir($save_dir)){ 
                    mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
                }
                $save_path=iconv("UTF-8", "GBK", $save_dir.$_FILES["pic_name"]["name"]);         
                $if_success=move_uploaded_file($_FILES["pic_name"]["tmp_name"],$save_path);

                /*获取未插入前第一个正在进行的项目id*/
                $down_id=$this->facilities->get_top_id();
                /*判断是否存在正在进行的项目*/
                $_POST['up_id']=-1;
                $count=count($down_id);
                if(count($down_id)==0){
                    $_POST['down_id']=-2;
                }else{
                    $_POST['down_id']=$down_id[0]['id'];
                }
                /*插入新的项目*/
                $_POST['pic_name']=$_FILES["pic_name"]["name"];
                $this->facilities->insert($_POST);
                $insert_id=$this->db->insert_id();
                if(count($down_id)!=0){
                    $data=$this->facilities->get_by_id($_POST['down_id'])[0];
                    $data['up_id']=$insert_id;
                    $this->facilities->update($data);
                }
                $this->facilities();
                $data['message']="添加设备成功！";
                $this->load->view('templates/blank',$data);
            }
        }else{
            $file_size=$_FILES["new_pic"]["size"]/1024/1024;
            $this->wheel_pic();
            $data['message']="图片大小超过".MAXSIZE."M,当前大小为:".$file_size."M";
            $this->load->view('templates/blank',$data);
        }
    }
    /**
     *获取某一设备信息
     */
    public function get_facilities_detail(){
        $result=$this->facilities->get_by_id($_POST['id']);
        echo json_encode($result);
    }

    /**
     *删除设备
     */
    public function delete_facilities(){
          $this->facilities->delete_facilities($_POST['id']);
    }

    /**
     *向上调整某一设备位置
     */
    public function up_facilities(){
        $this->facilities->up_facilities($_POST['id']);
        $result=$this->facilities->get_all_facilities();
        echo json_encode($result);
    }
    
    /**
     *向下调整某一设备位置
     */
    public function down_facilities(){
        $this->facilities->down_facilities($_POST['id']);
        $result=$this->facilities->get_all_facilities();
        echo json_encode($result);
    }
    /*facilities函数--------------------END------------------*/
    /*techniques函数--------------------START------------------*/
    /**
     *添加技术
     */
    public function add_techniques(){
        if(count($this->techniques->get_by_name($_FILES["pic_name"]["name"]))>0){
            $this->techniques();
            $data['message']="已存在同名技术图片,添加设备失败！";
            $this->load->view('templates/blank',$data);
        }
        else if (($_FILES["pic_name"]["size"] < MAXSIZE*1024*1024)){
            if ($_FILES["pic_name"]["error"] > 0){
                show_error($_FILES["pic_name"]["error"]);
            }else{
                $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/techniques/";
                if (!is_dir($save_dir)){ 
                    mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
                }
                $save_path=iconv("UTF-8", "GBK", $save_dir.$_FILES["pic_name"]["name"]);         
                $if_success=move_uploaded_file($_FILES["pic_name"]["tmp_name"],$save_path);

                /*获取未插入前第一个正在进行的项目id*/
                $down_id=$this->techniques->get_top_id();
                /*判断是否存在正在进行的项目*/
                $_POST['up_id']=-1;
                $count=count($down_id);
                if(count($down_id)==0){
                    $_POST['down_id']=-2;
                }else{
                    $_POST['down_id']=$down_id[0]['id'];
                }
                /*插入新的项目*/
                $_POST['pic_name']=$_FILES["pic_name"]["name"];
                $this->techniques->insert($_POST);
                $insert_id=$this->db->insert_id();
                if(count($down_id)!=0){
                    $data=$this->techniques->get_by_id($_POST['down_id'])[0];
                    $data['up_id']=$insert_id;
                    $this->techniques->update($data);
                }
                $this->techniques();
                $data['message']="添加技术成功！";
                $this->load->view('templates/blank',$data);
            }
        }else{
            $file_size=$_FILES["pic_name"]["size"]/1024/1024;
            $this->wheel_pic();
            $data['message']="图片大小超过".MAXSIZE."M,当前大小为:".$file_size."M";
            $this->load->view('templates/blank',$data);
        }
    }
    /**
     *删除技术
     */
     public function delete_techniques(){
          $this->techniques->delete_techniques($_POST['id']);
    }

    /**
     *获取某一技术详细信息
     */
    public function get_techniques_detail(){
        $result=$this->techniques->get_by_id($_POST['id']);
        echo json_encode($result);
    }
    /**
     *向上调整某一技术位置
     */
    public function up_techniques(){
        $this->techniques->up_techniques($_POST['id']);
        $result=$this->techniques->get_all_techniques();
        echo json_encode($result);
    }
    /**
     *向下调整某一技术位置
     */
    public function down_techniques(){
        $this->techniques->down_techniques($_POST['id']);
        $result=$this->techniques->get_all_techniques();
        echo json_encode($result);
    }
    /*techniques函数--------------------END------------------*/
}