<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// model配置
class Model_config extends Ci_Model{

	public function __construct(){
		
		parent::__construct();
	}

	/**
	 * 获取对应模型的数据
	 * config
	 */
	public function get_config($config='doc_1'){
		$arr = explode('_',$config);
		$id = $arr[1];
		$type = $arr[0];
		$sql = "SELECT * 
				FROM ".$this->db->dbprefix('models_config')." 
				WHERE id=".$id." AND type='".$type."'
				ORDER BY id DESC";
		$data = $this->db->query($sql)->row_array();
		if(!empty($data)){
			$data['info'] = json_decode($data['field'],TRUE);
		}
		return $data;
	}

	/**
	 * 获取对应表单模型的数据
	 * table 表
	 */
	public function get_data($table='doc_1'){
		$table = to_table($table);
		$sql = "SELECT * 
				FROM ".$table."
				ORDER BY id DESC";
		// echo $sql;
		$data = $this->db->query($sql)->result_array();
		return $data;
	}

	/**
	 * 更新表单数据的排序
	 * table 表  
	 * sortrank 值 
	 * $where 
	 */
	public function update_sort($table='doc_1', $sortrank, $where){

		if(empty($where)) return false;
		$table = to_table($type);
		
		return $this->db->update($table,array('sortrank'=>$sortrank),$where);

	}

	/**
	 * 特殊字段，re_select获取选项值
	 * int $cid 栏目id
	 */
	function get_re_select($cid){
		$sql = "SELECT *
				FROM ".$this->db->dbprefix('stepselect')."
				WHERE column_id = ".$cid." AND status = 1";
		$info = $this->db->query($sql)->row_array();

		if(!empty($info)){
			$sql = "SELECT *
					FROM ".$this->db->dbprefix('stepselect')."
					WHERE reid = ".$info['id']." AND status = 1
					ORDER BY id DESC";
			$select_info = $this->db->query($sql)->result_array();
		}
		else{
			$select_info = '';
		}

		return $select_info;
	}


}