<?php
define('TIMEOUT_LIMIT', 1440);
class Account_model extends CI_Model
{
    /**
     *根据username获取account信息
     *@param$name
     */
    public function get_by_name($name)
    {
        return $this->db->where('username',$name)->join('role','role_id=account.role')->get('account')->result_array();
    }

    /**
     *根据id获取account信息
     *@param$name
     */
    public function get_by_id($id)
    {
        return $this->db->where('account.id',$id)->join('role','role_id=account.role')->get('account')->result_array();
    }

    /**
     *根据id获取account信息
     *@param$name
     */
    public function delete($id)
    {
        return $this->db->where('id',$id)->delete('account');
    }

    /**
     *根据id获取account信息
     *@param$name
     */
    public function update($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('account',$data);
    }

    /**
     *将$data信息插入account
     *@param$data
     */
    public function insert($data){
    	$this->db->insert('account',$data);
    }

    /**
     *插入一条account
     *@param$name
     */
    public function loginAuthorize($controller_name,$feature_name)
    {
        /*判断是否是不需要验证的方法*/
    	if ($feature_name == "index"||$feature_name == "news_detail"||$feature_name=="projects_detail"||$feature_name=="login") {
            return TRUE;
        }
        /*判断用户是否登陆*/
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            return FALSE;
        }
        /*判断登陆用户是否超时*/
        $current = time();
        $lastActiveTime = $this->session->userdata('lastActiveTime');
        $timeSpan = $current - $lastActiveTime;
        if ($timeSpan > TIMEOUT_LIMIT) {
            $this->logout();
            return FALSE;
        }
        /*更新最新活动时间*/
        $this->session->set_userdata('lastActiveTime', $current);
        $role=$this->get_by_id($user_id)[0]['role'];
        switch ($role) {
            case '4':
                if ($controller_name == "home"&&$feature_name!="index"||$controller_name == "intro"||$controller_name=="members"||$controller_name=="teambuild"||$controller_name=="contact") {
                    return FALSE;
                }        
                break;
            case '3':
                if ($controller_name == "home"&&$feature_name!="index"||$controller_name == "intro"||$controller_name=="contact") {
                    return FALSE;
                }    
                break;
            case '2':
                break;
            case '1':
                break;
        }
        return $user_id;
    }

    public function get_all_accounts(){
        return $this->db->order_by('id','ASE')->join('role','role_id=account.role')->get('account')->result_array();
    }

    public function get_all_account_roles(){
        return $this->db->get('role')->result_array();
    }

    public function logout(){
        show_error('登陆超时，请重新登陆！');
    }
}

?>