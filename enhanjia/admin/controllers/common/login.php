<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*登录注销*/

class login extends MY_Controller {
	
	function __construct() {
		parent::_Mycontroller();
		$this->load->model('admin_model');
	}
	
	/*判断是否登录*/
	function index() {
		
		$is_login = parent::is_login();
		if ($is_login) {
			redirect(site_url('app_center'));
		}
		else{
			$this->load->model('platform_setting_model');
			$sysconf = $this->platform_setting_model->getCache();
			$data['sitename'] = $sysconf['siteName']['value'];
			$this->template->display('admin/login/login.shtml',$data);
		}	
	}
	
	/*登录验证*/
	function check_login() {

		$is_login = parent::is_login();
		if (!$is_login) {
			$username = trim($this->input->post('username'));
			$password = $this->input->post('password');
			if (empty($username)) {
			    response('','请输入账户。','1003');
			}
			if (empty($password)) {
				response('','请输入密码。','1004');
			}
			// 通过接口判断登录帐号的正确性，返回值为数组
			$user_info = $this->admin_model->user_login($username, $password);
			if($user_info == 'no_name'||$user_info == 'error_password'){
				response('','登录失败，账户或密码不正确','1013');
			}
			else{
				$this->session->set_userdata($user_info);
				response('','您已经登录，请等待正在进入平台','1104');
			}
		}
	}
	
	/*注销*/
	function logout() {
		
		$this->session->sess_destroy();
		redirect(site_url('common/login/index'));
	}

}

?>