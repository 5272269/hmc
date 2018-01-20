<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 网站搜索model
 */ 
class search_model extends Ci_Model{
	/**
	 * 添加到全站搜索、修改已有内容
	 * @param $typeid
	 * @param $id
	 * @param $data
	 * @param $text 不分词的文本
	 * @param $adddate 添加时间
	 * @param $iscreateindex 是否是后台更新全文索引
	 */
	public function update_search($typeid ,$type, $id = 0,$data = '',$text = '',$adddate = 0, $iscreateindex=0) {
		
		$this->load->library('segment','segment');
		//分词结果
		if ($type >= 127){
			return true;
		}
		$fulltext_data = $this->segment->get_keyword($this->segment->split_result($data));

		$fulltext_data = $text.' '.$fulltext_data;


		if(!$iscreateindex) {
			
			$this->db->select('searchid');
			$r = $this->db->get_where('search',array('typeid'=>$typeid,'id'=>$id));
		}
		if($r->num_rows() > 0) {
			
			$searcharray = $r->row_array();
			$searchid = $searcharray['searchid'];
			$this->db->update('search',array('data'=>$fulltext_data,'adddate'=>$adddate,'type'=>$type),array('typeid'=>$typeid,'id'=>$id));
		} else {
			
			$this->db->insert('search',array('typeid'=>$typeid,'id'=>$id,'adddate'=>$adddate,'data'=>$fulltext_data,'type'=>$type));
			$searchid = $this->db->insert_id();
		}
		return $searchid;
	}
	/**
	 * 删除全站搜索内容
	 */
	public function delete_search($typeid ,$id) {
		
		$this->db->delete('search',array('typeid'=>$typeid,'id'=>$id));
	}
	/**
	 * 搜索类型
	 */
	public function get_searchtype(){
		
		$types = array(
				'127'	=> '非搜索',
				'1'		=> '搜索'	
		);
		return $types;
	}
}