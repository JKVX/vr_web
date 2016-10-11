<?php
class News_model extends CI_Model
{
    /**
     *将$data插入news表中
     *@param $data
     */
    public function insert($data)
    {
        $this->db->insert('news', $data);
    }

    /**
     *将news表中的$data记录更新
     *@param $data
     */
    public function update($data)
    {
        $this->db->where('id',$data['id']);
        $this->db->update('news',$data);
    }

    /**
     *获取所有新闻内容
     */
    public function get_all_news(){
        $id=$this->get_top_id();
        $result=array();
        /*判断是否存在正在进行的项目*/
        if(count($id)!=0){
            /*判断是否找到最后一个正在进行的项目*/
            $down_id=$id[0]['id'];
            $count=0;
            while ($down_id!=-2) {
                $tmp_result=$this->get_by_id($down_id)[0];
                $result[$count++]=array('id'=>$tmp_result['id'],'news_title'=>$tmp_result['news_title']);
                $down_id=$tmp_result['down_id'];
            }            
        }
        return $result;
    }

    /**
     *获取第一则news
     */
    public function get_top_id(){
        $query=$this->db->where('up_id',-1)->get('news')->result_array();
        return $query;
    }

    /**
     *根据news的id获取news详情
     *@param $data
     */
    public function get_news_detail($data){
        $query=$this->db->where('id',$data['id'])
        ->get('news')->result_array();
        return $query;
    }

    /**
     *根据news的id删除news
     *@param $id
     */
    public function delete_news($id){
        $news=$this->get_by_id($id)[0];
        $up_id=$news['up_id'];
        $down_id=$news['down_id'];
        $this->db->where('id',$id)->delete('news');
        if($up_id!=-1){
            $up_news=$this->get_by_id($up_id)[0];
            $up_news['down_id']=$down_id;
            $this->update($up_news);
        }
        if($down_id!=-2){
            $down_news=$this->get_by_id($down_id)[0];
            $down_news['up_id']=$up_id;
            $this->update($down_news);    
        }
    }

    /**
     *根据news的id获取该则news
     *@param $id
     */
    public function get_by_id($id){
        $query=$this->db->where('id',$id)->get('news')->result_array();
        return $query;
    }

    /**
     *根据news的id向上调整该news
     *@param $id
     */
    public function up_news($id){
        $news=$this->get_by_id($id)[0];
        if($news['up_id']==-1){
            return;
        }
        $down_id=$news['down_id'];
        $up_id=$news['up_id'];

        $up_news=$this->get_by_id($up_id)[0];

        $news['up_id']=$up_news['up_id'];
        $news['down_id']=$up_id;
        $this->update($news);

        $up_news['up_id']=$id;
        $up_news['down_id']=$down_id;
        $this->update($up_news);

        if($down_id!=-2){
            $down_news=$this->get_by_id($down_id)[0];
            $down_news['up_id']=$up_id;
            $this->update($down_news);
        }

        if($news['up_id']!=-1)
        {
            $up_up_news=$this->get_by_id($news['up_id'])[0];
            $up_up_news['down_id']=$id;
            $this->update($up_up_news);
        }

    }

    /**
     *根据news的id向上调整该news
     *@param $id
     */
    public function down_news($id){
        $news=$this->get_by_id($id)[0];
        if($news['down_id']==-2){
            return;
        }
        $down_id=$news['down_id'];
        $up_id=$news['up_id'];

        $down_news=$this->get_by_id($down_id)[0];

        $news['down_id']=$down_news['down_id'];
        $news['up_id']=$down_id;
        $this->update($news);

        $down_news['up_id']=$up_id;
        $down_news['down_id']=$id;
        $this->update($down_news);

        if($up_id!=-1){
            $up_news=$this->get_by_id($up_id)[0];
            $up_news['down_id']=$down_id;
            $this->update($up_news);
        }

        if($news['down_id']!=-2)
        {
            $down_down_news=$this->get_by_id($news['down_id'])[0];
            $down_down_news['up_id']=$id;
            $this->update($down_down_news);
        }
    }
}

?>