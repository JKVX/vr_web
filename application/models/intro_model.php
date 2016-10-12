<?php
class Intro_model extends CI_Model
{
	/**
	 *lab_intro表中更新信息
	 *@param$data
	 */
    public function update_lab_intro($data)
    {
        $this->db->where('id','1');
        $this->db->update('lab_intro', $data);
    }
	/**
	 *获取lab_intro信息
	 */
    public function get_lab_intro(){
        return $this->db->where('id','1')->get('lab_intro')->result_array()[0];
    }
    /**
     *获取lab_slogan信息
     */
    public function get_lab_slogan(){
        return $this->db->where('id','2')->get('lab_intro')->result_array()[0];
    }
    /**
     *lab_intro表中更新信息
     *@param$data
     */
    public function update_lab_slogan($data)
    {
        $this->db->where('id','2');
        $this->db->update('lab_intro', $data);
    }

    public function update($data){
        $this->db->where('id',$data['id'])->update('lab_intro',$data);
    }

    public function get_by_id($id){
        return $this->db->where('id',$id)->get('lab_intro')->result_array()[0];
    }
}

?>