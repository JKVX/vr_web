<?php
define('MAXSIZE', '32');
class Home extends CI_Controller
{
    /**
     *构造函数
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('news_model','news');
        $this->load->model('wheel_pic_model','wheel_pic');
        $this->load->model('account_model','account');
        $this->load->model('intro_model','intro');
        $this->load->model('member_role_model','member_role');
    }

    /*load->view--------------------START------------------*/
    /**
     *前台默认页面
     */
    public function index(){
        $data['news']=$this->news->get_all_news();
        $data['wheel_pic']=$this->wheel_pic->get_show_pic_name();
        $data['slogan']=$this->intro->get_lab_slogan();
        $this->load->view('templates/header');
        $this->load->view('templates/index_header');
        $this->load->view('home/home',$data);
    }

    /**
     *网站后台默认初始化页面
     */
    public function admin(){
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('home/admin');
    }

    /**
     *home类后台默认初始化页面
     */
    public function home_admin(){
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('home/home_admin');
    }

    /**
     *新建新闻页面
     */ 
    public function news_1(){
        $data['news']=$this->news->get_all_news();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('home/news_1',$data);
    }

    /**
     *新闻详情页面
     */
    public function news_detail(){
        $news_id = $this->uri->segment(3, 0);
        $data['news']=$this->news->get_by_id($news_id)[0];
        $data['news_list']=$this->news->get_all_news();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('home/news_detail',$data);
    }

    /**
     *轮播图管理页面
     */
    public function wheel_pic(){
        $data['wheel_pic']=$this->wheel_pic->get_all_wheel_pic();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('home/wheel_pic',$data);
    }

    /**
     *账号管理页面
     */
    public function manage_account(){
        $data['account']=$this->account->get_all_accounts();
        $data['account_role']=$this->account->get_all_account_roles();
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('home/manage_account',$data);
    }

    /*load->view--------------------END------------------*/

    /**
     *登陆按钮触发事件
     */
    public function login(){
        /*获取username*/
        $user=$this->account->get_by_name($_POST['username']);
        /*username是否存在*/
        if(count($user)==0){
            $this->index();
            $data['message']="用户名不存在！";
            $this->load->view('templates/blank',$data);
        }else{
            /*判断password是否正确*/
            if((trim($_POST['password']))==$user[0]['password']){
                echo "<script>alert('登陆成功！')</script>";
                $this->session->set_userdata('user_id', $user[0]['id']);
                $this->session->set_userdata('username',$user[0]['username']);
                $current = time();
                $this->session->set_userdata('lastActiveTime', $current);
                $this->admin();
            }else{
                $this->index();
                $data['message']="密码错误！";
                $this->load->view('templates/blank',$data);
            }
        }
    }

    /**
     *新建新闻按钮触发事件
     */
    public function create_post(){
        /*获取未插入前第一个新闻id*/
        $down_id=$this->news->get_top_id();
        /*判断是否存在第一个新闻*/
        $_POST['up_id']=-1;
        if(count($down_id)==0){
            $_POST['down_id']=-2;
        }else{
            $_POST['down_id']=$down_id[0]['id'];
        }
        /*插入新的新闻*/
        $this->news->insert($_POST);
        $insert_id=$this->db->insert_id();
        if(count($down_id)!=0){
            $data=$this->news->get_by_id($_POST['down_id'])[0];
            $data['up_id']=$insert_id;
            $this->news->update($data);
        }
        $result=$this->news->get_all_news();
        echo json_encode($result);
    }

    /**
     *根据news_id获取新闻详情
     */
    public function get_news_detail(){
        $result=$this->news->get_news_detail($_POST);
        echo json_encode($result);
    }

    public function save_news(){
        $this->news->update($_POST); 
        $result=$this->news->get_all_news();
        echo json_encode($result);       
    }
    /**
     *根据news_id删除新闻
     */
    public function delete_news(){
        $this->news->delete_news($_POST['id']);
    }
    
    /**
     *根据news_id向上调整新闻位置
     */
    public function up_news(){
        $this->news->up_news($_POST['id']);
        $result=$this->news->get_all_news();
        echo json_encode($result);
    }

    /**
     *根据news_id向下调整新闻位置
     */
    public function down_news(){
        $this->news->down_news($_POST['id']);
        $result=$this->news->get_all_news();
        echo json_encode($result);
    }

    /**
     *插入轮播图
     */
    public function upload_file(){
        /*判断是否存在同名的轮播图*/
        if(count($this->wheel_pic->get_by_name($_FILES["new_pic"]["name"]))>0){
            echo "<script>alert('已存在同名文件！')</script>";
            $this->wheel_pic();
        }
        /*判断轮播图大小是否超过限制*/
        else if (($_FILES["new_pic"]["size"] < MAXSIZE*1024*1024)){
            if ($_FILES["new_pic"]["error"] > 0){
                show_error($_FILES["new_pic"]["error"]);
            }else{
                $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/wheel_pic/";
                if (!is_dir($save_dir)){ 
                    mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
                }
                $save_path=iconv("UTF-8", "GBK", $save_dir.$_FILES["new_pic"]["name"]);         
                $if_success=move_uploaded_file($_FILES["new_pic"]["tmp_name"],$save_path);

                /*获取未插入前第一个轮播图id*/
                $down_id=$this->wheel_pic->get_top_id();
                /*判断是否存在轮播图*/
                $_POST['up_id']=-1;
                $count=count($down_id);
                if(count($down_id)==0){
                    $_POST['down_id']=-2;
                }else{
                    $_POST['down_id']=$down_id[0]['id'];
                }
                /*插入新的项目*/
                $_POST['pic_name']=$_FILES["new_pic"]["name"];
                $this->wheel_pic->insert($_POST);
                $insert_id=$this->db->insert_id();
                if(count($down_id)!=0){
                    $data=$this->wheel_pic->get_by_id($_POST['down_id'])[0];
                    $data['up_id']=$insert_id;
                    $this->wheel_pic->update($data);
                }
                echo "<script>alert('添加轮播图片成功')</script>";
                $this->wheel_pic();
            }
        }else{
            $file_size=$_FILES["new_pic"]["size"]/1024/1024;
            echo "<script>alert('图片大小超过".MAXSIZE."M,当前大小为:".$file_size."M')</script>";
            $this->wheel_pic();
        }
    }

    /**
     *根据轮播图id，删除轮播图
     */
    public function delete_wheel_pic(){
          $this->wheel_pic->delete_wheel_pic($_POST['id']);
    }

    /**
     *根据轮播图id，向上调整轮播图
     */
    public function up_wheel_pic(){
        $this->wheel_pic->up_wheel_pic($_POST['id']);
        $result=$this->wheel_pic->get_all_wheel_pic();
        echo json_encode($result);
    }

    /**
     *根据轮播图id，向下调整轮播图
     */
    public function down_wheel_pic(){
        $this->wheel_pic->down_wheel_pic($_POST['id']);
        $result=$this->wheel_pic->get_all_wheel_pic();
        echo json_encode($result);
    }

    /**
     *根据轮播图id，获取轮播图信息
     */
    public function get_wheel_pic_detail(){
        $result=$this->wheel_pic->get_wheel_pic_detail($_POST['id']);
        echo json_encode($result);
    }

    /**
     *添加账号
     */
    public function add_account(){
        $query=$this->account->get_by_name($_POST['username']);
        $result=array();
        if(count($query)!=0){
            $result[0]=0;
        }else{
            $this->account->insert($_POST);
            $id=$this->db->insert_id();
            $result[0]=1;
            $result[1]=$this->account->get_by_id($id)[0];
            $result[2]=count($this->account->get_all_accounts());
        }
        echo json_encode($result);
    }

    /**
     *删除账户
     */
    public function delete_account(){
        $this->account->delete($_POST['id']);
        $result=$this->account->get_all_accounts();
        echo json_encode($result);
    }

    /**
     *根据id获取账户详情
     */
    public function get_account_detail(){
        $result=$this->account->get_by_id($_POST['id']);
        echo json_encode($result);
    }

    /**
     *根据id修改账户详情
     */
    public function edit_account(){
        $result=$this->account->update($_POST);
        $result=$this->account->get_by_id($_POST['id']);
        echo json_encode($result);
    }
}