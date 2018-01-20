<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 开发者中心
 * 
 */
class development_center extends MY_Controller
{
	function __construct(){
		$action_array = array(
			'controller'	=> array('name'=>'开发中心','key'=>'development_center'),
			'class'			=> array(
								'index' 			=>'权限节点查看',
								'add_node' 			=>'权限节点添加',
								'menu' 				=>'平台菜单查看',
								'menuAdd' 			=>'平台菜单添加',
								'menuDelete' 		=>'平台菜单删除',
								),
			'issystem'		=> TRUE
		);
		parent::_Mycontroller();
		parent::check_login();
		parent::dopower($action_array);
	}
	
	/**
	 * 清除缓存
	 */
	function updatecache(){
	
		$this->load->model('system_note');
		$this->system_note->writecache();
		show_msg('节点缓存更新成功！!',site_url('control_panel/development_center/index'),0,1000);
	}
	
	/**
	 * 平台菜单
	 */
	function menu () {
		
		$this->load->model('menu_note', '', TRUE);
		$result = $this->menu_note->getChildListAll(0);
		
		foreach ($result as $k => $v){
			
			$v['name'] = '<span style="font-weight:bold">'.$v['name'].'</span>';
			$level = str_repeat('　 ',$v['level']-1);
			$level .= '|—';
			$v['pre'] = $level;
			$lists[] = $v;
		}
		$data['lists']  = $lists;
		// var_dump($data['lists']);die;
		
		$data['menus_menus'] = array(
				array(
					'name'=>'添加菜单',
					'url'=>site_url('control_panel/development_center/menuAdd')
				),
				array(
					'name'=>'刷新',
					'url'=>site_url('control_panel/development_center/menuUpdateCache')
				)
		); 
		$data['topLocation'] = '<a href="'.site_url('control_panel/development_center/menu').'"><u>平台菜单</u></a>&nbsp;/&nbsp;菜单列表'; 
		$this->template->display('admin/control_panel/development_center/menu_index.shtml',$data);
	}
	/**
	 * 添加菜单
	 */
	public function menuAdd(){
		
		$this->load->helper('cookie');
		$this->load->model('menu_note');
		// $this->load->model('system_note');
		
		if (isset($_POST['act']) && $_POST['act'] == 'ok') {
			$data = array();
			$data['reid'] 	= $_POST['reid'];
			$data['name'] 	= trim($_POST['name']);
			$data['image'] 	= $_POST['image'];
			$data['nodeid'] = $_POST['nodeid'];
			$data['url'] 	= $_POST['url'];
			$data['parameter'] = $_POST['parameter'];
			$data['target'] 		= $_POST['target'];
			$data['description'] 	= $_POST['description'];
			$data['style'] 			= $_POST['style'];
			$data['js'] 			= $_POST['js'];
			$data['sort'] 			= $_POST['sort'];
			$data['isopen'] 		= $_POST['isopen'];
			$data['is_check'] 		= $_POST['is_check'];
			if ($data['reid'] != 0) {
				// 第3级菜单下面禁止添加子菜单
				$result = $this->menu_note->getParentList($data['reid']);
				if (count($result) >= 3) {
					show_msg('错误！此菜单下面禁止添加子菜单！',site_url('control_panel/development_center/menuAdd'),0,1000);
				
				}
			}
			$num = $this->db->insert('menu',$data);
			set_cookie('menuadd',$_POST['reid'],3600);
			set_cookie('menuadd_nodeid',$_POST['nodeid'],3600);
			
			$this->load->model('menu_note');
			$this->menu_note->writecache();
			show_msg('菜单添加成功！',site_url('control_panel/development_center/menu'),0,1000);
		}
		
		
		$data['menuSelect'] = $this->menu_note->getMenuSelect(get_cookie('menuadd'),'','20');
		// $data['nodeSelect'] = $this->system_note->getNodeSelect(get_cookie('menuadd_nodeid'),'nodeid',20);
		$data['menus_menus'] = array(
				array(
					'name'=>'菜单列表',
					'url'=>site_url('control_panel/development_center/menu')
				)
		); 
		$data['topLocation'] = '<a href="'.site_url('control_panel/development_center/menu').'"><u>平台菜单</u></a>&nbsp;/&nbsp;添加菜单'; 
		
		$this->template->display('admin/control_panel/development_center/menu_add.shtml',$data);

	}
	/**
	 * 菜单删除
	 */
	public function menuDelete(){
		
		$id = $this->input->post('id') ? (int)$this->input->post('id') : '';
		if (empty($id)) {
			response('操作失败！','','1001');
		}
		$where['id'] = $id;
		$data['is_check'] = '0';
		$this->db->update('menu',$data,$where);
		$this->load->model('menu_note');
		$this->menu_note->writecache();
		response('操作成功！','','1000');
	}
	/**
	 * 清除缓存
	 */
	function menuUpdateCache(){
		
		$this->load->model('menu_note');
		$this->menu_note->writecache();
		show_msg('刷新成功！',site_url('control_panel/development_center/menu'),0,1000);
	}
	
	/**
	 * 更新排序
	 */
	function menuUpdateSort(){
		
		$sortrank = $_POST['sortrank'];
		foreach ($sortrank as $k=>$v){
			$sql =" UPDATE ".$this->db->dbprefix('menu')." 
					SET sort = '".$v."'
					WHERE id = '".$k."'";
			$this->db->query($sql);
		}
		$this->load->model('menu_note');
		$this->menu_note->writecache();
		show_msg('刷新成功！',site_url('control_panel/development_center/menu'),0,1000);
	}
}

// end development_center.php