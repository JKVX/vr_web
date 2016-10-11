<?php
class Member_role_model extends CI_Model
{
    /**
     *将$data添加到member_role表
     *@param $data
     */
    public function insert($data)
    {
        $this->db->insert('member_role', $data);
    }
    
    /**
     *在member_role表中更新$data信息
     *@param $data
     */
    public function update($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('member_role',$data);
    }
    
    /**
     *获取所有成员角色
     */
    public function get_all_member_role(){
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
     *获取第一个成员角色
     */
    public function get_top_id(){
        $query=$this->db->where('up_id',-1)->get('member_role')->result_array();
        return $query;
    }

    /**
     *根据id删除member_role
     *@param $id
     */
    public function delete_member_role($id){
        $member_role=$this->get_by_id($id)[0];
        $up_id=$member_role['up_id'];
        $down_id=$member_role['down_id'];
        $this->db->where('id',$id)->delete('member_role');        
        if($up_id!=-1){
            $up_member_role=$this->get_by_id($up_id)[0];
            $up_member_role['down_id']=$down_id;
            $this->update($up_member_role);
        }
        if($down_id!=-2){
            $down_member_role=$this->get_by_id($down_id)[0];
            $down_member_role['up_id']=$up_id;
            $this->update($down_member_role);    
        }
    }

    /**
     *根据id获取member_role
     *@param $id
     */
    public function get_by_id($id){
        $query=$this->db->where('id',$id)->get('member_role')->result_array();
        return $query;
    }

    /**
     *根据id向上调整member_role位置
     *@param $id
     */
    public function up_member_role($id){
        $member_role=$this->get_by_id($id)[0];
        if($member_role['up_id']==-1){
            return;
        }
        $down_id=$member_role['down_id'];
        $up_id=$member_role['up_id'];

        $up_member_role=$this->get_by_id($up_id)[0];

        $member_role['up_id']=$up_member_role['up_id'];
        $member_role['down_id']=$up_id;
        $this->update($member_role);

        $up_member_role['up_id']=$id;
        $up_member_role['down_id']=$down_id;
        $this->update($up_member_role);

        if($down_id!=-2){
            $down_member_role=$this->get_by_id($down_id)[0];
            $down_member_role['up_id']=$up_id;
            $this->update($down_member_role);
        }

        if($member_role['up_id']!=-1)
        {
            $up_up_member_role=$this->get_by_id($member_role['up_id'])[0];
            $up_up_member_role['down_id']=$id;
            $this->update($up_up_member_role);
        }

    }

    /**
     *根据id向下调整member_role位置
     *@param $id
     */
    public function down_member_role($id){
        $member_role=$this->get_by_id($id)[0];
        if($member_role['down_id']==-2){
            return;
        }
        $down_id=$member_role['down_id'];
        $up_id=$member_role['up_id'];

        $down_member_role=$this->get_by_id($down_id)[0];

        $member_role['down_id']=$down_member_role['down_id'];
        $member_role['up_id']=$down_id;
        $this->update($member_role);

        $down_member_role['up_id']=$up_id;
        $down_member_role['down_id']=$id;
        $this->update($down_member_role);

        if($up_id!=-1){
            $up_member_role=$this->get_by_id($up_id)[0];
            $up_member_role['down_id']=$down_id;
            $this->update($up_member_role);
        }

        if($member_role['down_id']!=-2)
        {
            $down_down_member_role=$this->get_by_id($member_role['down_id'])[0];
            $down_down_member_role['up_id']=$id;
            $this->update($down_down_member_role);
        }
    }
}

?>