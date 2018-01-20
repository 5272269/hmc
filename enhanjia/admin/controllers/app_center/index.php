<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
*应用中心首页
*/
class index extends MY_Controller {

	function __construct() {
		parent::_Mycontroller();
		parent::check_login();
		$this->load->model('column_model');
		//获取系统配置 全局变量
		$this->load->model('platform_setting_model');
	}
	
	/*应用中心首页*/
	function index() {
		//系统配置
		$sysconf = platform_setting_model::getCache();
		$data['siteName'] = $sysconf['siteName']['value'] ? $sysconf['siteName']['value'] : '网站后台';

		$data['userInfo'] = $this->_get_user_info();

		$this->G['role_id'] = $data['userInfo']['role_id'];
		
		//系统菜单
		$this->load->model('menu_note');
		$data['menus'] 	= $this->menu_note->getAccessMenu(0);
		// var_dump($data['menus'][27]['child']);die;

		//栏目树
		$data['result'] = $this->column_model->get_column_tree();
		
		$this->template->display('admin/app_center/welcome.shtml',$data);
	}
	//首页
	function website(){
		$data['PHP_GD']  = '';
		if(extension_loaded('gd')) {
			if(function_exists('imagepng')) $data['PHP_GD'] .= 'png';
			if(function_exists('imagejpeg')) $data['PHP_GD'] .= ' jpg';
			if(function_exists('imagegif')) $data['PHP_GD'] .= ' gif';
		}
		$data['PHP_JSON'] = '0';
		if(extension_loaded('json')) {
			if(function_exists('json_decode') && function_exists('json_encode')) $data['PHP_JSON'] = '1';
		}

		$this->template->display('admin/app_center/index.shtml',$data);
	}

}
/* End of file index.php */