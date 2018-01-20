<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class index extends MY_Controller {

	function __construct() {
	
		parent::_Mycontroller();
		$this->load->model('column_model');
	}
    /**
     * 首页
     */
	function index() {
		$data = array();
		$this->template->display('application/index.shtml', $data);
	}
}
/* End of file *.php */
/* Location: ./application/controllers/*.php */