<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	Class member_model extends Ci_Model {

		/**
		 * 用户登录
		 * @param string $username 用户名
		 * @param string $password 密码
		 * @param int $remember 是否记住登录
		 */
		public function login($username,$password,$remember) {
			$member = $this->db->select('*')
							   ->from('member')
							   ->where('username',$username)
							   ->get()
							   ->row_array();

			if($member['status'] == 2){
				return 2;
			}

			if($member['password'] == $this->encrypt($password)){
				$this->session->set_userdata(array('memberid'=>$member['id'],'username'=>$member['username']));

				$this->db->where('username',$username);
				$this->db->update('member',array('last_time'=>time()));
				
				return 1;
			}
			else{
				return 3;
			}
		}

		/**
		 * 用户注册
		 */
		public function register($data) {
			foreach($data as $v){
				if(empty($v)){
					response('','请填写完整注册信息',1001);
				}
			}

			if(!preg_match('/^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$/',$data['phone'])){
				response('','手机格式不正确',1001);
			}
			if(!preg_match('/^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/',$data['username'])){
				response('','邮箱格式不正确',1001);
			}
			if($data['password'] != $data['is_password']){
				response('','两次密码不一致',1001);
			}
			if(!$this->repeat_info(array('username'=>$data['username']))){
				response('','邮箱已被注册',1001);
			}
			if(!$this->repeat_info(array('phone'=>$data['phone']))){
				response('','手机号已被注册',1001);
			}

			$data['email'] = $data['username'];
			$data['password'] = $this->encrypt($data['password']);
			$data['status'] = 1;
			$data['reg_time'] = time();

			unset($data['is_password']);
			unset($data['clause']);

			$this->db->insert('member',$data);

			$this->session->set_userdata(array('memberid'=>$this->db->insert_id(),'username'=>$data['username']));

			$this->db->where('username',$data['username']);
			$this->db->update('member',array('last_time'=>time()));

			return true;
		}

		/**
		 * 验证找回密码的信息
		 * @param array $data 邮箱和验证码
		 * @return bool true 验证成功
		 */
		public function forgot($data) {
			foreach($data as $v){
				if(empty($v)){
					response('','请填写完整信息',1001);
				}
			}
			
			if(!preg_match('/^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/',$data['email'])){
				response('','邮箱格式不正确',1001);
			}

			if($data['validate'] != $this->session->userdata('verifycode')){
				response('','验证码错误',1001);
			}

			if($this->repeat_info('email = "'.$data['email'].'"')){
				response('','邮箱不存在',1001);
			}

			return true;
		}

		/**
		 * 发送找回密码的邮件
		 */
		public function validate_email($email) {
			$validate_url = $this->generate_url($email);

			/*获取发送email参数*/
			$email_config = $this->get_email_config();

			$content = '<p>尊敬的用户您好，请您点击下方链接用于继续找回密码的步骤，该链接有效时间30分钟</p><a href="'.$validate_url.'">'.$validate_url.'</a>';

			$this->load->library('email');

			/*email参数*/  
	        $config['protocol'] = 'smtp';
	        /*smtp服务器*/
	        $config['smtp_host'] = $email_config['smtp_host'];
	        /*smtp用户名*/
	        $config['smtp_user'] = $email_config['smtp_user'];
	        /*smtp密码*/
	        $config['smtp_pass'] = $email_config['smtp_pass'];
	        /*smtp端口号*/
	        $config['smtp_port'] = $email_config['smtp_port'];
	        /*字符集*/
	        $config['charset'] = 'utf-8';
	        /*是否自动换行*/ 
	        $config['wordwrap'] = TRUE;
	        /*邮件类型*/
	        $config['mailtype'] = 'html';

	        $this->email->initialize($config);              
	          
	        /*发件人信息*/ 
	        $this->email->from($email_config['sender_email'],$email_config['sender_name']);
	        /*收件人邮箱*/
	        $this->email->to($email);
	        /*邮件主题*/ 
	        $this->email->subject($email_config['subject']);
	        /*邮件内容*/
	        $this->email->message($content);
	        /*发送邮件*/
	        if($this->email->send()){
	        	return true;
	        }
	        else{
	        	return false;
	        }
		}

		/**
		 * 获取邮箱配置信息
		 */
		private function get_email_config() {
			$data = $this->db->select('var_name,value')
							 ->where('id IN (46,47,48,49,50,51,52)')
							 ->get('sysconfig')
							 ->result_array();

			$return_data = array();

			foreach($data as $v){
				$return_data[$v['var_name']] = $v['value'];
			}

			return $return_data;
		}

		/**
		 * 验证url是否合法
		 */
		public function validate_url($data) {
			$info = $this->db->select('*')
							 ->from('validate')
							 ->where('id',$data['id'])
							 ->get()
							 ->row_array();

			if(empty($info)){
				return array('msg'=>'无效链接(/"≡ _ ≡)/~┴┴','flag'=>false);
			}

			$validate_key = $this->encrypt_url_key($info);
			
			if($data['key'] != $validate_key){
				return array('msg'=>'验证失败╮(╯_╰)╭','flag'=>false);
			}

			if($info['overduetime'] < time()){
				return array('msg'=>'链接已失效╮(╯_╰)╭','flag'=>false);
			}

			return array('flag'=>true);
		}

		/**
		 * 重置密码
		 * @param array $data 需要邮件链接的验证秘钥，id，新密码
		 * @return bool 重置成功返回true
		 */
		public function reset_password($data){
			$validate = $this->validate_url(array('key'=>$data['key'],'id'=>$data['id']));

			if($validate['flag'] == true){

				$newpassword = $this->encrypt($data['password']);

				$username = $this->db->select('username')
									 ->from('validate')
									 ->where('id',$data['id'])
									 ->get()
									 ->row_array();
				$this->db->where('username',$username['username']);
				$this->db->update('member',array('password'=>$newpassword));

				$this->db->delete('validate',array('id'=>$data['id']));

				/*删除session数据*/
				$this->session->unset_userdata('safe_email');
				$this->session->unset_userdata('safe_key');
				$this->session->unset_userdata('safe_id');

				return true;
			}
			else{
				return $validate['msg'];
			}
		}

		/**
		 * 生成链接
		 * @param string $email 用户邮箱
		 */
		private function generate_url($email) {
			$data['overduetime'] = time()+1800;
			$data['key'] = getRandChar(rand(10,18));
			$data['username'] = $email;

			$this->db->insert('validate',$data);

			$id = $this->db->insert_id();

			$info = $this->db->select('*')
							 ->from('validate')
							 ->where('id',$id)
							 ->get()
							 ->row_array();

			$url_key = $this->encrypt_url_key($info);
			$url_str = site_url('member/reset').'?key='.$url_key.'&id='.$id;

			return $url_str;
		}

		/**
		 * 邮件url加密
		 * @param array $data 生成加密字符串的依据
		 */
		private function encrypt_url_key($data) {
			$url_key = '';
			foreach($data as $v){
				$url_key .= $this->encrypt($v);
			}

			return md5($url_key);
		}

		/**
		 * 密码加密函数
		 * @param string $password 要加密的密码
		 */
		private function encrypt($password) {
			return substr(md5($password),0,16).substr(sha1($password),-16);
		}

		/**
		 * 查询字段是否重复
		 * @param string $where 查询的条件
		 * @return bool true不重复，false重复
		 */
		private function repeat_info($where) {
			$flag = $this->db->select('id')
							 ->from('member')
							 ->where($where)
							 ->get()
							 ->num_rows();
			if($flag == 0){
				return true;
			}
			else{
				return false;
			}
		}
	}

?>