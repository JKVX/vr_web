<?php
class Projects_model extends CI_Model
{
    /**
     *将$data添加到projects表
     *@param $data
     */
    public function insert($data)
    {
        $this->db->insert('projects',$data);
    }

    public function delete_pic($id){
        $pic=$this->get_pic_by_id($id)[0];
        $this->db->where('pic_id',$id)->delete('projects_picture');
        $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/projects/".$pic['projects_id']."/".$pic['pic_name'];
        unlink($save_dir);
    }
    public function insert_pic($data){
        
        $this->db->insert('projects_picture',$data);
    }

    public function get_pic($id,$status)
    {
        $query=$this->db->where('projects_id',$id)->where('status',$status)->get('projects_picture')->result_array();
        return $query;
    }

    public function get_pic_by_id($id){
        $query=$this->db->where('pic_id',$id)->get('projects_picture')->result_array();
        return $query;
    }
    
    public function get_all_medias($projects_id)
    {
        $query=$this->db->where('projects_id',$projects_id)->order_by('status','ASE')->get('projects_picture')
        ->result_array();
        return $query;
    }
    /**
     *在projects表中更新$data信息
     *@param $data
     */
    public function update($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('projects',$data);
    }
    /**
     *根据id获取projects
     *@param $id
     */
    public function get_by_id($id){
        $query=$this->db->where('id',$id)->get('projects')->result_array();
        return $query;
    }
    /**
     *获取第一个projects
     */
    public function get_top_id($status){
        $query=$this->db->where('up_id',-1)->where('status',$status)->get('projects')->result_array();
        return $query;
    }

    /**
     *获取所有的未完成的项目
     */
    public function get_all_u_projects(){
        $id=$this->get_top_id(0);
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
     *获取所有的已完成的项目
     */
    public function get_all_f_projects(){
        $id=$this->get_top_id(1);
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
     *根据id删除projects
     *@param $id
     */
    public function delete_projects($id){
        $projects=$this->get_by_id($id)[0];
        $up_id=$projects['up_id'];
        $down_id=$projects['down_id'];
        $this->db->where('id',$id)->delete('projects');
        if($up_id!=-1){
            $up_projects=$this->get_by_id($up_id)[0];
            $up_projects['down_id']=$down_id;
            $this->update($up_projects);
        }
        if($down_id!=-2){
            $down_projects=$this->get_by_id($down_id)[0];
            $down_projects['up_id']=$up_id;
            $this->update($down_projects);    
        }
        $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/projects/".$id;
        $this->deldir($save_dir);
    }


    public function deldir($dir) {
        //先删除目录下的文件：
        $dh=opendir($dir);
        while ($file=readdir($dh)) {
            if($file!="." && $file!="..") {
                $fullpath=$dir."/".$file;
                if(!is_dir($fullpath)) {
                    unlink($fullpath);
                } else {
                    deldir($fullpath);
                }
            }
        }
 
        closedir($dh);
        //删除当前文件夹：
        if(rmdir($dir)) {
            return true;
        }else {
            return false;
        }
    }

    /**
     *根据id向上调整projects位置
     *@param $id
     */
    public function up_projects($id){
        $projects=$this->get_by_id($id)[0];
        if($projects['up_id']==-1){
            return;
        }
        $down_id=$projects['down_id'];
        $up_id=$projects['up_id'];

        $up_projects=$this->get_by_id($up_id)[0];

        $projects['up_id']=$up_projects['up_id'];
        $projects['down_id']=$up_id;
        $this->update($projects);

        $up_projects['up_id']=$id;
        $up_projects['down_id']=$down_id;
        $this->update($up_projects);

        if($down_id!=-2){
            $down_projects=$this->get_by_id($down_id)[0];
            $down_projects['up_id']=$up_id;
            $this->update($down_projects);
        }

        if($projects['up_id']!=-1)
        {
            $up_up_projects=$this->get_by_id($projects['up_id'])[0];
            $up_up_projects['down_id']=$id;
            $this->update($up_up_projects);
        }

    }
    /**
     *根据id向下调整projects的位置
     *@param $id
     */
    public function down_projects($id){
        $projects=$this->get_by_id($id)[0];
        if($projects['down_id']==-2){
            return;
        }
        $down_id=$projects['down_id'];
        $up_id=$projects['up_id'];

        $down_projects=$this->get_by_id($down_id)[0];

        $projects['down_id']=$down_projects['down_id'];
        $projects['up_id']=$down_id;
        $this->update($projects);

        $down_projects['up_id']=$up_id;
        $down_projects['down_id']=$id;
        $this->update($down_projects);

        if($up_id!=-1){
            $up_projects=$this->get_by_id($up_id)[0];
            $up_projects['down_id']=$down_id;
            $this->update($up_projects);
        }

        if($projects['down_id']!=-2)
        {
            $down_down_projects=$this->get_by_id($projects['down_id'])[0];
            $down_down_projects['up_id']=$id;
            $this->update($down_down_projects);
        }
    }

    /**
     *根据id完成项目
     *@param $id
     */
    public function finish_projects($id){
        $projects=$this->get_by_id($id)[0];
        
        $up_id=$projects['up_id'];
        $down_id=$projects['down_id'];
        if($up_id!="-1"){
            $up_projects=$this->get_by_id($up_id)[0];
            $up_projects['down_id']=$down_id;
            $this->update($up_projects);
        }
        if($down_id!="-2"){
            $down_projects=$this->get_by_id($down_id)[0];
            $down_projects['up_id']=$up_id;
            $this->update($down_projects);
        }

        $projects['status']=1;
        $projects['up_id']=-1;
        $down_id=$this->projects->get_top_id(1);
        $count=count($down_id);
        if(count($down_id)==0){
            $projects['down_id']=-2;
        }else{
            $projects['down_id']=$down_id[0]['id'];
        }
        /*插入新的项目*/
        $this->projects->update($projects);
        
        if(count($down_id)!=0){
            $data=$this->projects->get_by_id($projects['down_id'])[0];
            $data['up_id']=$id;
            $this->projects->update($data);
        }

        /*$projects=$this->get_by_id($id)[0];
        $down_id=$projects['down_id'];
        $up_id=$projects['up_id'];
        if($up_id!=-1&&$up_id!=-2){
            $up_projects=$this->get_by_id($up_id)[0];
            $up_projects['down_id']=$down_id;
            $this->update($up_projects);
        }
        if($down_id!=-2&&$down_id!=-3){
            $down_projects=$this->get_by_id($down_id)[0];
            $down_projects['up_id']=$up_id;
            $this->update($down_projects);    
        }
        $mid_id=$this->get_mid_id();
        if(count($mid_id)!=0){
            $projects['up_id']=-2;
            $projects['down_id']=$mid_id[0]['id'];
            $this->update($projects);
            $mid_projects=$this->get_by_id($mid_id[0]['id'])[0];
            $mid_projects['up_id']=$id;
            $this->update($mid_projects);
        }else{
            $projects['up_id']=-2;
            $projects['down_id']=-3;
            $this->update($projects);
        }*/
    }
}

?>