<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// 表单模型
class Form_model extends Ci_Model{

	public function __construct(){
		
		parent::__construct();
	}

	//获取表单模型列表
	public function get_form_list(){
		$sql = "SELECT * 
				FROM ".$this->db->dbprefix('models_config')."
				WHERE type='form'
				ORDER BY id DESC";
		$forms = $this->db->query($sql)->result_array();
		if(!empty($forms)){
			foreach ($forms as $key => $value) {
				$forms[$key]['info'] = json_decode($value['field']);
			}
		}
		return $forms;
	}

	//获取对应表单模型的数据
	public function get_form_data($table){
		$table = to_table($table);
		$sql = "SELECT * 
				FROM ".$table."
				ORDER BY id DESC";
		$data = $this->db->query($sql)->result_array();
		return $data;
	}

	

}