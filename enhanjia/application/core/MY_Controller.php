<?php

class MY_Controller extends CI_Controller {

	/*系统基本参数*/
	public $_G;
	public $_all_menu;
	public $_menus;
	public $_subs;

	/*重写构造方法*/
	function _Mycontroller() {

		parent::__construct();
		
		//获取所有栏目
		$sql = "SELECT *
				FROM ".$this->db->dbprefix('column')."
				WHERE status = '0'
				ORDER BY sort,id";
		$this->all_menu = $this->db->query($sql)->result_array();
		
		//重构栏目数组;
		foreach($this->all_menu as $v){
			$this->_menus[$v['id']] = $v; 
	 		$this->_subs[$v['reid']][] = $v['id'];
		}

		$this->_G['get'] = $this->input->get();

		//获取系统配置
		$sql = "SELECT *
				FROM ".$this->db->dbprefix('sysconfig')."
				ORDER BY id DESC";
		 $siteinfo= $this->db->query($sql)->result_array();
		 foreach ($siteinfo as $key => $value) {
		 	$siteinfolist[$value['var_name']] = $value['value'];
		 }
		 $this->_G['sysconf'] = $siteinfolist;

		 /*获得url分段数组*/
		 $this->_G['segs'] = $this->uri->segment_array();
		// var_dump($this->_G['sysconf']);die;

	}

	//调用标签方法
	function _service($method = 0, $params = array()){
		if(!$method) return false;

		$method = explode('_', $method);
		$model = array_shift($method);
		$method = implode('_', $method);

		//加载标签模块
		if(!property_exists($this, $model)
		&& file_exists(APPPATH.'models/index/'.$model.'_model.php')) $this->load->model('index/'.$model.'_model', $model);

		return $this->$model->_service($method, $params);
	}

}

?>
