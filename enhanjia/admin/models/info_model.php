<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// 信息模型
class Info_model extends Ci_Model{

	public function __construct(){
		
		  parent::__construct();
		
	}
	
	/**
	 * 通过栏目id获取对应模型的数据库
	 */
	function get_table($cid){
		if(!$cid) return false; 
		$id = $cid;
		$sql = "SELECT info_model,ispart
				FROM ".$this->db->dbprefix('column')."
				WHERE id = ".$id."
				";
		$data = $this->db->query($sql)->row_array();
		$mid = $data['info_model'];
		$part = $data['ispart'];
		$table =$part.'_'.$mid;
		return $table;
	}
	/**
	 * 通过栏目id获取对应模型的id
	 */
	function get_mid($cid){
		if(!$cid) return false; $id = $cid;
		$sql = "SELECT info_model
				FROM ".$this->db->dbprefix('column')."
				WHERE id = ".$id."
				";
		$mid = $this->db->query($sql)->row_array();
		$id = $mid['info_model'];
		return $id;
	}
	/**
	 * 信息列表
	 */
	function get_column_list(){
		$sql = "SELECT ispart,info_model,reid
    		FROM ".$this->db->dbprefix('column')." 
  		    WHERE reid != '0' ";
		$rst = $this->db->query($sql)->result_array();
		foreach ($rst as $key => $value) {
			$arr[$key]= $value['ispart'].'_'.$value['info_model'];
			$arr = array_unique($arr);//
		}
		return $arr;
	}

	/**
	 * 获取对应表单模型的数据
	 * table 表
	 */
	public function get_datalist($cid,$table='doc_1'){
		$unitid = $cid;
		$table = to_table($table);
		$sql = "SELECT * 
				FROM ".$table."
				WHERE unitid = ".$unitid." AND status='0' OR status='1' 
				ORDER BY id DESC
				";
		// echo $sql;
		$data = $this->db->query($sql)->result_array();
		return $data;
	}
	
	/**
	 * column
	 */
	public function get_column($cid){
		if(!$cid) return false;
		$sql = "SELECT name,ispart 
				FROM ".$this->db->dbprefix('column')."
				WHERE id = ".$cid." 
				";
		// echo $sql;
		$data = $this->db->query($sql)->row_array();

		return $data;
	}

	/**
	 * 根据图片id获取图片信息
	 */
	function getAttinfo($aid){
	
		if(empty($aid)) return ;
		
		$sql ="SELECT * FROM ".$this->db->dbprefix('attachment')." 
			  WHERE aid = $aid 
			  LIMIT 1";
		$info = $this->db->query($sql)->row_array();
		$thumbfilename = explode('.', $info['filename']);
		$thumbfilename_str = $thumbfilename['0'].'_thumb.'.$thumbfilename['1'];
		$info['thumbfilename'] = base_url().$thumbfilename_str;
		$info['filename'] = base_url().$info['filename'];
		return $info;
	}

	/**
	 * 根据图片id获取图片信息
	 */
	function get_file_info($aid){
	
		if(empty($aid)) return ;
		
		$sql ="SELECT * FROM ".$this->db->dbprefix('attachment')." 
			  WHERE aid = $aid 
			  LIMIT 1";
		$info = $this->db->query($sql)->row_array();
		return $info;
	}



	/**
	 * 获取编辑器里的数据
	 */
	function getUeditor($aid){
		if(empty($aid)) return ;
		$sql ="SELECT * FROM ".$this->db->dbprefix('addonarticle')." 
			  WHERE aid = ".$aid."
			  LIMIT 1";
		$info = $this->db->query($sql)->row_array();
		return $info['body'];
	}

	/**
	 * 根据新闻的id取内容
	 * id 新闻id
	 * table 表名
	 */
	function getNewsInfo($id, $table){
		if(empty($id) || empty($table)) return;
		$pics = $news = array();
		//查doc_x
		$sql ="SELECT * FROM ".to_table($table)." 
			  WHERE id = ".$id."
			  ";
		$info = $this->db->query($sql)->row_array();
		return $info;
	}

	/**
	 * 搜索
	 */
	public function search_api($id = 0, $data = array(), $action = 'update') {
		$this->load->model('search_model','search_model');
		$typeid = $data['unitid'];

			
		$this->load->model('column_model');
		$result = $this->column_model->get_column_info($typeid);
		$type = $result['searchtype'];
		if($action == 'update') {
			$fulltextcontent = $data['title'].$data['description'];
			$fulladdkeywords = addslashes($data['title'].' '.addslashes($data['keywords']));
			$this->search_model->update_search($typeid, $type, $id, $fulltextcontent, $fulladdkeywords, $data['pubdate']);
		
		} elseif($action == 'delete') {
			
			$this->search_model->delete_search($typeid ,$id);
		}
	}
}