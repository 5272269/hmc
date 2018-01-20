<?php
/**
 * page_model
 */
class Page_model extends Ci_Model {
  
  		function _service($method = 0, $params = array()){
			$this->load->model('model_config');
			$this->load->model('info_model');

			switch($method){
				case 'info':
					$id   = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 1;
					$where = isset($params['where']) ? $params['where'] : '';
					return self::info($id,$where);
					break;
				case 'block':
					$id = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 1;
					$style = isset($params['style']) && intval($params['style']) ? intval($params['style']) : 0;
					return self::block($id,$style);
				default:
					return false;
			}
		}

		function info($id,$where){
			$table = $this->info_model->get_table($id);
			$fields = $this->model_config->get_config($table);
			$ziduan = $fields['info'];
			$page_id = $id;

			if(!empty($where)){
				$where_sql = " unitid = ".$page_id." AND ".$where;
			}
			else{
				$where_sql = " unitid = ".$page_id;
			}

			$sql = " SELECT * 
					 FROM ".$this->db->dbprefix('model_'.$table)." 
					 WHERE ".$where_sql.
					 " LIMIT 1 ";
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
  		 * 碎片处理
  		 * @param int $id 碎片id
  		 * @param int $style 碎片输出形式，默认为0，1输出纯文本，0输出编辑器样式的文本
		 */
		function block($id,$style) {
			$block_info = $this->db->get_where('block',array('id'=>$id,'status'=>'1'))->row_array();
			$info = $this->db->get_where('addonarticle',array('aid'=>$block_info['aid']))->row_array();

			if($style == 1){
				$body = strip_tags(trim($info['body']));
			}
			else{
				$body = $info['body'];
			}
			return $body;
		}



	    public function display($parameter=array()) {

			$columninfo = $this->_G['params'];
	        if(preg_match('/^(templates\/shtml\/).+((\.shtml)|(\.html)|(\.htm))$/',$columninfo['show_template'])){
	            $display=substr($columninfo['show_template'], 16);
	            $this->template->display($display);
	        }else{
	            $this->template->display('application/show_page_detail.shtml');
	        }
	    }
}