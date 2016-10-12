<?php
define('MAXSIZE',32);
class Contact extends CI_Controller
{
    /**
     *构造函数
     */
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('contact_model','contact');
        $this->load->model('intro_model','intro');
    }
    /*load->view--------------------START------------------*/
    /**
     *前台页面
     */
    public function index(){
        $data['old_img']=$this->intro->get_by_id(3)['lab_intro'];
        $this->load->view('templates/header');
        $this->load->view('templates/index_header');
        $this->load->view('contact/contact',$data);
    }
    /**
     *后台页面
     */
    public function contact_admin(){
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('contact/contact_admin');
    }

    /**
     *后台页面
     */
    public function contact_pic(){
        $data['old_img']=$this->intro->get_by_id(3)['lab_intro'];
        $this->load->view('templates/header');
        $this->load->view('templates/back_index_header');
        $this->load->view('contact/contact_pic',$data);
    }
    /*load->view--------------------END------------------*/
    public function change_img(){
        /*判断轮播图大小是否超过限制*/
        $result=$this->intro->get_by_id(3)['lab_intro'];
        if (($_FILES["lab_intro"]["size"] < MAXSIZE*1024*1024)){
            if ($_FILES["lab_intro"]["error"] > 0){
                show_error($_FILES["lab_intro"]["error"]);
            }else{
                $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/contact/";
                if (!is_dir($save_dir)){ 
                    mkdir(iconv("UTF-8", "GBK", $save_dir),0777,true); 
                }
                $file_name=$_FILES["lab_intro"]["name"];
                $file_name=strrchr($file_name,'.');
                $file_name=time().'_'.rand().$file_name;
                $save_path=iconv("UTF-8", "GBK", $save_dir.$file_name);         
                $if_success=move_uploaded_file($_FILES["lab_intro"]["tmp_name"],$save_path);
                unlink($save_dir.$result);
                /*插入新的项目*/
                $_POST['lab_intro']=$file_name;
                $_POST['id']=3;
                $this->intro->update($_POST);
                echo "<script>alert('替换图片成功')</script>";
                $this->contact_pic();
            }
        }else{
            $file_size=$_FILES["lab_intro"]["size"]/1024/1024;
            echo "<script>alert('图片大小超过".MAXSIZE."M,当前大小为:".$file_size."M')</script>";
            $this->contact_pic();
        }
    }





    public function delete_message(){
        $this->contact->delete($_POST['id']);
        $result=$this->contact->get_all_contact();
        echo json_encode($result);
    }
    /**
     *联系我们按钮触发事件
     */
    public function contact_us(){
        $this->contact->insert($_POST);
        echo "<script>alert('提交成功！感谢您的反馈')</script>";
        $this->index();
    }
    /**
     *下载页面触发事件
     */
    public function download_contact(){
        //导入引用文件
        require_once dirname(dirname(__FILE__)) . '/libraries/PHPExcel/PHPExcel.php';
        //创建新的对象
        $objPHPExcel = new PHPExcel();
        $query_result=$this->contact->get_all_contact();
        //为第一行复制        
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '编号')
            ->setCellValue('B1', '姓名')
            ->setCellValue('C1', '联系方式')
            ->setCellValue('D1', '专业/学校')
            ->setCellValue('E1', '留言时间')
            ->setCellValue('F1', '留言详情');

        //设置导出的EXCEL文件列宽
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);      
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(27);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);

        //赋值
        for($i=0;$i<count($query_result);$i++) {
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.($i+2), $i+1)
            ->setCellValue('B'.($i+2), $query_result[$i]['name'])
            ->setCellValue('C'.($i+2), $query_result[$i]['tel'])
            ->setCellValue('D'.($i+2), $query_result[$i]['school'])
            ->setCellValue('E'.($i+2), $query_result[$i]['createtime'])
            ->setCellValue('F'.($i+2), $query_result[$i]['message']);
        }
        //重新命名worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Contact_Result');
        $save_path=APPPATH.'libraries/PHPExcel/Documents/'.time().'TMP.xlsx';
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save($save_path);
        $file_name="Contact_Result.xlsx";
        header("Content-type: application/vnd.ms-excel"); 
        header("Content-Disposition:attachment;filename=".$file_name); 
        header('Cache-Control: max-age=10');
        ob_clean();//关键
        flush();//关键
        readfile($save_path); 
        unlink($save_path);  
    }
}