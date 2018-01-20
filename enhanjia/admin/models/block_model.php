<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//碎片模型
class Block_model extends Ci_Model{

	public function __construct(){
		
		  parent::__construct();
		
	}
	
	/**
	 * 获取碎片列表
	 * $page int 当前页数
	 */
	function lists($page) {
		$this->load->helper('page');

		$base_url = site_url('content/block/index');
		$page_size = 10;
		$begin_page = $page > 1 ? ($page-1)*$page_size : 0;

		$content = $this->db->where(array('status'=>'1'))
							->get('block')
							->num_rows();

		$sql = "SELECT *
				FROM ".$this->db->dbprefix('block')."
				WHERE status = 1
				ORDER BY id DESC
				LIMIT $begin_page,$page_size";
		$info = $this->db->query($sql);
		
		$data['page_info'] = page2($base_url, $content, $page_size, $page);

		$data['lists'] = $info->result_array();

		return $data;
	}

	/**
	 * 根据id获取碎片信息
	 * $id int 碎片id
	*/
	function block_info($id) {
		$sql = "SELECT *
				FROM ".$this->db->dbprefix('block')."
				WHERE id = $id AND status = 1";
		$info = $this->db->query($sql)->row_array();
		return $info;
	}
}