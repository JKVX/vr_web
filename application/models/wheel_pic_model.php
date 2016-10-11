<?php
class Wheel_pic_model extends CI_Model
{
    /**
     *向wheel_pic表插入$data
     *@param $data
     */
    public function insert($data)
    {
        $this->db->insert('wheel_pic', $data);
    }

    /**
     *在update表中更新$data
     *@param $data
     */
    public function update($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('wheel_pic',$data);
    }

    /**
     *获取首页显示的三张轮播图的图片名
     */
    public function get_show_pic_name(){
        $id=$this->get_top_id();
        $result=array();
        $count=0;
        /*判断是否存在正在进行的项目*/
        if(count($id)!=0){
            /*判断是否找到最后一个正在进行的项目*/
            $down_id=$id[0]['id'];        
            while ($count<3&&$down_id!=-2) {
                $tmp_result=$this->get_by_id($down_id)[0];
                $result[$count++]=$tmp_result['pic_name'];
                $down_id=$tmp_result['down_id'];
            }

        }  
        return $result;
    }

    /**
     *获取所有的轮播图信息
     */
    public function get_all_wheel_pic(){
        $id=$this->get_top_id();
        $result=array();
        /*判断是否存在正在进行的项目*/
        if(count($id)!=0){
            /*判断是否找到最后一个正在进行的项目*/
            $down_id=$id[0]['id'];
            $count=0;
            while ($down_id!=-2) {
                $tmp_result=$this->get_by_id($down_id)[0];
                $result[$count++]=$tmp_result;
                $down_id=$tmp_result['down_id'];
            }            
        }
        return $result;
    }
    
    /**
     *获取第一个轮播图的信息
     */
    public function get_top_id(){
        $query=$this->db->where('up_id',-1)->get('wheel_pic')->result_array();
        return $query;
    }
    
    /**
     *根据$id获取该轮播图信息
     *@param $id
     */
    public function get_wheel_pic_detail($id){
        $query=$this->db->where('id',$id)
        ->get('wheel_pic')->result_array();
        return $query;
    }
    
    /**
     *根据$id删除该轮播图，并删除服务器上的图片
     *@param $id
     */
    public function delete_wheel_pic($id){
        $wheel_pic=$this->get_by_id($id)[0];
        $up_id=$wheel_pic['up_id'];
        $down_id=$wheel_pic['down_id'];
        $this->db->where('id',$id)->delete('wheel_pic');
        $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/wheel_pic/";
        $save_path=iconv("UTF-8", "GBK", $save_dir.$wheel_pic['pic_name']);
        if (file_exists($save_path)){ 
            unlink($save_path);
        }
        
        if($up_id!=-1){
            $up_wheel_pic=$this->get_by_id($up_id)[0];
            $up_wheel_pic['down_id']=$down_id;
            $this->update($up_wheel_pic);
        }
        if($down_id!=-2){
            $down_wheel_pic=$this->get_by_id($down_id)[0];
            $down_wheel_pic['up_id']=$up_id;
            $this->update($down_wheel_pic);    
        }
    }
    
    /**
     *根据$id获取该轮播图
     *@param $id
     */
    public function get_by_id($id){
        $query=$this->db->where('id',$id)->get('wheel_pic')->result_array();
        return $query;
    }

    /**
     *根据$name获取该轮播图
     *@param $name
     */
    public function get_by_name($name){
        $query=$this->db->where('pic_name',$name)->get('wheel_pic')->result_array();
        return $query;
    }

    /**
     *根据$id向上调整轮播图位置
     *@param $id
     */
    public function up_wheel_pic($id){
        $wheel_pic=$this->get_by_id($id)[0];
        if($wheel_pic['up_id']==-1){
            return;
        }
        $down_id=$wheel_pic['down_id'];
        $up_id=$wheel_pic['up_id'];

        $up_wheel_pic=$this->get_by_id($up_id)[0];

        $wheel_pic['up_id']=$up_wheel_pic['up_id'];
        $wheel_pic['down_id']=$up_id;
        $this->update($wheel_pic);

        $up_wheel_pic['up_id']=$id;
        $up_wheel_pic['down_id']=$down_id;
        $this->update($up_wheel_pic);

        if($down_id!=-2){
            $down_wheel_pic=$this->get_by_id($down_id)[0];
            $down_wheel_pic['up_id']=$up_id;
            $this->update($down_wheel_pic);
        }

        if($wheel_pic['up_id']!=-1)
        {
            $up_up_wheel_pic=$this->get_by_id($wheel_pic['up_id'])[0];
            $up_up_wheel_pic['down_id']=$id;
            $this->update($up_up_wheel_pic);
        }

    }
    
    /**
     *根据$id向上调整轮播图位置
     *@param $id
     */
    public function down_wheel_pic($id){
        $wheel_pic=$this->get_by_id($id)[0];
        if($wheel_pic['down_id']==-2){
            return;
        }
        $down_id=$wheel_pic['down_id'];
        $up_id=$wheel_pic['up_id'];

        $down_wheel_pic=$this->get_by_id($down_id)[0];

        $wheel_pic['down_id']=$down_wheel_pic['down_id'];
        $wheel_pic['up_id']=$down_id;
        $this->update($wheel_pic);

        $down_wheel_pic['up_id']=$up_id;
        $down_wheel_pic['down_id']=$id;
        $this->update($down_wheel_pic);

        if($up_id!=-1){
            $up_wheel_pic=$this->get_by_id($up_id)[0];
            $up_wheel_pic['down_id']=$down_id;
            $this->update($up_wheel_pic);
        }

        if($wheel_pic['down_id']!=-2)
        {
            $down_down_wheel_pic=$this->get_by_id($wheel_pic['down_id'])[0];
            $down_down_wheel_pic['up_id']=$id;
            $this->update($down_down_wheel_pic);
        }
    }
}

?>