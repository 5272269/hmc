<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 碎片管理
 *   
 */
class block extends MY_Controller {
	/**
	 * 初始化
	 */
	function __construct() {
		
		$action_array = array(
			'controller'	=> array('name'=>'碎片管理','key'=>'block'),
			'class'			=> array(
									'index' =>'碎片列表',
									'add' 	=>'添加碎片',
									'edit'	=>'编辑碎片',
									'del' 	=>'删除碎片'
								),
			'issystem'		=> TRUE
		);
		parent::_Mycontroller();
		parent::check_login();
		parent::dopower($action_array);
		
	}

	/**
	 * 碎片列表
	 */
	function index() {
		$page = $_GET['page'] ? $_GET['page'] : 0;
		
		$this->load->model('block_model');

		$data = $this->block_model->lists($page);

		$this->template->display('admin/content/block/index.shtml',$data);
	}

	/**
	 * 添加碎片
	 */
	function add() {
		if($_POST['dopost'] == 'save'){
			$data['title'] = $this->input->post('title');
			if(empty($data['title'])){
				show_msg('标题不允许为空！',site_url('content/block/add'),0,1000);
			}

			$add_editor['body'] = $this->input->post('editorValue');
			$add_editor['userip'] = get_client_ip();

			/*插入内容表*/
			$this->db->insert('addonarticle',$add_editor);

			$data['aid'] = $this->db->insert_id();
			$data['status'] = 1;

			$this->db->insert('block',$data);

			show_msg('添加成功',site_url('content/block/index'),0,1000);
		}
		else{
			$this->load->library('ueditor');
			$data['editor'] = $this->ueditor->getueditor('other','100','100','utf-8');
			$this->template->display('admin/content/block/add.shtml',$data);
		}
	}

	/**
	 * 编辑碎片
	 */
	function edit() {
		if($_POST['dopost'] == 'save'){
			$id = $this->input->post('id') ? $this->input->post('id') : '';
			if(empty($id)){
				show_msg('错误！没有id',site_url('content/block/index'),0,1000);
			}

			$aid = $this->input->post('aid') ? $this->input->post('aid') : '';
			if(empty($aid)){
				show_msg('错误！未找到编辑器信息！',site_url('content/block/index'),0,1000);
			}

			$data['title'] = $this->input->post('title') ? $this->input->post('title') : '';
			if(empty($data['title'])){
				show_msg('标题不允许为空！',site_url('content/block/index'),0,1000);
			}

			$editor['body'] = $this->input->post('editorValue');
			$editor['userip'] = get_client_ip();

			/*更新内容表*/
			$this->db->where('aid',$aid);
			$this->db->update('addonarticle',$editor);

			/*更新碎片信息*/
			$this->db->where('id',$id);
			$this->db->update('block',$data);

			show_msg('编辑成功',site_url('content/block/index'),0,1000);
		}
		else{
			$id = $_GET['id'] ? $this->input->get('id') : '';

			if(empty($id)){
				show_msg('错误！没有id',site_url('content/block/index'),0,1000);
			} 

			$this->load->model('block_model');
			$data = $this->block_model->block_info($id);

			$editor = $this->db->get_where('addonarticle','aid = '.$data['aid'])->row_array();

			$this->load->library('ueditor');
			$data['editor'] = $this->ueditor->getueditor('other','100','100','utf-8',array($editor['body']));

			$this->template->display('admin/content/block/add.shtml',$data);
		}
	}

	/**
	 * 删除碎片
	 */
	function del() {
		$id = $this->input->post('id') ? $this->input->post('id') : '';
		if(empty($id)){
			response('参数错误！','',1001);
		}
		else{
			$data = array('status'=>'2');

			$id_array = explode('`',$id);
			foreach($id_array as $k=>$v){
				$this->db->where('id',$v);
				$this->db->update('block',$data);
			}

			response('','',1000);
		}
	}
}
