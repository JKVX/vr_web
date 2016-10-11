<?php
class Members_model extends CI_Model
{
    /**
     *将$data添加到members表
     *@param $data
     */
    public function insert($data)
    {
        /*获取未插入前第一个正在进行的项目id*/
        $down_id=$this->members->get_top_id($data['role_id']);
        /*判断是否存在正在进行的项目*/
        $data['up_id']=-1;
        $count=count($down_id);
        if(count($down_id)==0){
            $data['down_id']=-2;
        }else{
            $data['down_id']=$down_id[0]['id'];
        }
        /*插入新的项目*/ 
        $this->db->insert('members',$data);
        $insert_id=$this->db->insert_id();
        if(count($down_id)!=0){
            $data=$this->members->get_by_id($data['down_id'])[0];
            $data['up_id']=$insert_id;
            $this->members->update($data);
        }
    }
    /**
     *在members表中更新$data信息
     *@param $data
     */
    public function update($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('members',$data);
    }
    
    /**
     *根据id获取members
     *@param $id
     */
    public function get_by_id($id){
        $query=$this->db->where('id',$id)->get('members')->result_array();
        return $query;
    }
    /**
     *根据pic_name获取members
     *@param $name
     */
    public function get_by_pic_name($name){
        $query=$this->db->where('pic_name',$name)->get('members')->result_array();
        return $query;
    }  

    /**
     *根据members_name获取members
     *@param $name
     */
    public function get_by_members_name($name){
        $query=$this->db->where('members_name',$name)->get('members')->result_array();
        return $query;
    }
    
    /**
     *根据role_id获取第一个该角色的成员
     *@param $role_id
     */
    public function get_top_id($role_id){
        $query=$this->db->where('up_id',-1)->where('role_id',$role_id)->get('members')->result_array();
        return $query;
    }

    /**
     *获取所有成员
     */
    public function get_all_members(){
        $this->load->model('member_role_model','member_role');
        $member_role=$this->member_role->get_all_member_role();
        $members=array();
        for($i=0;$i<count($member_role);$i++){
            $top_id=$this->get_top_id($member_role[$i]['id']);
            $result=array();
            if(count($top_id)!=0){
                $down_id=$top_id[0]['id'];
                $count=0;
                while ($down_id!=-2) {
                    $tmp_result=$this->get_by_id($down_id)[0];
                    $result[$count++]=$tmp_result;
                    $down_id=$tmp_result['down_id'];
                }            
            }
            $members[$i]=$result;
        }
        return $members;
    }

    /**
     *更新members信息
     *@param $data
     */
    public function update_members($data){
        $members=$this->get_by_id($data['id'])[0];
        $members['members_intro']=$data['members_intro'];
        $members['members_name']=$data['members_name'];
        if($members['role_id']!=$data['role_id']){
            $members['role_id']=$data['role_id'];
            $this->delete_members($members['id']);
            $this->insert($members);
        }else{
            $this->update($members);
        }
    }

    /**
     *根据id删除members
     *@param $id
     */
    public function delete_members($id){
        $members=$this->get_by_id($id)[0];
        $up_id=$members['up_id'];
        $down_id=$members['down_id'];
        $this->db->where('id',$id)->delete('members');
        if($up_id!=-1){
            $up_members=$this->get_by_id($up_id)[0];
            $up_members['down_id']=$down_id;
            $this->update($up_members);
        }
        if($down_id!=-2){
            $down_members=$this->get_by_id($down_id)[0];
            $down_members['up_id']=$up_id;
            $this->update($down_members);    
        }
    }

    /**
     *根据id向上调整members位置
     *@param $id
     */
    public function up_members($id){
        $members=$this->get_by_id($id)[0];
        if($members['up_id']==-1){
            return;
        }
        $down_id=$members['down_id'];
        $up_id=$members['up_id'];

        $up_members=$this->get_by_id($up_id)[0];

        $members['up_id']=$up_members['up_id'];
        $members['down_id']=$up_id;
        $this->update($members);

        $up_members['up_id']=$id;
        $up_members['down_id']=$down_id;
        $this->update($up_members);

        if($down_id!=-2){
            $down_members=$this->get_by_id($down_id)[0];
            $down_members['up_id']=$up_id;
            $this->update($down_members);
        }

        if($members['up_id']!=-1)
        {
            $up_up_members=$this->get_by_id($members['up_id'])[0];
            $up_up_members['down_id']=$id;
            $this->update($up_up_members);
        }
    }
    /**
     *根据id向下调整members的位置
     *@param $id
     */
    public function down_members($id){
        $members=$this->get_by_id($id)[0];
        if($members['down_id']==-2){
            return;
        }
        $down_id=$members['down_id'];
        $up_id=$members['up_id'];

        $down_members=$this->get_by_id($down_id)[0];

        $members['down_id']=$down_members['down_id'];
        $members['up_id']=$down_id;
        $this->update($members);

        $down_members['up_id']=$up_id;
        $down_members['down_id']=$id;
        $this->update($down_members);

        if($up_id!=-1){
            $up_members=$this->get_by_id($up_id)[0];
            $up_members['down_id']=$down_id;
            $this->update($up_members);
        }

        if($members['down_id']!=-2)
        {
            $down_down_members=$this->get_by_id($members['down_id'])[0];
            $down_down_members['up_id']=$id;
            $this->update($down_down_members);
        }
    }
}

?>