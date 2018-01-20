<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 安全中心
 */
class security_center extends MY_Controller {
	/**
	 * 初始化
	 */
	function __construct() {
		$action_array = array(
			'controller'	=> array('name'=>'安全中心','key'=>'security_enter'),
			'class'			=> array(
								'loginlog' 		=>'操作日志',
								),
			'issystem'		=> TRUE
		);
		parent::_Mycontroller();
		parent::check_login();
		parent::dopower($action_array);
	}
    /**
     * 登录日志
     */
	function loginlog()
	{
		$sql = $where = "";
		
		$adminid = $this->input->get('adminid');
		$cip	 = $this->input->get('cip');
		$dtime	 = $this->input->get('dtime');
		
		if(empty($adminid)) $adminid = 0;
		if(empty($cip)) $cip = "";
		if(empty($dtime)) $dtime = 0;
		
		if($cip!="") $where .= " AND l.loginip LIKE '%$cip%' ";
		if($dtime>0)
		{
		    $nowtime = time();
		    $starttime = $nowtime - ($dtime*24*3600);
		    $where .= " AND l.logintime>'$starttime' ";
		}
		
		$sql = "SELECT 1 FROM ".$this->db->dbprefix('login_log')." l
		     	WHERE 1=1 $where 
		     	ORDER BY l.id DESC
		     	";
		$rst = $this->db->query($sql);
		
		$this->load->helper('page');
		isset($_GET['page']) ? $page = (int)$_GET['page'] : $page = '0';
		$base_url = site_url('control_panel/security_center/loginlog').'?'.rand(10000,99999).time();
		$page_size = '13';
		$beginpages = $page>1?($page-1)*$page_size:'0';
		$data['counts'] = $rst->num_rows();
		$data['pages']  = page2($base_url, $rst->num_rows(), $page_size, $page);
		
		// 根据用户uid 检索所有关联需求
		$sql = "SELECT l.* FROM ".$this->db->dbprefix('login_log')." l
		     	WHERE 1=1 $where 
		     	ORDER BY l.id DESC
		     	LIMIT $beginpages,$page_size ";
		
		$data['list'] = $this->db->query($sql)->result_array();
		$data['menus_menus'] = array(
			array(
				'name'=>'刷新',
				'url'=>site_url('control_panel/security_center/loginlog')
			)
		); 
		$data['topLocation'] = '<a href="'.site_url('control_panel/security_center/loglogin').'"><u>平台管理</u></a>&nbsp;/&nbsp;登录日志'; 
		$this->template->display('admin/control_panel/security_center/log_login.shtml',$data);
	}
}
// end security_center.php