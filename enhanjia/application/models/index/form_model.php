<?php
/**
 * 模板标签类 
 */
	class Form_model extends Ci_Model {
	   	function _service($method = 0, $params = array()){
			$this->load->model('model_config');
			$this->load->model('info_model');

			switch($method){
				case 'info':
					$id      = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 1;
					$tableid = isset($params['tableid']) && intval($params['tableid']) ? intval($params['tableid']) : 1;
					return self::info($id,$tableid);
					break;
				case "option":
					$id   = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 1;
					$field   = isset($params['field']) && remove_xss($params['field']) ? remove_xss($params['field']) : 'id';
					return self::option($id,$field);
					break;
				case "form_info":
					$modelid   = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 1;
					return self::form_info($modelid);
					break;
				default:
					return false;
			}
		}

		
		/**
		 * 获取表单的内容 
		 * tableid 表单数据库的id
		 * id 数据的id
		 */
		function info($id,$tableid){
			if(!$id || !$tableid) return;
			$table = 'form_'.$tableid;
			$fields = $this->model_config->get_config($table);
			$ziduan = $fields['info'];
			$form_id = $id;

			$sql = " SELECT * 
				FROM ".$this->db->dbprefix('model_'.$table)." 
				WHERE id = ".$form_id." AND status = 1
				LIMIT 1 ";
			$result = $this->db->query($sql)->row_array();

			foreach($ziduan as $k => $v){
				if($v['type']=='pic')
				{
					$data['info'][$v['field']]   =	$this->info_model->getAttinfo($result[$v['field']]);
				} 
				elseif ($v['type']=='pics')
				{
					$pics = explode(',', $result[$v['field']]);
					foreach($pics as $key=>$val){
						$data['info'][$v['field']][$key]  =	$this->info_model->getAttinfo($val);
					}
				} 
				elseif ($v['type']=='editor')
				{
					
					$data['info'][$v['field']] = $this->info_model->getUeditor($result[$v['field']]);

				} 
				elseif($v['type']=='file') 
				{
					$data['info'][$v['field']]   =	$this->info_model->get_file_info($result[$v['field']]);
				} 
				elseif($v['type']=='files')
				{
					$files = explode(',', $result[$v['field']]);
					foreach($files as $key=>$val){
						$data['info'][$v['field']][$key]  =	$this->info_model->get_file_info($val);
					}
				}
				elseif($v['type']=='select')
				{
					$data['info'][$k] = $v['value'];
					$data['info'][$v['field']] = $result[$v['field']];
				}
				else 
				{
					//处理其他字段
					$data['info'][$v['field']] = $result[$v['field']];
				}
			}


			$data['info'] = array_merge($result, $data['info']);
			return $data;
		}

		/**
		 * $id 栏目ID
		 * field 字段名
		 * select radio checkbox
		*/
		function option($id, $field){
			if(!$id) return;
			$table = $this->info_model->get_table($id);
			$fields = $this->model_config->get_config($table);
			$ziduan = $fields['info'];
			foreach ($ziduan as $key => $value) {
				if($value['field']==$field){
					$data[$value['field']] = $value['value'];
				}
			}
			return $data;
		}

		/**
		 * 获得表单
		 * @param int $modelid 模型id
		 * @return array 模型中字段信息
		 */
		public function form_info($modelid){
			$form_info = $this->db->select('*')
								  ->from('models_config')
								  ->where('id = '.$modelid)
								  ->get()
								  ->row_array();
			return json_decode($form_info['field'],true);
		}


	    public function display($parameter=array()) {
			
	    	$columninfo = $this->_G['params'];
			// $pattern = '/^\d+$/';
			// //详情页
			// if(!empty($parameter['parameter'][0])&&preg_match($pattern, $parameter['parameter'][0])){
				
	            if(preg_match('/^(templates\/shtml\/).+((\.shtml)|(\.html)|(\.htm))$/',$columninfo['show_template'])){
	                $display=substr($columninfo['show_template'], 16);
	                $this->template->display($display,$data);
	                return;
	            }else{
	                $this->template->display('application/form_content.shtml',$data);
	                return;
	            }
					
			// }
			
	  //       if(preg_match('/^(templates\/shtml\/).+((\.shtml)|(\.html)|(\.htm))$/',$columninfo['list_template'])){
	  //           $display=substr($columninfo['list_template'], 16);
	  //           $this->template->display($display,$data);
	  //       }else{
	  //           $this->template->display('application/form_list.shtml',$data);
	  //       }
			
	    }
}