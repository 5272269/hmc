<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//管理员和用户组模型

class admin_model extends Ci_Model {

	/*获取管理员列表*/
	public function get_admin_list($id) {
		if($id){
			$addsql = " AND role_id = $id";
		}
		$sql = "SELECT id,role_id,username,realname,login_count,last_login_time,last_login_ip,modify_time,create_time
				FROM ".$this->db->dbprefix('admin')."
				WHERE status = 0".$addsql;
		$info = $this->db->query($sql)->result_array();
		return $info;
	}

	/*判断管理员名字是否存在*/
	public function is_username($username,$id) {
		if($id){
			$addsql = "AND id <> $id";
		}
		$sql = "SELECT 1 
				FROM ".$this->db->dbprefix('admin')." 
				WHERE username = '".$username."'
				AND status = 0 ".$addsql;
		$info = $this->db->query($sql)->num_rows();
		return $info;
	}

	/*根据管理员id获取管理员信息*/
	public function get_admin_info($id) {
		$sql = "SELECT id,role_id,username,realname,posts,email,qq,phone,mobile,cardid,birthday,question,answer
			    FROM ".$this->db->dbprefix('admin')."
			    WHERE id = '".$id."'
			    AND status = 0";
		$info = $this->db->query($sql)->row_array();
		return $info;
	}

	/*根据管理员id删除管理员*/
	public function del_admin($id) {
		$sql = "UPDATE ".$this->db->dbprefix('admin')." 
				SET status = '1' 
				WHERE id = ".$id;
		$this->db->query($sql);
	}

	/*获取用户组列表*/
	public function get_group() {
		$sql = "SELECT id,name 
				FROM ".$this->db->dbprefix('admin_role')."
				WHERE is_check = 1";
		$info = $this->db->query($sql)->result_array();
		return $info;
	}

	/*判断用户组名字是否存在*/
	public function is_group_name($name,$id) {
		if($id){
			$addsql = "AND id <> $id";
		}
		$sql = "SELECT 1 
				FROM ".$this->db->dbprefix('admin_role')." 
				WHERE name = '".$name."'
				AND is_check = 1 ".$addsql;
		$info = $this->db->query($sql)->num_rows();
		return $info;
	}

	/*根据用户组id获取用户组信息*/
	public function get_group_info($id) {
		$sql = "SELECT id,name,description,auth
				FROM ".$this->db->dbprefix('admin_role')."
				WHERE is_check = 1 AND id = ".$id;
		$info = $this->db->query($sql)->row_array();
		$info['auth'] = explode(',',$info['auth']);
		return $info;
	}

	/*根据用户组id删除用户组*/
	public function del_group($id) {
		$sql = "UPDATE ".$this->db->dbprefix('admin_role')." 
				SET is_check = '0' 
				WHERE id = ".$id;
		$this->db->query($sql);
	}

	/*用户登录验证*/
	public function user_login($username,$password) {
		$sql = "SELECT id,role_id,username,password,realname
				FROM ".$this->db->dbprefix('admin')."
				WHERE username = '".$username."'
				AND status = 0";
		$user_info = $this->db->query($sql)->row_array();
		if(empty($user_info)){
			return 'no_name';		//用户不存在
		}
		if(md5($password)!=$user_info['password']){
			
    		$login_logdata = array(
               'typeid' 	=> '1' ,
               'username' 	=> $username,
               'password' 	=> $password,
    		   'logintime' 	=> time(),
               'loginip' 	=> get_client_ip(),
            );

			$this->db->insert('login_log', $login_logdata); 
    		
    		return 'error_password';		//密码错误
		}
		else{
			$sql = "UPDATE ".$this->db->dbprefix('admin')."
					SET login_count = login_count+1, last_login_time = ".time()." ,last_login_ip = '".$this->input->ip_address()."'
					WHERE id = '".$user_info['id']."'";
			$this->db->query($sql);
			return $user_info;	//登录成功
		}
	}

}
?>