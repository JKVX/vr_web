<?php
define('MAXSIZE', '32');
class Members extends CI_Controller
{
    /**
     *构造函数
     */
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('members_model','members');
        $this->load->model('member_role_model','member_role');
    }
    /*load->view--------------------START------------------*/
    /**
     *前台初始化页面
     */
    public function index(){
        $data['members']=$this->members->get_all_members();
        $data['member_role']=$this->member_role->get_all_member_role();
        $this->load->view('templates/header');
        $this->load->view('templates/index_header');
        $this->load->view('members/members',$data);
    }
    /**
     *后台初始化页面
     */
    public function members_admin(){
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('members/members_admin');
    }

    /**
     *manage_role页面
     */
    public function manage_role(){
        $data['member_role']=$this->member_role->get_all_member_role();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('members/manage_role',$data);
    }

    /**
     *成员管理页面
     */
    public function deletemember(){
        $data['members']=$this->members->get_all_members();
        $data['member_role']=$this->member_role->get_all_member_role();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('members/deletemember',$data);
    }
    
    /**
     *新增成员页面
     */
    public function addnewmember(){
        $data['member_role']=$this->member_role->get_all_member_role();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('members/addnewmember',$data);
    }
    /*load->view--------------------END------------------*/
    /*members函数--------------------START------------------*/
    /**
     *添加成员
     */
    public function add_members(){
      if (($_FILES["pic_name"]["size"] < MAXSIZE*1024*1024)){
            if ($_FILES["pic_name"]["error"] > 0){
                show_error($_FILES["pic_name"]["error"]);
            }else{
                $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/members/";
                if (!is_dir($save_dir)){ 
                    mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
                }
                $file_name=$_FILES["pic_name"]["name"];
                $file_name=strrchr($file_name,'.');
                $file_name=time().'_'.rand().$file_name;
                $save_path=iconv("UTF-8", "GBK", $save_dir.$file_name);         
                $if_success=move_uploaded_file($_FILES["pic_name"]["tmp_name"],$save_path);
                $_POST['pic_name']=$file_name;       
                $this->members->insert($_POST);
                echo "<script>alert('添加成员成功！')</script>";
                $this->addnewmember();
            }
        }else{
            $file_size=$_FILES["new_pic"]["size"]/1024/1024;
            echo "<script>alert('图片大小超过".MAXSIZE."M,当前大小为:".$file_size."M')</script>";
            $this->wheel_pic();
        }
    }
    /**
     *删除成员
     */
     public function delete_members(){
          $this->members->delete_members($_POST['id']);
    }

    public function edit_member(){
        $projects_id = $this->uri->segment(3, 0);
        $data['member_role']=$this->member_role->get_all_member_role();
        $data['members']=$this->members->get_by_id($projects_id)[0];
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('members/editmember',$data);
    }

    /**
     *向上调整成员位置
     */
     public function up_members(){
        $this->members->up_members($_POST['id']);
    }
    /**
     *向下调整成员位置
     */
    public function down_members(){
        $this->members->down_members($_POST['id']);
    }
    /**
     *获取成员详细信息
     */
    public function get_members_detail(){
        $result=$this->members->get_by_id($_POST['id']);
        echo json_encode($result);
    }
    /**
     *更新成员信息成功
     */
    public function update_members(){
        $members=$this->members->get_by_id($_POST['id']);
        //调用代码
        $count=$_FILES["pic_name"]['name'];
        if($count!=""):
            $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/members/";
            if (!is_dir($save_dir)){ 
                    mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
            }
            if($_FILES["pic_name"]["size"]>MAXSIZE*1024*1024){
                show_error("文件最大".MAXSIZE."M,您的文件大小为".round(($_FILES["pic_name"]["size"]/1024/1024),2)."M");
            } 
            if ($_FILES["pic_name"]["error"] > 0){
                show_error("上传出错，错误代码 ".$_FILES["pic_name"]["error"]);
            }else{
                $file_name=$_FILES["pic_name"]["name"];
                $file_name=strrchr($file_name,'.');
                $file_name=time().'_'.rand().$file_name;
                $save_path=iconv("UTF-8", "GBK", $save_dir.$file_name);         
                $if_success=move_uploaded_file($_FILES["pic_name"]["tmp_name"],$save_path);
                $delete_path=$save_dir.$members[0]['pic_name'];
                unlink($delete_path);
                $_POST['pic_name']= $file_name;
            }
        endif;
        if($count==0):
            $_POST['pic_name']=$members[0]['pic_name'];
        endif;
        $this->members->update_members($_POST);
        echo "<script>alert('更新成员信息成功！')</script>";
        $this->deletemember();
    }
    /*members函数--------------------END------------------*/
    /*member_role函数--------------------START------------------*/
    /**
     *添加成员角色
     */
    public function create_member_role(){
         /*获取未插入前第一个正在进行的项目id*/
        $down_id=$this->member_role->get_top_id();
        /*判断是否存在正在进行的项目*/
        $_POST['up_id']=-1;
        if(count($down_id)==0){
            $_POST['down_id']=-2;
        }else{
            $_POST['down_id']=$down_id[0]['id'];
        }
        /*插入新的项目*/
        $this->member_role->insert($_POST);
        $insert_id=$this->db->insert_id();
        if(count($down_id)!=0){
            $data=$this->member_role->get_by_id($_POST['down_id'])[0];
            $data['up_id']=$insert_id;
            $this->member_role->update($data);
        }
        $result=$this->member_role->get_all_member_role();
        echo json_encode($result);
    }
    /**
     *删除成员角色
     */
    public function delete_member_role(){
        $members=$this->members->get_top_id($_POST['id']);
        if(count($members)!=0){
            echo "0";
        }else{
            $this->member_role->delete_member_role($_POST['id']);
            echo "1";
        }
    }
    /**
     *向上调整成员角色位置
     */
        public function up_member_role(){
        $this->member_role->up_member_role($_POST['id']);
        $result=$this->member_role->get_all_member_role();
        echo json_encode($result);
    }
    /**
     *向下调整成员角色位置
     */
    public function down_member_role(){
        $this->member_role->down_member_role($_POST['id']);
        $result=$this->member_role->get_all_member_role();
        echo json_encode($result);
    }
    /*member_role--------------------END------------------*/

}