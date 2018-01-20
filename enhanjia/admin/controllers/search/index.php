<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*搜索
*/
class index extends MY_Controller {

	function __construct() {
		parent::_Mycontroller();
		parent::check_login();
	}
	
	/*更新搜索*/
	function update() {
		$typeid = $_GET['typeid'] ? $_GET['typeid'] : '';
		if(empty($typeid)){
			 show_msg("无分类id",site_url('content/column/index'));
		}
		$sql = "SELECT id,info_model,ispart
				FROM ".$this->db->dbprefix('column')." 
		        WHERE searchtype = '$typeid' AND info_model !=0 ";
		$rst = $this->db->query($sql)->result_array();

		//取各个表的数据，并同步到搜索表
		$this->load->model('info_model','info_model');
		foreach ($rst as $k => $v) {
			$table= $v['ispart'].'_'.$v['info_model'];
			$sql_s = "SELECT id,unitid,title,pubdate,keywords,description FROM ".to_table($table)." 
	  		    WHERE status = 1 AND unitid = ".$v['id'];
	  		$ids[] = $this->db->query($sql_s)->result_array();
	  		foreach ($ids as $key => $value) {
	  			foreach ($value as $_k => $_v) {
	  				$this->info_model->search_api($_v['id'],$_v);
	  			}
	  		}
	  		unset($ids);
		}
		//删除更改类型的搜索数据
		$sql_s = "SELECT id
				FROM ".$this->db->dbprefix('column')." 
		        WHERE searchtype = 127 AND info_model !=0 ";
		$rst_s = $this->db->query($sql_s)->result_array();
		foreach($rst_s as $k=>$v){
			$this->db->delete('search',array('typeid'=>$v['id']));
		}
		

		show_msg("完成重建搜索信息",site_url('content/column/index'));
	}
}
/* End of file index.php */