<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	Class doc_model extends Ci_Model {

        public $parameter;
        
		function _service($method = 0, $params = array()){
			$this->load->model('model_config');
			$this->load->model('info_model');

			switch($method){
				case 'listinfo':
					$id   = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 1;
					$num  = isset($params['num']) && intval($params['num']) ? intval($params['num']) : 0;
					$page = isset($params['page']) && intval($params['page']) ? intval($params['page']) : 1;
					$content = isset($params['content']) && intval($params['content']) ? intval($params['content']) : 0;
					$where = isset($params['where']) && remove_xss($params['where']) ? remove_xss($params['where']) : '1';
					$sort = isset($params['sort']) ? $params['sort'] : 'id DESC';
					$uri = isset($params['uri']) ? remove_xss($params['uri']) : '';
					return self::listinfo($id, $num, $page, $content, $where, $sort, $uri);
					break;
				case 'view':
					$id   = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 1;
					$unitid  = isset($params['unitid']) && intval($params['unitid']) ? intval($params['unitid']) : $this->_G['params']['id'];
					return self::view($id,$unitid);
					break;
				case "option":
					$id   = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 1;
					$field   = isset($params['field']) && remove_xss($params['field']) ? remove_xss($params['field']) : 'id';
					return self::option($id,$field);
					break;
				default:
					return false;
			}
		}


		/**
		 * $id 栏目ID
		 * num  数量
		 * page 页数
		 * sort 排序
		*/
		function listinfo($id = 1, $num = 0, $page = 1, $content = 0, $where = '1', $sort = 'id DESC', $uri = ''){
			$table = $this->info_model->get_table($id);
			$fields = $this->model_config->get_config($table);
			$ziduan = $fields['info'];
			foreach ($ziduan as $key => $value) {
				$field_arr[$value['field']] = $value['type'];
				if($value['type']=='select' || $value['type']=='checkbox' || $value['type']=="radio"){
					$data['option'][$value['field']] = $value['value'];
				}
			}

			//列表分页处理
			$url=  '';
			$unitid  = $id;
			$page_size = $num; //个数

			//如果有条数，才返回页数信息
			$limit = '';
			if($page_size){
				$this->load->helper('page');
				$page = toLimitLng($page, 1);
				$offset	= ($page - 1) * $page_size;
				$page_url = $url.'?'.rand(10000,99999).time();

				$sql = "SELECT 1
						FROM ".$this->db->dbprefix('model_'.$table)." 
						WHERE unitid = ".$unitid." AND status = 1 AND $where
						ORDER BY id DESC";
				$rst = $this->db->query($sql);
				$data['pages'] = page2($page_url, $rst->num_rows(), $page_size, $page ,$where);

				$limit = "LIMIT $offset,$page_size";
			}
			

			$sql = "SELECT *
					FROM ".$this->db->dbprefix('model_'.$table)." 
					WHERE unitid = ".$unitid." AND status = 1 AND $where
					ORDER BY ".$sort."
					$limit";
			$list = $this->db->query($sql)->result_array();
			
			foreach($list as $key => $value){//数组循环
				foreach($value as $k => $v){//循环每个字段，并判断类型，处理
					if(in_array($k,array('title','id','status','pubdate','unitid'))) continue;
					// echo $field_arr[$k];

					switch($field_arr[$k]){
						case 'pic':
							$data['infolist'][$key][$k] = $this->info_model->getAttinfo($v);
							break;
						case 'pics':
							$pics = explode(',', $v);
							foreach($pics as $key=>$val){
								$data['infolist'][$key][$k]  =	$this->info_model->getAttinfo($val);
							}
							break;
						case 'editor':
							if($content)
							$data['infolist'][$key][$k] = $this->info_model->getUeditor($v);
							break;
						case 'file':
							$data['infolist'][$key][$k]   =	$this->info_model->get_file_info($v);
							break;
						case 'files':
							$files = explode(',', $v);
							foreach($files as $key=>$val){
								$data['infolist'][$key][$k]  =	$this->info_model->get_file_info($val);
							}
						default:
							$data['infolist'][$key][$k] = $v;
					}

				}

				$data['infolist'][$key] = array_merge($value, $data['infolist'][$key]);
				$data['infolist'][$key]['url'] =  site_url().'/'.$uri.$value['id'];
				// var_dump($data['infolist'][$key]['url']);
			}

			// var_dump($data['infolist']);die;
			return $data;
		}

		/**
		 * $id 文章ID
		 * unitid  栏目id
		*/
		function view($id, $unitid){

			$table = $this->info_model->get_table($unitid);
			$fields = $this->model_config->get_config($table);
			$ziduan = $fields['info'];
			foreach ($ziduan as $key => $value) {
				$field_arr[$value['field']] = $value['type'];
				if($value['type']=='select' || $value['type']=='checkbox' || $value['type']=="radio"){
					$data['option'][$value['field']] = $value['value'];
				}
			}
			$sql = "SELECT *
					FROM ".$this->db->dbprefix('model_'.$table)." 
					WHERE status = 1 AND id = $id";
			$row = $this->db->query($sql)->row_array();

			foreach($row as $k => $v){//循环每个字段，并判断类型，处理
				if(in_array($k,array('title','id','status','pubdate','unitid'))) continue;
				// echo $field_arr[$k];

				switch($field_arr[$k]){
					case 'pic':
						$data[$k] = $this->info_model->getAttinfo($v);
						break;
					case 'pics':
						$pics = explode(',', $v);
						foreach($pics as $key=>$val){
							$data[$k]  =	$this->info_model->getAttinfo($val);
						}
						break;
					case 'editor':
						$data[$k] = $this->info_model->getUeditor($v);
						break;
					case 'file':
						$data[$k]   =	$this->info_model->get_file_info($v);
						break;
					case 'files':
						$files = explode(',', $v);
						foreach($files as $key=>$val){
							$data[$k]  =	$this->info_model->get_file_info($val);
						}
					default:
						$data[$k] = $v;
				}

			}

			$data = array_merge($row, $data);
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



		//分配模板
		function display($parameter=array()){
            $this->parameter = $parameter;
			
			$columninfo = $this->_G['params'];
			//详情页
			$pattern = '/^\d+$/';
			if(!empty($parameter['parameter'][0])&&preg_match($pattern, $parameter['parameter'][0])){
                if(preg_match('/^(templates\/shtml\/).+((\.shtml)|(\.html)|(\.htm))$/',$columninfo['show_template'])){
                	$data['infoid'] = $parameter['parameter'][0];
                    $display=substr($columninfo['show_template'], 16);
                    $this->template->display($display,$data);
					return;
                }else{
                    $this->template->display('application/doc_content.shtml');
                }
			}

			//列表页
			if(preg_match('/^(templates\/shtml\/).+((\.shtml)|(\.html)|(\.htm))$/',$columninfo['list_template'])){

	            $display=substr($columninfo['list_template'], 16);
	            $this->template->display($display);

		      }else{

		            $this->template->display('application/list.shtml');
		      }

		}


		

		

		
	}
?>