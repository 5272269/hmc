<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 表单
 */
class form extends MY_Controller {

	function __construct() {
	
		parent::_Mycontroller();
		$this->load->model('model_config');
		$this->load->model('info_model');
	}
  	
  	function show(){
  		if (!isset($_POST['unitid']) || empty($_POST['unitid'])) {
			show_msg('非法参数',-1);
		}
		

  		if (isset($_POST['dosubmit'])) {
  			$unitid = intval($_POST['unitid']);
			$table = $this->info_model->get_table($unitid);
			$fields = $this->model_config->get_config($table);
			$ziduan = $fields['info'];

			
			foreach ($ziduan as $k => $v) {
				if(!in_array($v['field'],array_keys($_POST))) continue;
				if ($v['type']=='checkbox')
				{//多选
					$checkbox = ','.implode(',',$_POST[$v['field']]).','; 
					$data[$v['field']] = $checkbox;
				} 
				
				else 
				{
					$data[$v['field']] = $_POST[$v['field']];
				}
			}
			$data['title'] = $_POST['title'];
			$data['unitid'] = $_POST['unitid'];
			$this->db->insert('model_'.$table,$data);
			show_msg('添加成功',-1);

  		}
  	}

}
/* End of file *.php */
/* Location: ./application/controllers/*.php */