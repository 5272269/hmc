<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ajax
 */
class ajax extends MY_Controller {

	function __construct() {
	
		parent::_Mycontroller();
		$this->load->model("info_model");
	}

	/*根据url确定控制器*/
	function index() {
		/*分割url*/
		$url_string = $this->uri->uri_string();
		$url_array = explode('/', $url_string);

		/*载入控制器*/
		call_user_func('self::'.$url_array[1]);
	}

  /*电话回拨表单提交*/
  function telback() {
    if(isset($_COOKIE['telback_from'])){
        response('','您已经提交过了！',1002);
    }

    $data['name'] = $this->input->post('name');
    $data['email'] = $this->input->post('email');
    $data['tel'] = $this->input->post('tel');
    $data['question'] = $this->input->post('question');

    if(empty($data['name'])){
      $msg .= "请输入您的姓名！\n";
    }
    if(empty($data['email'])){
      $msg .= "请输入您的邮件地址！\n";
    }
    if(empty($data['tel'])){
      $msg .= "请输入您的联系电话！\n";
    }
    if(empty($data['question'])){
      $msg .= "请输入您的要求！\n";
    }

    if(!empty($msg)){
      response('',$msg,1001);
    }
    else{
      $data['unitid'] = '55';
      $data['pubdate'] = time();
      $data['status'] = '1';
      $data['title'] = $data['name'];

      $this->db->insert('model_form_9',$data);
      setcookie('telback_from','true',time()+24*3600);

      response('','success',1000);
    }

  }

  /*公告查询*/
  function notice() {
    $keywords = $this->input->post("keywrods");
    $notice_start = $this->input->post("notice_start");
    $notice_last = $this->input->post("notice_last");
    $reid = $this->input->post("reid");

    $where = " status = 1 AND unitid = ".$reid;

    if(!empty($keywords)){
      $where .= " AND title LIKE '%".$keywords."%'";
    }
    if(!empty($notice_start)){
      $where .= " AND adddate >= ".strtotime($notice_start);
    }
    if(!empty($notice_last)){
      $where .= " AND adddate <= ".strtotime($notice_last);
    }

    $sql = "SELECT * 
            FROM ".$this->db->dbprefix('model_doc_10')."
            WHERE ".$where."
            ORDER BY adddate DESC";
    $info = $this->db->query($sql)->result_array();

    $html .= '';
    if(!empty($info)){
      foreach($info as $k=>$v){
        $html .= '<li class="icon_style">';
        $html .= '<h4 class="float_l">'.$v['title'].'</h4>';
        $html .= '<span class="float_l">'.date('Y.m.d',$v['adddate']).'</span>';
        $html .= '<a href="'.$v['file'].'" class="float_r"><img src="/templates/images/application/icon_notice.png" /></a>';
        $html .= '</li>';
      }
    }

    $data['html'] = $html;

    response($data,'success',1000);
  }
}
/* End of file *.php */
/* Location: ./application/controllers/*.php */