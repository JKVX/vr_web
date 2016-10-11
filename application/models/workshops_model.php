<?php
class Workshops_model extends CI_Model
{
    /**
     *向workshops表中插入一条数据
     *@param$data
     */
    public function insert($data)
    {
        $this->db->insert('workshops', $data);
    }

    /**
     *在workshops表中更新数据
     */
    public function update($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('workshops',$data);
    }

    /**
     *获取所有工作坊
     */
    public function get_all_workshops(){
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
     *获取第一个工作坊id
     */
    public function get_top_id(){
        $query=$this->db->where('up_id',-1)->get('workshops')->result_array();
        return $query;
    }

    /**
     *根据id,删除某工作坊
     *@param id
     */
    public function delete_workshops($id){
        $workshops=$this->get_by_id($id)[0];
        $up_id=$workshops['up_id'];
        $down_id=$workshops['down_id'];
        $this->db->where('id',$id)->delete('workshops');        
        if($up_id!=-1){
            $up_workshops=$this->get_by_id($up_id)[0];
            $up_workshops['down_id']=$down_id;
            $this->update($up_workshops);
        }
        if($down_id!=-2){
            $down_workshops=$this->get_by_id($down_id)[0];
            $down_workshops['up_id']=$up_id;
            $this->update($down_workshops);    
        }
    }

    /**
     *根据id,获取某工作坊
     *@param id
     */
    public function get_by_id($id){
        $query=$this->db->where('id',$id)->get('workshops')->result_array();
        return $query;
    }

    /**
     *根据id,向上调整某工作坊位置
     *@param id
     */
    public function up_workshops($id){
        $workshops=$this->get_by_id($id)[0];
        if($workshops['up_id']==-1){
            return;
        }
        $down_id=$workshops['down_id'];
        $up_id=$workshops['up_id'];

        $up_workshops=$this->get_by_id($up_id)[0];

        $workshops['up_id']=$up_workshops['up_id'];
        $workshops['down_id']=$up_id;
        $this->update($workshops);

        $up_workshops['up_id']=$id;
        $up_workshops['down_id']=$down_id;
        $this->update($up_workshops);

        if($down_id!=-2){
            $down_workshops=$this->get_by_id($down_id)[0];
            $down_workshops['up_id']=$up_id;
            $this->update($down_workshops);
        }

        if($workshops['up_id']!=-1)
        {
            $up_up_workshops=$this->get_by_id($workshops['up_id'])[0];
            $up_up_workshops['down_id']=$id;
            $this->update($up_up_workshops);
        }

    }

    /**
     *根据id,向下调整某工作坊位置
     *@param id
     */
    public function down_workshops($id){
        $workshops=$this->get_by_id($id)[0];
        if($workshops['down_id']==-2){
            return;
        }
        $down_id=$workshops['down_id'];
        $up_id=$workshops['up_id'];

        $down_workshops=$this->get_by_id($down_id)[0];

        $workshops['down_id']=$down_workshops['down_id'];
        $workshops['up_id']=$down_id;
        $this->update($workshops);

        $down_workshops['up_id']=$up_id;
        $down_workshops['down_id']=$id;
        $this->update($down_workshops);

        if($up_id!=-1){
            $up_workshops=$this->get_by_id($up_id)[0];
            $up_workshops['down_id']=$down_id;
            $this->update($up_workshops);
        }

        if($workshops['down_id']!=-2)
        {
            $down_down_workshops=$this->get_by_id($workshops['down_id'])[0];
            $down_down_workshops['up_id']=$id;
            $this->update($down_down_workshops);
        }
    }
}

?>