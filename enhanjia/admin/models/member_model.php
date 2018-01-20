<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//碎片模型
class Member_model extends Ci_Model{

	public function __construct(){
		
		  parent::__construct();
		
	}
	
	/**
	 * 获取碎片列表
	 * @param int $page 当前页数
	 * @param array $screening 筛选项
	 */
	function lists($page,$screening = array()) {
		$this->load->helper('page');
		$page_url = '';
		$where = '';

		if(!empty($screening['keywords'])){
			$page_url .= '?keywords='.$screening['keywords'];
			$where .= " username like '%".$screening['keywords']."%'";
		}
		if(!empty($screening['status'])){
			$page_url .= !empty($page_url) ? '&status='.$screening['status'] : '?status='.$screening['status'];
			$where .= !empty($where) ? ' AND status = '.$screening['status'] : ' status = '.$screening['status'];
		}
		if(!empty($screening['start_time'])){
			$page_url .= !empty($page_url) ? '&start_time='.$screening['start_time'] : '?start_time='.$screening['start_time'];
			$where .= !empty($where) ? ' AND reg_time >= '.strtotime($screening['start_time']) : ' reg_time >= '.strtotime($screening['start_time']);
 		}
 		if(!empty($screening['end_time'])){
 			$page_url .= !empty($page_url) ? '&end_time='.$screening['end_time'] : '?end_time='.$screening['end_time'];
 			$where .= !empty($where) ? ' AND reg_time <= '.strtotime($screening['end_time']) : ' reg_time <= '.strtotime($screening['end_time']);
 		}
 		if(empty($where)){
 			$where .= ' status = 1';
 		}

		$base_url = site_url('content/member/index').$page_url;
		$page_size = 10;
		$begin_page = $page > 1 ? ($page-1)*$page_size : 0;

		$sql = "SELECT *
				FROM ".$this->db->dbprefix('member')."
				WHERE".$where."
				ORDER BY id DESC
				LIMIT $begin_page,$page_size";
		$info = $this->db->query($sql);

		$data['page_info'] = page2($base_url, $info->num_rows(), $page_size, $page);

		$data['lists'] = $info->result_array();

		return $data;
	}
}