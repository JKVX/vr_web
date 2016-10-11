<?php
class TeamBuild_model extends CI_Model
{    
    /**
     *将$data添加到teambuild表
     *@param $data
     */
    public function insert($data)
    {
        $this->db->insert('teambuild', $data);
    }
    /**
     *在teambuild表中更新$data信息
     *@param $data
     */
    public function update($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('teambuild',$data);
    }
    /**
     *获取第一个teambuild
     */
    public function get_top_id(){
        $query=$this->db->where('up_id',-1)->get('teambuild')->result_array();
        return $query;
    }
    /**
     *根据id获取teambuild详情
     *@param $id
     */
    public function get_by_id($id){
        $query=$this->db->where('id',$id)->get('teambuild')->result_array();
        return $query;
    }

    /**
     *获取所有的teambuild
     */
    public function get_all_teambuild(){
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
     *根据id删除teambuild详情
     *@param $id
     */
    public function delete_teambuild($id){
        $teambuild=$this->get_by_id($id)[0];
        $up_id=$teambuild['up_id'];
        $down_id=$teambuild['down_id'];
        $this->db->where('id',$id)->delete('teambuild');        
        if($up_id!=-1){
            $up_teambuild=$this->get_by_id($up_id)[0];
            $up_teambuild['down_id']=$down_id;
            $this->update($up_teambuild);
        }
        if($down_id!=-2){
            $down_teambuild=$this->get_by_id($down_id)[0];
            $down_teambuild['up_id']=$up_id;
            $this->update($down_teambuild);    
        }
    }
    /**
     *根据id向上调整teambuild位置
     *@param $id
     */
    public function up_teambuild($id){
        $teambuild=$this->get_by_id($id)[0];
        if($teambuild['up_id']==-1){
            return;
        }
        $down_id=$teambuild['down_id'];
        $up_id=$teambuild['up_id'];

        $up_teambuild=$this->get_by_id($up_id)[0];

        $teambuild['up_id']=$up_teambuild['up_id'];
        $teambuild['down_id']=$up_id;
        $this->update($teambuild);

        $up_teambuild['up_id']=$id;
        $up_teambuild['down_id']=$down_id;
        $this->update($up_teambuild);

        if($down_id!=-2){
            $down_teambuild=$this->get_by_id($down_id)[0];
            $down_teambuild['up_id']=$up_id;
            $this->update($down_teambuild);
        }

        if($teambuild['up_id']!=-1)
        {
            $up_up_teambuild=$this->get_by_id($teambuild['up_id'])[0];
            $up_up_teambuild['down_id']=$id;
            $this->update($up_up_teambuild);
        }

    }
    /**
     *根据id向下调整teambuild位置
     *@param $id
     */
    public function down_teambuild($id){
        $teambuild=$this->get_by_id($id)[0];
        if($teambuild['down_id']==-2){
            return;
        }
        $down_id=$teambuild['down_id'];
        $up_id=$teambuild['up_id'];

        $down_teambuild=$this->get_by_id($down_id)[0];

        $teambuild['down_id']=$down_teambuild['down_id'];
        $teambuild['up_id']=$down_id;
        $this->update($teambuild);

        $down_teambuild['up_id']=$up_id;
        $down_teambuild['down_id']=$id;
        $this->update($down_teambuild);

        if($up_id!=-1){
            $up_teambuild=$this->get_by_id($up_id)[0];
            $up_teambuild['down_id']=$down_id;
            $this->update($up_teambuild);
        }

        if($teambuild['down_id']!=-2)
        {
            $down_down_teambuild=$this->get_by_id($teambuild['down_id'])[0];
            $down_down_teambuild['up_id']=$id;
            $this->update($down_down_teambuild);
        }
    }

}

?>