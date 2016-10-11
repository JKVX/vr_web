<?php
class Facilities_model extends CI_Model
{
    /**
     *将$data插入facilities中
     *@param$data
     */
    public function insert($data)
    {
        $this->db->insert('facilities', $data);
    }

    /**
     *在facilities中更新$data数据
     *@param$data
     */
    public function update($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('facilities',$data);
    }

    /**
     *获取前台页面显示的三条设备信息
     */
    public function get_show_facilities(){
        $id=$this->get_top_id();
        $result=array();
        $count=0;
        /*判断是否存在正在进行的项目*/
        if(count($id)!=0){
            /*判断是否找到最后一个正在进行的项目*/
            $down_id=$id[0]['id'];      
            while ($down_id!=-2) {
                $tmp_result=$this->get_by_id($down_id)[0];
                $result[$count++]=$tmp_result;
                $down_id=$tmp_result['down_id'];
            }            
        }
        return $result;
    }

    /**
     *获取所有facilities
     */
    public function get_all_facilities(){
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
     *获取第一个facilities信息
     */
    public function get_top_id(){
        $query=$this->db->where('up_id',-1)->get('facilities')->result_array();
        return $query;
    }

    /**
     *根据id删除facilities
     *@param$id
     */
    public function delete_facilities($id){
        $facilities=$this->get_by_id($id)[0];
        $up_id=$facilities['up_id'];
        $down_id=$facilities['down_id'];
        $this->db->where('id',$id)->delete('facilities');
        $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/facilities/";
        $save_path=iconv("UTF-8", "GBK", $save_dir.$facilities['pic_name']);
        if (file_exists($save_path)){ 
            unlink($save_path);
        }
        
        if($up_id!=-1){
            $up_facilities=$this->get_by_id($up_id)[0];
            $up_facilities['down_id']=$down_id;
            $this->update($up_facilities);
        }
        if($down_id!=-2){
            $down_facilities=$this->get_by_id($down_id)[0];
            $down_facilities['up_id']=$up_id;
            $this->update($down_facilities);    
        }
    }
    /**
     *根据id获取facilities
     *@param$id
     */
    public function get_by_id($id){
        $query=$this->db->where('id',$id)->get('facilities')->result_array();
        return $query;
    }

    /**
     *根据name获取facilities
     *@param$name
     */
    public function get_by_name($name){
        $query=$this->db->where('pic_name',$name)->get('facilities')->result_array();
        return $query;
    }

    /**
     *根据id向上调整facilities位置
     *@param$id
     */
    public function up_facilities($id){
        $facilities=$this->get_by_id($id)[0];
        if($facilities['up_id']==-1){
            return;
        }
        $down_id=$facilities['down_id'];
        $up_id=$facilities['up_id'];

        $up_facilities=$this->get_by_id($up_id)[0];

        $facilities['up_id']=$up_facilities['up_id'];
        $facilities['down_id']=$up_id;
        $this->update($facilities);

        $up_facilities['up_id']=$id;
        $up_facilities['down_id']=$down_id;
        $this->update($up_facilities);

        if($down_id!=-2){
            $down_facilities=$this->get_by_id($down_id)[0];
            $down_facilities['up_id']=$up_id;
            $this->update($down_facilities);
        }

        if($facilities['up_id']!=-1)
        {
            $up_up_facilities=$this->get_by_id($facilities['up_id'])[0];
            $up_up_facilities['down_id']=$id;
            $this->update($up_up_facilities);
        }

    }

    /**
     *根据id向下调整facilities位置
     *@param$id
     */
    public function down_facilities($id){
        $facilities=$this->get_by_id($id)[0];
        if($facilities['down_id']==-2){
            return;
        }
        $down_id=$facilities['down_id'];
        $up_id=$facilities['up_id'];

        $down_facilities=$this->get_by_id($down_id)[0];

        $facilities['down_id']=$down_facilities['down_id'];
        $facilities['up_id']=$down_id;
        $this->update($facilities);

        $down_facilities['up_id']=$up_id;
        $down_facilities['down_id']=$id;
        $this->update($down_facilities);

        if($up_id!=-1){
            $up_facilities=$this->get_by_id($up_id)[0];
            $up_facilities['down_id']=$down_id;
            $this->update($up_facilities);
        }

        if($facilities['down_id']!=-2)
        {
            $down_down_facilities=$this->get_by_id($facilities['down_id'])[0];
            $down_down_facilities['up_id']=$id;
            $this->update($down_down_facilities);
        }
    }
}

?>