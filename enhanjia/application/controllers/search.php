<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 搜索
 */
class search extends MY_Controller {

	function __construct() {
	
		parent::_Mycontroller();
	}
  	
  	function index(){
  		$data = array();
		$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
		$pagesize = 10;
		$q = safe_replace(trim($_GET['q']));
		$q = htmlspecialchars(strip_tags($q));
		$q = str_replace('%', '', $q);	//过滤'%'，用户全文搜索
		$data['search_q'] = $q;	//搜索原内容
		if (!empty($q) && $q <> 'Search') {
			$this->load->model('info_model');
			$this->load->model('column_model');

			$type = !empty($_GET['t']) ? $_GET['t'] : '1';
			$this->load->library('segment','segment');
			//分词结果
			$segment_q = $this->segment->get_keyword($this->segment->split_result($q));
			//如果分词结果为空
			if(!empty($segment_q)) {
				$addsql = " AND `type` = '$type' AND `data` like '%$segment_q%'";
			} else {
				$addsql = " AND `type` = '$type' AND `data` like '%$q%'";
			}
			$sql = "SELECT 1 
					FROM ".$this->db->dbprefix('search')." 
					WHERE 1 $addsql
					";
			$query_2 = $this->db->query($sql);

			$beginpages = $page>1?($page-1)*$pagesize:'0';
			$sql = "SELECT id,typeid
					FROM ".$this->db->dbprefix('search')." 
					WHERE 1 $addsql
					ORDER BY searchid DESC ,adddate DESC,id DESC
					LIMIT $beginpages,$pagesize ";
			$query_1 		= $this->db->query($sql);

			$data['counts'] = $query_2->num_rows();
			$base_url = site_url('search')."?q=".$q;
			$this->load->helper('page');
			$data['pages'] = page2($base_url, $data['counts'], $pagesize, $page ,'1');
			$lists 	= $query_1->result_array();

			//如果结果不为空 拼接表取数据
			if(!empty($lists)) {
				foreach ($lists as $k => $v) {
					$model =$this->column_model->get_column_info_by_id($v['typeid']);
					$model_name= $model['ispart'].'_'.$model['info_model'];
					$sql = "SELECT *    
						FROM ".to_table($model_name)." 
						WHERE id= ".$v['id'];
					$rst = $this->db->query($sql)->row_array();
					
					if (strpos($model['out_chain'],'?')) {
						$rst['url'] = $model['eng_name'].'/'.$rst['id']; 
					} else {
						$rst['url'] = $model['out_chain'].'/'.$rst['id']; 
					}

					$data['lists'][] = $rst;
				}
			}
			foreach($data['lists'] as $_k=>$_v) {
					$data['lists'][$_k]['title'] = str_replace($q, '<font color="red">'.$q.'</font>', $_v['title']);
					$data['lists'][$_k]['description'] = str_replace($q, '<font color="red">'.$q.'</font>', $_v['description']);
			}
		}
		// var_dump($data);

		$this->template->display('application/search.shtml', $data);
  	}

}
/* End of file *.php */
/* Location: ./application/controllers/*.php */