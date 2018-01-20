<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	Class nav_model extends Ci_Model {

		private $parent_menu;

		function _service($method = 0, $params = array()){

			switch($method){
				case 'main':
					$num = isset($params['num']) && intval($params['num']) ? intval($params['num']) : 0;
					return self::main($num);
					break;
				case 'sub':
					$id = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 0;
					$expand = isset($params['expand']) ? intval($params['expand']) : 1;
					$num = isset($params['num']) && intval($params['num']) ? intval($params['num']) : 0;
					return self::sub($id, $expand, $num);
					break;
				case 'custom':
					$id = isset($params['id']) ? $params['id'] : '';
					return self::custom($id);
					break;
				case 'info':
					$id = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 0;
					$top = isset($params['top']) && intval($params['top']) ? intval($params['top']) : 0;
					$field = isset($params['field']) ? remove_xss($params['field']) : 0;
					return self::info($field, $top, $id);
					break;
				case 'sub_column':
					$id = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 0;
					$is_home = isset($params['is_home']) ? $params['is_home'] : '';
					return self::sub_column($id,$is_home);
					break;
				case 'get_info_cid_mid':
					$column_id = isset($params['column_id']) && intval($params['column_id']) ? intval($params['column_id']) : 0;
					$modelid = isset($params['modelid']) && intval($params['modelid']) ? intval($params['modelid']) : 0;
					return self::get_info_cid_mid($column_id,$modelid);
					break;
				case 'get_info_by_where':
					$where = isset($params['where']) ? $params['where'] : '';
					return self::get_info_by_where($where);
				case 'get_re_select':
					$column_id = isset($params['column_id']) && intval($params['column_id']) ? intval($params['column_id']) : 0;
					return self::get_re_select($column_id);
				case 'get_parent_url':
					$column_id = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 0;
					return self::get_parent_url($column_id);
				case 'location':
					return self::location();
				case 'column_info':
					$id = isset($params['id']) && intval($params['id']) ? intval($params['id']) : 0;
					return self::column_info($id);
				default:
					return false;

			}
		}

		//获取一级栏目导航
		function main($n = 0){

			$all_menu = $this->all_menu;
			$return_info = array();
			$return = array();

			if(!empty($all_menu)){

				$i=0;//初始化递增变量 $i
				foreach($all_menu as $data){
					if(!$data['reid'] && $data['is_nav'] && !$data['status']){
					    //获取菜单地址
					    if($data['out_chain']){
					    	$data['url'] = $data['out_chain'];
					    }
						else{
							if(($data['is_exist'] == 1 && !empty($data['category_template'])) || !empty($data['list_template']) || !empty($data['show_template'])){
								$data['url'] = site_url($data['eng_name']);
								$this->url = $data['eng_name'];
							}
							else{
								$url = self::get_cloum_url($data['id']);
								$data['url'] = site_url($url);
							}
						}

						$return_info[] = $data;
						$i++; //变量递增 
					}
					if($n && $n==$i) break;
				}

				$array = array();

				/*排序*/
				foreach($return_info as $k=>$v){
					for($i=$k+1;$i<=count($return_info)-1;$i++){
						if($return_info[$i]['sort'] > $return_info[$k]['sort']){
							$array = $return_info[$i];
							$return_info[$i] = $return_info[$k];
							$return_info[$k] = $array;
							unset($array);
						}
					}
				}			
			}

			return $return_info;
		}

		//根据栏目id获取栏目导航
		function sub($id = 0, $expand = 1, $n = 0){
			/*栏目信息列表*/
			$menus = $this->_menus;
			/*栏目id列表*/
			$subs = $this->_subs;
			$params = $this->_G['params'];
			/*返回的数组*/
			$return = array();
			/*父级栏目的url*/
			$parent_url = self::get_parent_url($id);

			$this->load->model("column_model");
			
			if(!isset($subs[$id])) return $return; //没有子类,返回空;
						   
			$i=0; //初始化递增变量 $i
			foreach($subs[$id] as $sid){
				$data = $menus[$sid];  //统一模板中的调用标记，方便模板的制作。
				if($data['is_nav']){
					//处理图片路径
					if(!empty($data['picid'])){
						$data['image'] = $this->column_model->get_pic($data['picid']);
					}

					//获取栏目地址
					if($data['out_chain']){
						$data['url'] = $data['out_chain'];
					}
					else{
						$url = self::get_cloum_url($data['id']);
						$data['url'] = site_url($url);
					}	
					
					if($expand == 1 ){
						self::sub($sid, $expand);  //递归
					}	
					if($expand == 2 ){
						if($menus[$sid]['id'] == $params['id'] || $menus[$params['id']]['parentId'] == $data['id'])
						self::sub($sid, $expand);  //递归
					}

					$str='';
					$i++;    //变量递增  

					$return[] = $data;
				}
				if($n && $n==$i) break;		
			}

			return $return;
		}


		function custom($ids = ''){
			$menus = $this->_menus;
			$return = array();

			if(empty($ids)) 
				self::main();
			else{
				$temp_id = explode(',', $ids);

				foreach($temp_id as $id){
					$data = $menus[intval($id)];
					//获取栏目地址
					if($data['out_chain'])  
						$url = '/index.php/'.$data['out_chain'];
					else
						$url ='/sub';

					$return[] = $menus[$id];
				}

			}
		}

		function info($field = 'title', $top = 0, $id = 0){
			$id = empty($id)? $this->_G['params']['id'] : $id;
			$menus = $this->_menus;

			if($top){
				if($menus[$id]['reid']!=0){
					do{
						$id = $menus[$id]['reid'];
					}while($menus[$id]['reid']!=0);
				}		
				return $menus[$id][$field];
			}else{
				return $menus[$id][$field];
			}
		}

		function location(){
			$params = $this->_G['params'];
			$menus = $this->_menus;

			if($params['id']){
				self::trace_parent_menu($this->_G['params']['id']);
				$this->parent_menu = array_reverse($this->parent_menu, false);

				foreach($this->parent_menu as &$menu){
					if($menu['out_chain']){
						$menu['url'] = $menu['out_chain'];
					}else{
                        /*父级栏目的url*/
                        $parent_url = self::get_parent_url($menu['id']);
                        if($menu['reid']!=0){
                            $menu['url'] = site_url($parent_url);
                        }
                        else{
                        	/*判断父级栏目是否存在页面*/
                        	if($menus[$menu['reid']]['is_exist'] == 1){
                            	$menu['url'] = site_url($parent_url);
                            }
                            else{
                            	$menu['url'] = 'javascript:;';
                            }
                        }
					}
				}
			}
			return $this->parent_menu;
		}

		function trace_parent_menu($id){
			
			$this->parent_menu[] = $this->_menus[$id];

			if($this->_menus[$id]['reid']){
				self::trace_parent_menu($this->_menus[$id]['reid']);
			}

		}

		/**
		 * 根据栏目id获得栏目信息
		 * int $id 栏目的id
		 */
		function column_info($id){
			$menus = $this->_menus;
			$info = $menus[$id];
			$this->load->model("column_model");
			$info['picarr'] = $this->column_model->get_pic($info['picid']);
			$url = self::get_parent_url($info['id']);
			$info['url'] = site_url($url);
			return $info;
		}

		/**
		 * 根据栏目的id获得栏目的url，递归调用
		 * int $id 栏目的id,递归调用时为当前栏目的父级栏目id
		 */
		function get_parent_url($id) {

			$menus = $this->_menus;
			if($menus[$id]['reid'] == 0){
				$params_url = '/'.$menus[$id]['eng_name'];
			}
			else{
				$url = self::get_parent_url($menus[$id]['reid']);
				$params_url = $url.'/'.$menus[$id]['eng_name'];
			}
			
			return $params_url;
		}

		/**
		 * 根据父级栏目调取子栏目信息
		 * int $id 父级栏目id
		 * string $is_home 特殊字段，首页移民资讯筛选显示的国家时使用
		 */
		function sub_column($id,$is_home) {
			$menus = $this->_menus;
			$return = array();
			
			if(!empty($is_home)){
				foreach($menus as $k=>$v) {
					if($v['reid'] == $id && $v['is_home'] == 1) {
						$return[] = $v;
					}
				}
			}
			else{
				foreach($menus as $k=>$v) {
					if($v['reid'] == $id) {
						$return[] = $v;
					}
				}
			}

			foreach($return as $k=>$v) {
				$this->load->model("column_model");
				//处理图片路径
				if(!empty($v['picid'])){
					$return[$k]['image'] = $this->column_model->get_pic($v['picid']);
				}
			}
			return $return;
		}

		/**
		 * 根据父栏目id和模型id获得栏目信息
		 * int $reid 父栏目id
		 * int $modelid 模型id 
		 */
		function get_info_cid_mid($reid,$modelid) {
    		$sql = "SELECT *
            		FROM ".$this->db->dbprefix('column')."
            		WHERE reid = ".$reid." AND info_model = ".$modelid." AND status = 0";
    		$info = $this->db->query($sql)->row_array();
    		return $info['id'];
		}

		/**
		 * 根据where条件获取栏目
		 */
		function get_info_by_where($where) {
    		$sql = "SELECT *
            		FROM ".$this->db->dbprefix('column')."
            		WHERE status = 0 AND ".$where;
    		$info = $this->db->query($sql)->result_array();

    		foreach($info as $k=>$v){
	    		if(!empty($v['picid'])){
					$info[$k]['image'] = $this->column_model->get_pic($v['picid']);
				}
				if(!empty($v['home_pic'])){
					$info[$k]['home_image'] = $this->column_model->get_pic($v['home_pic']);
				}

				$info[$k]['url'] = self::get_cloum_url($v['id']);
			}
    		return $info;
		}

		/**
		 * 根据栏目id获得有效栏目的url，即存在模板的栏目，如果当前栏目不存在模板则寻找存在模板的子栏目
		 * int $column_id 栏目id
		 */
		function get_cloum_url($column_id) {
			$menus = $this->all_menu;

			foreach($menus as $k=>$v) {
				if($v['reid'] == $column_id){
					if(!empty($v['list_template']) || !empty($v['category_template']) || !empty($v['show_template'])){
						$parent_url = self::get_parent_url($v['id']);
						$url = $parent_url;
						break;
					}
				}
				elseif($v['id'] == $column_id){
					if(!empty($v['list_template']) || !empty($v['category_template']) || !empty($v['show_template'])){
						$url = $v['eng_name'];
						break;
					}
				}
			}
			return $url;
		}

		/**
		 * 根据栏目id获取关联选项
		 * int $column_id 栏目id
		 */
		function get_re_select($column_id) {
			$sql = "SELECT *
					FROM ".$this->db->dbprefix('stepselect')."
					WHERE column_id = ".$column_id;
			$params_info = $this->db->query($sql)->row_array();

			if(!empty($params_info)){
				$sql = "SELECT *
						FROM ".$this->db->dbprefix('stepselect')."
						WHERE reid = ".$params_info['id']."
						ORDER BY id DESC";
				$info = $this->db->query($sql)->result_array();
			}
			else{
				$info = '';
			}

			return $info;
		}
	}
?>