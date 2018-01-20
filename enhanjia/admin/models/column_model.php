<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	Class column_model extends Ci_Model {

		/*获取栏目列表*/
		public function get_column_list() {
			$sql = "SELECT id,reid,sort,name,ispart,info_model
				FROM ".$this->db->dbprefix('column')."
				WHERE status = '0'
				ORDER BY sort,id";
			$info = $this->db->query($sql)->result_array();
			$this->load->library('tree');
			$info = $this->tree->init($info);
			//var_dump($info);exit;
			return $info;
		}

		/*更新排序*/
		public function update_sort($data = array()) {
			foreach($data as $k=>$v){
				$sql =" UPDATE ".$this->db->dbprefix('column')." 
					SET sort = '".$v."'
					WHERE id = '".$k."'";
				$this->db->query($sql);
			}
		}

		/*根据id返回栏目信息*/
		public function get_column_info($id) {
			$sql = "SELECT *
					FROM ".$this->db->dbprefix('column')."
					WHERE id = '".$id."'";
			$info = $this->db->query($sql)->row_array();
			return $info;
		}
		
		/*根据id删除栏目*/
		public function del_column($id) {
			$sql = "UPDATE ".$this->db->dbprefix('column')." 
				SET status = '1' 
				WHERE id = '".$id."'";
			$this->db->query($sql);
			//$this->db->delete('column',array('id'=>$id));
		}

		/*根据id返回上级栏目信息*/
		public function get_re_info($reid) {
			$sql = "SELECT id,name
					FROM ".$this->db->dbprefix('column')."
					WHERE id = '".$reid."'";
			$info = $this->db->query($sql)->row_array();
			return $info;
		}

		/*根据栏目id获得图片信息*/
		public function get_pic($picid) {
			$sql = "SELECT filename
					FROM ".$this->db->dbprefix('attachment')."
					WHERE aid = '".$picid."'";
			$info = $this->db->query($sql)->row_array();
			return $info;
		}

		/*根据栏目属性获得信息模型*/
		public function get_info_model($ispart) {
			$sql = "SELECT id,name
					FROM ".$this->db->dbprefix('models_config')."
					WHERE type = '".$ispart."'";
			$info = $this->db->query($sql)->result_array();
			return $info;
		}

		/*根据信息模型获取同一栏目属性下的其它信息模型*/
		public function get_model_list($type) {
			$sql = "SELECT type
					FROM ".$this->db->dbprefix('models_config')."
					WHERE id = '".$type."'";
			$info = $this->db->query($sql)->row_array();
			$info = self::get_info_model($info['type']);
			return $info;
		}

		/*获取栏目列表，树结构*/
		public function get_column_tree() {
			$sql = "SELECT id,reid,sort,name,ispart,info_model
				FROM ".$this->db->dbprefix('column')."
				WHERE status = '0'
				ORDER BY sort,id";
			$info = $this->db->query($sql)->result_array();
			$this->load->library('tree');
			$info = $this->tree->init_tree($info);
			return $info;
		}

		/*判断英文名是否重复*/
		public function is_eng_name($eng_name,$id){

			$id_where = '';
			if(!empty($id)){
				$id_where .= ' AND id <> '.$id;
			}

			$sql = "SELECT 1
                    FROM ".$this->db->dbprefix('column')." 
                    WHERE eng_name = '".$eng_name."'".$id_where;
            $num_rows = $this->db->query($sql)->num_rows();
            return $num_rows;
		}

		public function get_column_by_reid($reid){
			$sql = "SELECT 1
					FROM ".$this->db->dbprefix('column')."
					WHERE reid = ".$reid." AND status = 0";
			$num_rows = $this->db->query($sql)->num_rows();
			return $num_rows;
		}

	}
?>