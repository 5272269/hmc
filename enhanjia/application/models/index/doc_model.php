<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	Class doc_model extends Ci_Model {

        public $parameter;

        function __construct() {
	
			parent::__construct();

        	$this->load->model('model_config');
			$this->load->model('info_model');
			$this->load->model('index/nav_model');
        }
        
		function _service($method = 0, $params = array()){

			switch($method){
				case 'listinfo':
					$id   = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 1;
					$modelid = isset($params['modelid']) && intval($params['modelid']) ? intval($params['modelid']) : 0;
					$num  = isset($params['num']) && intval($params['num']) ? intval($params['num']) : 0;
					$page = isset($params['page']) && intval($params['page']) ? intval($params['page']) : 1;
					$start = isset($params['start']) && intval($params['start']) ? intval($params['start']) : 0;//从第几条开始取
					$content = isset($params['content']) && intval($params['content']) ? intval($params['content']) : 0;
					$where = isset($params['where']) && remove_xss($params['where']) ? remove_xss($params['where']) : '';
					$sort = isset($params['sort']) ? $params['sort'] : 'id DESC';
					$uri = isset($params['uri']) ? remove_xss($params['uri']) : '';
					return self::listinfo($id, $modelid, $num, $page, $start, $content, $where, $sort, $uri);
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
				case "affairs":
					return $this->affairs();
				case "balance":
					$id   = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 1;
					$unitid   = isset($params['unitid']) && intval($params['unitid']) ? intval($params['unitid']) : 1;
					$type   = isset($params['type']) && remove_xss($params['type']) ? remove_xss($params['type']) : 'next';
					return self::balance($id,$unitid,$type);
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
		function listinfo($id = 0, $modelid = 0, $num = 0, $page = 1, $start = 0, $content = 0, $where = '', $sort = 'id DESC', $uri = ''){
			if($modelid != 0){
				$table_info = $this->info_model->get_model_info($modelid);
				$table = $table_info['type']."_".$table_info['id'];
				$fields['info'] = json_decode($table_info['field'],TRUE);
			}
			else{
				$table = $this->info_model->get_table($id);
				$fields = $this->model_config->get_config($table);
			}
			
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


			/*处理where语句，当where不为空时，则采用where语句*/
			if(!empty($where) && $modelid != 0){
				$where_sql = "status = 1".$where;
			}
			else{
				$where_sql = "unitid = ".$unitid." AND status = 1".$where;
			}

			//如果有条数，才返回页数信息
			$limit = '';
			if($page_size){
				$this->load->helper('page');
				$page = toLimitLng($page, 1);
				$offset	= ($start===0) ? ($page - 1) * $page_size : ($page - 1) * $page_size + $start ;
				$page_url = $url.'?'.rand(10000,99999).time();

				$sql = "SELECT 1
						FROM ".$this->db->dbprefix('model_'.$table)." 
						WHERE ".$where_sql."
						ORDER BY id DESC";
				$rst = $this->db->query($sql);
				$data['pages'] = page2($page_url, $rst->num_rows()-$start, $page_size, $page);

				$limit = "LIMIT $offset,$page_size";
			}
			

			$sql = "SELECT *
					FROM ".$this->db->dbprefix('model_'.$table)." 
					WHERE ".$where_sql."
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
							foreach($pics as $k1=>$val){
								$data['infolist'][$key][$k][$k1]  =	$this->info_model->getAttinfo($val);
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
							foreach($files as $val){
								$data['infolist'][$key][$k]  =	$this->info_model->get_file_info($val);
							}
						default:
							$data['infolist'][$key][$k] = $v;
					}

				}

				/*处理文章url*/
				$view_url = $this->nav_model->get_parent_url($value['unitid']);
				$data['infolist'][$key] = array_merge($value, $data['infolist'][$key]);
				$data['infolist'][$key]['url'] =  site_url($view_url.'/'.$value['id']);
				// var_dump($data['infolist'][$key]['url']);
			}

			/*处理栏目url*/
			if(!empty($id)){
				$data['column_url'] = site_url($this->nav_model->get_parent_url($id));
			}
			
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

			/*增加浏览数量*/
			if(array_key_exists('browse_number',$row)){
				if(empty($row['browse_number'])){
					$browse_number = '1';
				}
				else{
					$browse_number = $row['browse_number']+1;
				}
				$browse_number_array = array('browse_number'=>$browse_number);
				$this->db->where('id',$id);
				$this->db->update('model_'.$table,$browse_number_array);
			}

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
							$data[$k][$key] = $this->info_model->getAttinfo($val);
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

		/**
		 * 获得当前文章的上一篇或下一篇
		 * int $id 文章id
		 * int $unitid 栏目id
		 * string $type last上一篇文章 next下一篇文章
		 */
		function balance($id,$unitid,$type){
			$table_name = $this->info_model->get_table($unitid);

			if($type == 'next'){
				$where = 'id > '.$id." AND unitid = ".$unitid;
				$sort = "ASC";
			}
			elseif($type == 'last'){
				$where = 'id < '.$id." AND unitid = ".$unitid;
				$sort = "DESC";
			}

			$sql = "SELECT *
					FROM ".$this->db->dbprefix('model_'.$table_name)."
					WHERE ".$where."
					ORDER BY id ".$sort."
					LIMIT 1 ";
			$info = $this->db->query($sql)->row_array();

			if($info){
				/*处理链接*/
				$view_url = $this->nav_model->get_parent_url($info['unitid']);
				$info['url'] = site_url($view_url.'/'.$info['id']);
			}

			return $info;
		}

		/*关爱大事记*/
		function affairs() {
			$info = array();

			$max_date = $this->db->select('max(adddate)')
					 			 ->where('status = 1')
			         		 	 ->get('model_doc_12')
			         			 ->row_array();

			$max_year = date("Y",$max_date['max(adddate)']);

			$min_date = $this->db->select('min(adddate)')
								 ->where('status = 1')
								 ->get('model_doc_12')
								 ->row_array();
			$min_year = date("Y",$min_date['min(adddate)']);

			for($max_year;$max_year>=$min_year;$max_year--) {
				$start_time = strtotime($max_year.'-01-01');
                $end_time = strtotime('+1 year',$start_time)-1;

				$where = 'adddate >= '.$start_time." AND adddate <= ".$end_time;

				$data = $this->db->select('*')
					 			 ->where($where." AND status = 1")
					 			 ->order_by("adddate ASC")
					 			 ->get('model_doc_12')
					 			 ->result_array();

				foreach($data as $k=>$v){
					$pics = explode(',', $v['pics']);
					foreach($pics as $key=>$val){
						if(!empty($val)){
							$pic_info = $this->info_model->getAttinfo($val);
							$data[$k]['pic_array'][$key] = $pic_info['filename'];
						}
					}
				}
				
				$info[$max_year] = $data;
			}
			return $info;
		}

		//分配模板
		function display($parameter=array()){
            $this->parameter = $parameter;

			$columninfo = $this->_G['params'];

			//详情页
			$pattern = '/^\d+$/';
			if(!empty($parameter['parameter'][0])&&preg_match($pattern, intval($parameter['parameter'][0]))){
				/*获取文章详情信息*/
                $data['view_info'] = self::view($parameter['parameter'][0],$columninfo['id']);
                
                if(preg_match('/^(templates\/shtml\/).+((\.shtml)|(\.html)|(\.htm))$/',$columninfo['show_template'])){
                	
                    $display=substr($columninfo['show_template'], 16);
                    $this->template->display($display,$data);
					return;
                }else{
                    $this->template->display('application/show_detail.shtml',$data);
                }
			}

			//列表页
			elseif(preg_match('/^(templates\/shtml\/).+((\.shtml)|(\.html)|(\.htm))$/',$columninfo['list_template'])){

	            $display=substr($columninfo['list_template'], 16);
	            $this->template->display($display);

		      }else{
		            $this->template->display('application/list_article_list.shtml');
		      }

		}
	}
?>