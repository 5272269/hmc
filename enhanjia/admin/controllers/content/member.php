<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 会员管理
 *   
 */
class Member extends MY_Controller {
	/**
	 * 初始化
	 */
	function __construct() {
		
		$action_array = array(
			'controller'	=> array('name'=>'会员管理','key'=>'member'),
			'class'			=> array(
									'index' =>'会员列表',
									'del' 	=>'禁止登陆'
								),
			'issystem'		=> TRUE
		);
		parent::_Mycontroller();
		parent::check_login();
		parent::dopower($action_array);
		
	}

	/**
	 * 会员列表
	 */
	function index() {
		$page = $_GET['page'] ? $_GET['page'] : 0;
		$screening['keywords'] = $_GET['keywords'] ? $_GET['keywords'] : '';
		$screening['status'] = $_GET['status'] ? $_GET['status'] : 0;
		$screening['start_time'] = $_GET['start_time'] ? $_GET['start_time'] : '';
		$screening['end_time'] = $_GET['end_time'] ? $_GET['end_time'] : '';
		
		$this->load->model('member_model');

		$data = $this->member_model->lists($page,$screening);

		$this->template->display('admin/content/member/index.shtml',$data);
	}

	/**
	 * 禁止登陆
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
				$this->db->update('member',$data);
			}

			response('','',1000);
		}
	}

	/**
	 * 邮箱测试
	 */
	function test_email() {
		$smtp_host = $this->input->post('smtp_host');
		$smtp_user = $this->input->post('smtp_user');
		$smtp_pass = $this->input->post('smtp_pass');
		$smtp_port = $this->input->post('smtp_port');
		$sender_email = $this->input->post('sender_email');
		$sender_name = $this->input->post('sender_name');
		$subject = $this->input->post('subject');
		$test_email = $this->input->post('test_email');

		$content = '<p>这是一个测试邮件</p>';

		$this->load->library('email');

		/*email参数*/  
        $config['protocol'] = 'smtp';
        /*smtp服务器*/
        $config['smtp_host'] = $smtp_host;
        /*smtp用户名*/
        $config['smtp_user'] = $smtp_user;
        /*smtp密码*/
        $config['smtp_pass'] = $smtp_pass;
        /*smtp端口号*/
        $config['smtp_port'] = $smtp_port;
        /*字符集*/
        $config['charset'] = 'utf-8';
        /*是否自动换行*/ 
        $config['wordwrap'] = TRUE;
        /*邮件类型*/
        $config['mailtype'] = 'html';

        $this->email->initialize($config);              
          
        /*发件人信息*/ 
        $this->email->from($sender_email, $sender_name);
        /*收件人邮箱*/
        $this->email->to($test_email);
        /*邮件主题*/ 
        $this->email->subject($subject);
        /*邮件内容*/
        $this->email->message($content);
        /*发送邮件*/
        if($this->email->send()){
        	response('','发送成功',1000);
        }
        else{
        	response('','发送失败',1000);
        }
	}

	/**
	 * 恢复登录
	 */
	function recovery() {
		$id = $this->input->post('id') ? $this->input->post('id') : '';
		if(empty($id)){
			response('参数错误！','',1001);
		}
		else{
			$data = array('status'=>'1');
			$this->db->where('id',$id);
			$this->db->update('member',$data);

			response('','',1000);
		}
	}
}
