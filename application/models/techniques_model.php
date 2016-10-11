<?php
class Techniques_model extends CI_Model
{
    /**
     *向techniques表中插入一条数据
     *@param$data
     */
    public function insert($data)
    {
        $this->db->insert('techniques', $data);
    }

    /**
     *在techniques表中更新数据
     */
    public function update($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('techniques',$data);
    }

    /**
     *获取前台显示的三个技术
     *@param$id
     */
    public function get_show_techniques(){
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
     *获取所有技术
     */
    public function get_all_techniques(){
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
     *获取第一个技术id
     */
    public function get_top_id(){
        $query=$this->db->where('up_id',-1)->get('techniques')->result_array();
        return $query;
    }

    /**
     *根据id,删除某技术
     *@param id
     */
    public function delete_techniques($id){
        $techniques=$this->get_by_id($id)[0];
        $up_id=$techniques['up_id'];
        $down_id=$techniques['down_id'];
        $this->db->where('id',$id)->delete('techniques');
        $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/techniques/";
        $save_path=iconv("UTF-8", "GBK", $save_dir.$techniques['pic_name']);
        if (file_exists($save_path)){ 
            unlink($save_path);
        }
        
        if($up_id!=-1){
            $up_techniques=$this->get_by_id($up_id)[0];
            $up_techniques['down_id']=$down_id;
            $this->update($up_techniques);
        }
        if($down_id!=-2){
            $down_techniques=$this->get_by_id($down_id)[0];
            $down_techniques['up_id']=$up_id;
            $this->update($down_techniques);    
        }
    }

    /**
     *根据id,获取某技术
     *@param id
     */
    public function get_by_id($id){
        $query=$this->db->where('id',$id)->get('techniques')->result_array();
        return $query;
    }

    /**
     *根据name,获取某技术
     *@param name 
     */
    public function get_by_name($name){
        $query=$this->db->where('pic_name',$name)->get('techniques')->result_array();
        return $query;
    }

    /**
     *根据id,向上调整某技术位置
     *@param id
     */
    public function up_techniques($id){
        $techniques=$this->get_by_id($id)[0];
        if($techniques['up_id']==-1){
            return;
        }
        $down_id=$techniques['down_id'];
        $up_id=$techniques['up_id'];

        $up_techniques=$this->get_by_id($up_id)[0];

        $techniques['up_id']=$up_techniques['up_id'];
        $techniques['down_id']=$up_id;
        $this->update($techniques);

        $up_techniques['up_id']=$id;
        $up_techniques['down_id']=$down_id;
        $this->update($up_techniques);

        if($down_id!=-2){
            $down_techniques=$this->get_by_id($down_id)[0];
            $down_techniques['up_id']=$up_id;
            $this->update($down_techniques);
        }

        if($techniques['up_id']!=-1)
        {
            $up_up_techniques=$this->get_by_id($techniques['up_id'])[0];
            $up_up_techniques['down_id']=$id;
            $this->update($up_up_techniques);
        }

    }

    /**
     *根据id,向下调整某技术位置
     *@param id
     */
    public function down_techniques($id){
        $techniques=$this->get_by_id($id)[0];
        if($techniques['down_id']==-2){
            return;
        }
        $down_id=$techniques['down_id'];
        $up_id=$techniques['up_id'];

        $down_techniques=$this->get_by_id($down_id)[0];

        $techniques['down_id']=$down_techniques['down_id'];
        $techniques['up_id']=$down_id;
        $this->update($techniques);

        $down_techniques['up_id']=$up_id;
        $down_techniques['down_id']=$id;
        $this->update($down_techniques);

        if($up_id!=-1){
            $up_techniques=$this->get_by_id($up_id)[0];
            $up_techniques['down_id']=$down_id;
            $this->update($up_techniques);
        }

        if($techniques['down_id']!=-2)
        {
            $down_down_techniques=$this->get_by_id($techniques['down_id'])[0];
            $down_down_techniques['up_id']=$id;
            $this->update($down_down_techniques);
        }
    }
}

?>