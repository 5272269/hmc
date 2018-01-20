<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 平台设置
 */
class platform_setting extends MY_Controller {
		
	function __construct(){
		$action_array = array(
			'controller'	=> array('name'=>'平台设置','key'=>'platform_setting'),
			'class'			=> array(
								'index'  => '查看设置',
								'update' => '更新设置'
								),
			'issystem'		=> TRUE
		);
		parent::_Mycontroller();
		parent::check_login();
		parent::dopower($action_array);
	}
	
	/**
	 * 设置查看 
	 */
	function index() {
		$data = array();
		$this->load->model('platform_setting_model');
		$data['lists'] = platform_setting_model::getCache();
		$data['menus_menus'] = array(
			array(
				'name'=>'添加配置',
				'url'=>site_url('control_panel/platform_setting/edit')
			)
		); 
		$data['topLocation'] = '<a href="'.site_url('control_panel/platform_setting/index').'"><u>平台设置</u></a>&nbsp;/&nbsp;网站配置'; 
		$this->template->display('admin/control_panel/platform_setting/index.shtml',$data);
		
	}
	/**
	 * 添加设置
	 */
	function edit(){
		
		if ($_POST['dopost'] == 'add') {
			// var_dump($_POST);die;

		    $nvarname 	= $_POST['var_name'];
			$vartype 	= $_POST['type'];
			$varmsg 	= $_POST['info'];
			$nvarvalue 	= $_POST['string_value'];
			$vargroup 	= $_POST['groupid'];
		
			
			if ($varmsg=='') {
				  show_msg("参数描述不能为空!","-1",site_url('control_panel/platform_setting/edit'));
			}
		    if(trim($nvarname)=='' || preg_match("#[^a-z_]#i", $nvarname) ) {
		        show_msg("变量名不能为空并且必须为小写字母组成!","-1",site_url('control_panel/platform_setting/edit'));
		    }
		    $row = $this->db->query("SELECT var_name 
								    FROM ".$this->db->dbprefix('sysconfig')." 
								    WHERE var_name LIKE '$nvarname' ")->row_array();
		    if ( is_array($row) && !empty($row) ) {
		        show_msg("该变量名称已经存在!","-1",site_url('control_panel/platform_setting/edit'));
		    }
		    $row = $this->db->query("SELECT id 
								     FROM ".$this->db->dbprefix('sysconfig')." 
								     ORDER BY id DESC ")->row_array();
		    $id = $row['id'] + 1;
		    $inquery = "INSERT INTO ".$this->db->dbprefix('sysconfig')." (`id`,`var_name`,`info`,`value`,`type`,`groupid`)
		    			VALUES ('$id','$nvarname','$varmsg','$nvarvalue','$vartype','$vargroup')";
		    $rs =  $this->db->query($inquery);
		    if (!$rs) {
		        show_msg("新增变量失败，可能有非法字符！",site_url('control_panel/platform_setting/edit'));
		    }
		    $this->load->model('platform_setting_model');
		    platform_setting_model::writeCache();
		    show_msg("新增变量成功",site_url('control_panel/platform_setting/index'));
		}
		else {
			$data['menus_menus'] = array(
				array(
					'name'=>'配置项',
					'url'=>site_url('control_panel/platform_setting/index')
				)
			); 
			$data['topLocation'] = '<a href="'.site_url('control_panel/platform_setting/index').'"><u>平台设置</u></a>&nbsp;/&nbsp;网站配置'; 
			$this->template->display('admin/control_panel/platform_setting/add.shtml',$data);
		}
	}
	/**
	 * 更新配置
	 */
	function update(){
		
		if ($_POST['dopost'] == 'save') {
			foreach ($_POST as $k=>$v) {
		        $k = preg_replace("#^edit__#", "", $k);
		        $this->db->query("UPDATE ".$this->db->dbprefix('sysconfig')." SET `value`='$v' WHERE var_name='$k' ");
		    }
		    $this->load->model('platform_setting_model');
		    platform_setting_model::writeCache();
		    show_msg("操作成功！",site_url('control_panel/platform_setting/index'));		   
		}
	}
}
// end platformSetting.php