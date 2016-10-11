<?php
class Contact_model extends CI_Model
{
	/**
	 *向contact表中插入$data
	 *@param $data
	 */
    public function insert($data)
    {
        $this->db->insert('contact', $data);
    }
    /**
     *根据createtime排序获取所有的contact
     */
    public function get_all_contact(){
    	$result=$this->db->order_by('createtime','desc')->get('contact')->result_array();
    	return $result;
    }
    /**
     *在contact删除符合id的数据
     *@param $id
     */
    public function delete($id){
        $this->db->where('id',$id)->delete('contact');
    }
}
?>