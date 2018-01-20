<?php

class MY_Controller extends CI_Controller {

	public $_G;
	/*重写构造方法*/
	function _Mycontroller() {
		parent::__construct();
	}

	/*判断是否登录*/
	function is_login() {
		if($this->session->userdata('id')&&$this->session->userdata('role_id')&&$this->session->userdata('username')&&$this->session->userdata('realname')){
			return true;
		}elseif(!empty($_GET['token']) && self::check_key() == true){
			$sql_do = " SELECT id FROM ".$this->db->dbprefix('admin')." 
						WHERE id = '".$this->input->get('id')."' AND role_id = '".$this->input->get('role_id')."' AND username = '".$this->input->get('username')."' AND realname = '".$this->input->get('realname')."' 
						LIMIT 1 ";
			$ispower = $this->db->query($sql_do);
			if ($ispower->num_rows() == '1') {
				$user_info['id']=$this->input->get('id');
				$user_info['role_id']=$this->input->get('role_id');
				$user_info['username']=$this->input->get('username');
				$user_info['realname']=$this->input->get('realname');
				$this->session->set_userdata($user_info);
				redirect('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
			} else {
				return false;
			}
			
		}else{
			return false;
		}
	}

	/*控制器中判断是否登录*/
	function check_login() {
		if(self::is_login() == false){
			redirect(site_url('common/login/index'));
		}
	}
	//获取管理员信息
	function _get_user_info(){

		$sql = " SELECT * FROM ".$this->db->dbprefix('admin')." 
						WHERE id = '".$this->session->userdata('id')."'
						LIMIT 1 ";
		$rst = $this->db->query($sql)->row_array();
		return $rst;
	}
	
	/*API接口安全监测*/
	function check_key($return=false) {
		if($this->input->get('action')!=$this->uri->segments['3']){
			if($return){
				return false;
			}else{
				die();
			}
		}
		$keys=array_keys($_GET);
		$string='';
		foreach($keys as $v){
			if($v!='token'){
				$string.=$this->input->get($v).'<|@|>';
			}
		}
		$sql = "SELECT value  
				FROM ".$this->db->dbprefix('sysconfig')." 
				WHERE var_name = 'key'
				LIMIT 1";
		$value = $this->db->query($sql)->row_array();
		if(sha1(md5($string).$value['value'])!=$this->input->get('token')){
			if($return){
				return false;
			}else{
				die();
			}
		}
		return true;
	}
	
	/**
	 * 权限检测
	 */
	function dopower($action_array){
		
		// 只有控制器需要验证权限 并且管理用户组是非超级管理员的时候进行权限验证
			$role_id=$this->session->userdata('role_id');
		if ($action_array['issystem'] && $role_id <> '1') {
			$dofunctionname_parent 		= $this->uri->segments['1'];
			$dofunctionname_controller 	= $this->uri->segments['2'];
			$dofunctionname_class 		= $this->uri->segments['3'];
			if (empty($dofunctionname_controller) && empty($dofunctionname_class)) {
				return true;
			}
			if ( empty($action_array['class'][$dofunctionname_class]) ) {
				return true;
			}
			// 根据类名称查找
			
			$sql = "SELECT id 
					FROM ".$this->db->dbprefix('system_node')." 
					WHERE code = '".strtolower($dofunctionname_parent)."' and reid = '0'  
					LIMIT 1";
			$reidarr 		= $this->db->query($sql)->row_array();

			$sql_function 	= " SELECT id FROM ".$this->db->dbprefix('system_node')." 
								WHERE reid = '".$reidarr['id']."' AND code = '".strtolower($dofunctionname_controller)."'
								LIMIT 1 ";
			$functionarr 	= $this->db->query($sql_function)->row_array();
			
			$sql_class 		= " SELECT id FROM ".$this->db->dbprefix('system_node')." 
								WHERE reid = '".$functionarr['id']."' AND code = '".strtolower($dofunctionname_class)."'
								LIMIT 1 ";
			$classarr 	    = $this->db->query($sql_class)->row_array();
			
			$sql_do = " SELECT id FROM ".$this->db->dbprefix('admin_role')." 
						WHERE id = '".$role_id."' 
						AND ( auth like '%,".$reidarr['id'].",%' OR auth like '%,".$classarr['id'].",%' OR auth like '%,".$functionarr['id'].",%' OR auth ='all' ) 
						LIMIT 1 ";
			$ispower = $this->db->query($sql_do);
			if ($ispower->num_rows() == '1') {
				return true;
			} else {
				show_msg('您暂时无该操作权限','-1');
			}
		} else {
			return true;
		}
	}
}

?>
