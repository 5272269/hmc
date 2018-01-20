<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 关联选项
 * 
 */
class stepselect extends MY_Controller {
	/**
	 * 初始化
	 */
	function __construct() {
		$powerArray = array(
			'parent'		=> array('name'=>'cms系统','key'=>'content'),
			'controller'	=> array('name'=>'关联选项','key'=>'stepselect'),
			'class'			=> array(
									'index' =>'选项列表',
									'add' 	=>'选项添加',
									'edit'	=>'选项修改',
									'del' 	=>'选项删除',
								),
			'issystem'		=> TRUE
		);
		parent::_Mycontroller();
		parent::check_login();
		parent::dopower($action_array);
	}
	/**
	 * 栏目列表
	 */
	function index() {
		$sql = "SELECT *  
				FROM ".$this->db->dbprefix('stepselect')."
				WHERE reid = 0 AND status = 1
				ORDER BY id DESC";
		$dlist = $this->db->query($sql)->result_array();
		foreach ($dlist as $k=>$v) {
			$sql = "SELECT *
					FROM ".$this->db->dbprefix('stepselect')."
					WHERE reid = ".$v['id']." AND status = 1
					ORDER BY id DESC";
			$dlist[$k]['child'] = $this->db->query($sql)->result_array();
		}
		
		$data['lists'] = $dlist;
		
		$this->template->display('admin/content/stepselect/index.shtml',$data);
	}
	
	/**
	 * 添加
	 */
	function add() {
		
		$dopost = $this->input->post('dopost');
		if ($dopost=='save') {
		    
		    $data['reid'] 		= $_POST['reid'];
		    $data['name'] 		= $_POST['name'];
		    $data['value']      = $_POST['value'];
		    $data['column_id']	= $_POST['column_id'] ? $_POST['column_id'] : '0';
		    $data['status'] 	= '1';
		    $this->db->insert('stepselect',$data);

		    show_msg('添加成功',site_url('content/stepselect/index'),0,1000);
		}

		$reid = $this->input->get('reid');

		if (empty($reid)) {
			$data['rename'] = '顶级分类';
		}
		else {
			$sql = "SELECT *
					FROM ".$this->db->dbprefix('stepselect')."
					WHERE id = ".$reid;
			$re_info = $this->db->query($sql)->row_array();
			$data['rename'] = $re_info['name'];
		}

		$data['reid'] = $reid;

		$data['action'] = 'add';

		$this->template->display('admin/content/stepselect/add.shtml',$data);
	}
	
	/**
	 * 编辑
	 */
	function edit(){
		
		$dopost = $this->input->post('dopost');
		if ($dopost=='save') {
		    
		    $data['name'] 		= $_POST['name'];
		    $data['value']		= $_POST['value'];
		    $where['id'] 		= $_POST['id'];
		    $data['column_id']	= $_POST['column_id'] ? $_POST['column_id'] : '0';
		    
		    $this->db->update('stepselect',$data,$where);

		    show_msg('编辑成功',site_url('content/stepselect/index'),0,1000);
		
		}

		$id = $this->uri->segment(4);
		if (empty($id)) {
			show_msg('参数错误',site_url('content/stepselect/index'),0,1000);
		}
		$sql = " SELECT * 
				 FROM ".$this->db->dbprefix('stepselect')." 
				 WHERE id = $id AND status = 1";
		$data['info'] = $this->db->query($sql)->row_array();
		
		$reid = $data['info']['reid'];

		if (empty($reid)) {
			$data['rename'] ='顶级分类';
		}
		else {
			$sql = "SELECT *
					FROM ".$this->db->dbprefix('stepselect')."
					WHERE id = ".$reid;
			$re_info = $this->db->query($sql)->row_array();
			$data['rename'] = $re_info['name'];
		}

		$data['reid'] = $reid;

		$data['action'] = 'edit';

		$this->template->display('admin/content/stepselect/add.shtml',$data);
	}

	/**
	 * 删除
	 */
	public function del(){
		
		$id = $this->input->post('id') ? (int)$this->input->post('id') : '';
		if (empty($id)) {
			response('删除失败！','','1001');
		}
		$where['id'] 	= $id;
		$data['status'] = '0';
		
		$this->db->update('stepselect',$data,$where);

		response('删除成功！','','1000');
	}
}
// end column.php