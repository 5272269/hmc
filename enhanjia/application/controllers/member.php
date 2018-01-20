<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 会员
 */
class member extends MY_Controller {

	public function __construct() {
		parent::_Mycontroller();

		$this->load->model('member_model');
	}

	/**
	 * 判断是否登录
	 */
	private function is_login() {
		if($this->session->userdata('memberid') && $this->session->userdata('username')){
			return true;
		}
		else{
			return false;
		}
	}

	/**
	 * 进入登录页面
	 */
	public function login() {
		if($this->is_login()){
			redirect();
		}

		$this->_G['params']['name'] = 'Member Login';
		$this->template->display('member/login.shtml', $data);
	}

	/**
	 * 提交登录信息
	 */
	public function sub_login() {
		if($this->is_login()){
			redirect();
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$remember = $this->input->post('remember');

		if(empty($username) || empty($password)){
			response('','Please enter your login information',1001);
		}

		$flag = $this->member_model->login($username,$password,$remember);

		if($flag == 1){
			response(array('url'=>'http://'.$_SERVER['HTTP_HOST']),'Login successful',1000);
		}
		elseif($flag == 2){
			response('','Your account login is prohibited, please contact the webmaster',1001);
		}
		elseif($flag == 3){
			response('','Wrong username or password',1001);
		}
	}

	/**
	 * 注销
	 */
	public function logon() {
		$this->session->unset_userdata('memberid');
		$this->session->unset_userdata('username');
		
		die('<script type="text/javascript">alert("Logout successful");window.location.href = "'.$_SERVER['HTTP_REFERER'].'"</script>');
	}

	/**
	 * 进入注册页面
	 */
	public function register() {
		if($this->is_login()){
			redirect();
		}

		$this->_G['params']['name'] = 'Member Register';
		$this->template->display('member/register.shtml', $data);
	}

	/**
	 * 提交注册信息
	 */
	public function sub_register() {
		if($this->is_login()){
			redirect();
		}

		$data['username'] = $this->input->post('username');
		$data['phone'] = $this->input->post('phone');
		$data['password'] = $this->input->post('password');
		$data['is_password'] = $this->input->post('is_password');
		$data['clause'] = $this->input->post('clause');

		if($this->member_model->register($data)){
			response(array('url'=>'http://'.$_SERVER['HTTP_HOST']),'Registered, login automatically',1000);
		}
	}

	/**
	 * 进入找回密码页面
	 */
	public function forgot() {
		if($this->is_login()){
			redirect();
		}

		$this->_G['params']['name'] = 'Confirm Account';
		$this->template->display('member/forget.shtml', $data);
	}

	/**
	 * 提交找回密码信息
	 */
	public function sub_forgot() {
		if($this->is_login()){
			redirect();
		}
		if($this->session->userdata('safe_email')){
			response('','Please do not send duplicate messages',1001);
		}

		$data['email'] = $this->input->post('email');
		$data['validate'] = $this->input->post('validate');
		
		if($this->member_model->forgot($data)){
			if($this->member_model->validate_email($data['email'])){
				$this->session->set_userdata(array('safe_email'=>$data['email']));
				response(array('url'=>site_url('member/safe')),'',1000);
			}
		}		
	}

	/**
	 * 进入邮件发送成功页面
	 */
	public function safe() {
		if($this->is_login()){
			redirect();
		}

		$this->_G['params']['name'] = 'Security Certificate';
		$data['safe_email'] = substr_replace($this->session->userdata('safe_email'),'***','1','4');
		$this->template->display('member/forget_safe.shtml', $data);
	}

	/**
	 * 进入重置密码页面
	 */
	public function reset() {
		if($this->is_login()){
			redirect();
		}

		$data['key'] = $this->input->get('key');
		$data['id'] = $this->input->get('id');

		$validate = $this->member_model->validate_url($data);

		if($validate['flag'] == true){
			$this->session->set_userdata(array('safe_key'=>$data['key'],'safe_id'=>$data['id']));

			$this->_G['params']['name'] = 'Reset Password';
			$this->template->display('member/forget_restpw.shtml');
		}
		else{
			die($validate['msg']);
		}
	}

	/**
	 * 提交重置密码信息
	 */
	public function sub_reset() {
		if($this->is_login()){
			redirect();
		}

		$data['password'] = $this->input->post('newpassword');
		$repeatpassword = $this->input->post('repeatpassword');

		if(empty($data['password'])){
			response('','Please enter a new password',1001);
		}
		if(empty($repeatpassword)){
			response('','Enter the new password again',1001);
		}
		if($data['password'] != $repeatpassword){
			response('','The two passwords do not match',1001);
		}

		$data['id'] = $this->session->userdata('safe_id');
		$data['key'] = $this->session->userdata('safe_key');

		$validate = $this->member_model->reset_password($data);

		if($validate === true){
			response(array('url'=>site_url('member/login')),'Password reset successful, please visit',1000);
		}
		else{
			response('',$validate,1001);
		}
	}

	/**
	 * 基本信息评估
	 */
	public function questionnaire() {
		if(!$this->is_login()){
			response(array('url'=>site_url('member/login')),'Please login first',1002);
		}

		$info = $_POST;

		$unitid_array = array('8'=>'11','9'=>'13','13'=>'19');

		$this->load->model('index/form_model');

		$field_data = $this->form_model->form_info($info['modelid']);

		if(empty($field_data)){
			response('','Error',1001);
		}

		foreach($field_data as $k=>$v){
			if(isset($info[$v['field']])){
				if($v['field'] == 'birthday'){
					$filter_before_data[$v['field']] = strtotime($info[$v['field']]);
				}
				else{
					$filter_before_data[$v['field']] = $info[$v['field']];
				}
			}
			else{
				response('','Please complete the form',1001);
			}
		}

		$filter_before_data['unitid'] = $unitid_array[$info['modelid']];
      	$filter_before_data['pubdate'] = time();
      	$filter_before_data['status'] = '1';
      	$filter_before_data['title'] = $this->session->userdata('username');
      	
		$this->db->insert('model_form_'.$info['modelid'],$filter_before_data);

		response('','Submitted successfully',1000);
	}

	/**
	 * 意见箱
	 */
	public function idea() {
		if(!$this->is_login()){
			response(array('url'=>site_url('member/login')),'Please login first',1001);
		}

		$idea = $this->input->post('idea');

		if(empty($idea)){
			response('','Please enter a comment',1000);
		}

		$data['idea'] = $idea;
		$data['unitid'] = 14;
		$data['pubdate'] = time();
		$data['status'] = '1';
		$data['title'] = $this->session->userdata('username');

		$this->db->insert('model_form_10',$data);

		response('','Submitted successfully',1000);
	}

	/**
	 * 验证码
	 */
	public function verifycode() {
		$img_w       = 80;// 设置图片宽
		$img_h       = 20;// 设置图片高
		$pixel_num   = 200;//点越多干扰越大
		$is_set_line = true;// 启用干扰线
		$pixel_mode  = 2;// 干扰点模式,1,同色;2，杂色

		// 随机数产生器
		list($usec, $sec) = explode(' ', microtime());
		$authnum = (float) $sec + ((float) $usec * 100000);
		$authnum = substr($authnum, 4, 4);

		$this->load->library('session');
		// 加入session
		$this->session->set_userdata('verifycode',$authnum);

		//生成验证码图片
		Header("Content-type: image/PNG");
		$im = imagecreatetruecolor($img_w, $img_h);

		$bg_color = ImageColorAllocate($im, mt_rand(250,255),mt_rand(250,255),mt_rand(250,255));

		// 绘制背景
		imagefill($im,0,0,$bg_color);

		$total_width = 0;
		$word_info = array();

		// 循环，获取文字信息
		$word_length = strlen($authnum);
		for($ii=0; $ii<$word_length; $ii++){
		    $word_space = mt_rand(1,5);
		    $font = rand(3,5);
		    mt_rand(1,9)%2 == 0?$top = 1:$top = 3;
		    $word_info[$ii]['char']   = substr($authnum,$ii,1);
		    $word_info[$ii]['font']   = $font;
		    $word_info[$ii]['offset'] = $top;
		    if($ii == 0){
		        $word_info[$ii]['width'] = 0;
		    }
		    $word_info[$ii]['width']  = imageFontWidth($font)+$word_space;
		    $word_info[$ii]['height'] = imageFontHeight($font);
		    $word_info[$ii]['color']  = imageColorAllocate($im, mt_rand(0,50),mt_rand(0,150),mt_rand(0,200));

		    // 文字总宽度
		    $total_width += $word_info[$ii]['width'];

		    // 取第一个字体的高度
		    if($ii == 0){
		        $total_height = imagefontHeight($font);
		    }
		}

		// 计算偏移
		$offset_x = floor(($img_w - $total_width)/2);
		$offset_y = floor(($img_h - $total_height)/2);

		// 填充验证码
		$wid = 0;
		$i = 0;
		foreach($word_info as $key=>$val){
		    if($i>0){
		        $wid += $val['width'];
		    }
		    imagestring($im, $val['font'], $offset_x + $wid, $val['offset'] + $offset_y,
		                $val['char'], $val['color']);
		    $i++;
		}
		switch($pixel_mode){
		    case 1:
		        $pixel_color  = ImageColorAllocate($im,
		                                        mt_rand(50,255),
		                                        mt_rand(50,255),
		                                        mt_rand(50,255));
		        // 干扰象素
		        for($i=0;$i<$pixel_num;$i++){
		            imagesetpixel($im, mt_rand()%$img_w , mt_rand()%$img_h , $pixel_color);
		        }
		        break;
		    case '2':
		        // 干扰象素
				for ($i=0;$i<=128;$i++){
					$pixel_color = imagecolorallocate ($im, rand(0,255), rand(0,255), rand(0,255));
					imagesetpixel($im,mt_rand(2,128),mt_rand(2,38),$pixel_color);
				}
		        break;

		    default:
		        $pixel_color  = ImageColorAllocate($im,
		                                        mt_rand(50,255),
		                                        mt_rand(50,255),
		                                        mt_rand(50,255));
		        // 干扰象素
		        for($i=0;$i<$pixel_num;$i++){
		            imagesetpixel($im, mt_rand()%$img_w , mt_rand()%$img_h , $pixel_color);
		        }
		        break;
		}
		ImagePNG($im);
		ImageDestroy($im);
	}
}