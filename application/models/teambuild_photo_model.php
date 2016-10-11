<?php
class TeamBuild_photo_model extends CI_Model
{
    /**
     *向teambuild_photo表插入$data
     *@param $data
     */
    public function insert($data)
    {
                /*获取未插入前第一个正在进行的项目id*/
        $down_id=$this->teambuild_photo->get_top_id();
        /*判断是否存在正在进行的项目*/
        $data['up_id']=-1;
        $count=count($down_id);
        if(count($down_id)==0){
            $data['down_id']=-2;
        }else{
            $data['down_id']=$down_id[0]['id'];
        }
        /*插入新的项目*/ 
        $this->db->insert('teambuild_photo',$data);
        $insert_id=$this->db->insert_id();
        if(count($down_id)!=0){
            $data=$this->teambuild_photo->get_by_id($data['down_id'])[0];
            $data['up_id']=$insert_id;
            $this->teambuild_photo->update($data);
        }
    }

    /**
     *在update表中更新$data
     *@param $data
     */
    public function update($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('teambuild_photo',$data);
    }

    /**
     *获取所有的轮播图信息
     */
    public function get_all_teambuild_photo(){
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
     *获取第一个轮播图的信息
     */
    public function get_top_id(){
        $query=$this->db->where('up_id',-1)->get('teambuild_photo')->result_array();
        return $query;
    }
    
    /**
     *根据$id获取该轮播图信息
     *@param $id
     */
    public function get_teambuild_photo_detail($id){
        $query=$this->db->where('id',$id)
        ->get('teambuild_photo')->result_array();
        return $query;
    }
    
    /**
     *根据$id删除该轮播图，并删除服务器上的图片
     *@param $id
     */
    public function delete_teambuild_photo($id){
        $teambuild_photo=$this->get_by_id($id)[0];
        $up_id=$teambuild_photo['up_id'];
        $down_id=$teambuild_photo['down_id'];
        $this->db->where('id',$id)->delete('teambuild_photo');
        $save_dir=dirname(dirname(dirname(__FILE__)))."/documents/teambuild_photo/";
        $save_path=iconv("UTF-8", "GBK", $save_dir.$teambuild_photo['pic_name']);
        if (file_exists($save_path)){ 
            unlink($save_path);
        }
        
        if($up_id!=-1){
            $up_teambuild_photo=$this->get_by_id($up_id)[0];
            $up_teambuild_photo['down_id']=$down_id;
            $this->update($up_teambuild_photo);
        }
        if($down_id!=-2){
            $down_teambuild_photo=$this->get_by_id($down_id)[0];
            $down_teambuild_photo['up_id']=$up_id;
            $this->update($down_teambuild_photo);    
        }
    }
    
    /**
     *根据$id获取该轮播图
     *@param $id
     */
    public function get_by_id($id){
        $query=$this->db->where('id',$id)->get('teambuild_photo')->result_array();
        return $query;
    }

    /**
     *根据$name获取该轮播图
     *@param $name
     */
    public function get_by_pic_name($name){
        $query=$this->db->where('pic_name',$name)->get('teambuild_photo')->result_array();
        return $query;
    }

    /**
     *根据$id向上调整轮播图位置
     *@param $id
     */
    public function up_teambuild_photo($id){
        $teambuild_photo=$this->get_by_id($id)[0];
        if($teambuild_photo['up_id']==-1){
            return;
        }
        $down_id=$teambuild_photo['down_id'];
        $up_id=$teambuild_photo['up_id'];

        $up_teambuild_photo=$this->get_by_id($up_id)[0];

        $teambuild_photo['up_id']=$up_teambuild_photo['up_id'];
        $teambuild_photo['down_id']=$up_id;
        $this->update($teambuild_photo);

        $up_teambuild_photo['up_id']=$id;
        $up_teambuild_photo['down_id']=$down_id;
        $this->update($up_teambuild_photo);

        if($down_id!=-2){
            $down_teambuild_photo=$this->get_by_id($down_id)[0];
            $down_teambuild_photo['up_id']=$up_id;
            $this->update($down_teambuild_photo);
        }

        if($teambuild_photo['up_id']!=-1)
        {
            $up_up_teambuild_photo=$this->get_by_id($teambuild_photo['up_id'])[0];
            $up_up_teambuild_photo['down_id']=$id;
            $this->update($up_up_teambuild_photo);
        }

    }
    
    /**
     *根据$id向上调整轮播图位置
     *@param $id
     */
    public function down_teambuild_photo($id){
        $teambuild_photo=$this->get_by_id($id)[0];
        if($teambuild_photo['down_id']==-2){
            return;
        }
        $down_id=$teambuild_photo['down_id'];
        $up_id=$teambuild_photo['up_id'];

        $down_teambuild_photo=$this->get_by_id($down_id)[0];

        $teambuild_photo['down_id']=$down_teambuild_photo['down_id'];
        $teambuild_photo['up_id']=$down_id;
        $this->update($teambuild_photo);

        $down_teambuild_photo['up_id']=$up_id;
        $down_teambuild_photo['down_id']=$id;
        $this->update($down_teambuild_photo);

        if($up_id!=-1){
            $up_teambuild_photo=$this->get_by_id($up_id)[0];
            $up_teambuild_photo['down_id']=$down_id;
            $this->update($up_teambuild_photo);
        }

        if($teambuild_photo['down_id']!=-2)
        {
            $down_down_teambuild_photo=$this->get_by_id($teambuild_photo['down_id'])[0];
            $down_down_teambuild_photo['up_id']=$id;
            $this->update($down_down_teambuild_photo);
        }
    }
}

?>