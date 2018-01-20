<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BY wanchao
 */
class models extends MY_Controller {

	private $type_name;

	function __construct() {
		$action_array = array(
			'controller'	=> array('name'=>'模型管理','key'=>'models'),
			'class'			=> array(
									'index' =>'模型查看',
									'add' 	=>'模型添加',
									'edit'	=>'模型编辑',
									'del' 	=>'模型删除',
								),
			'issystem'		=> TRUE
		);
		parent::_Mycontroller();
		parent::check_login();
		parent::dopower($action_array);

		$this->type_name = array(
			'doc' => '文档',
			'catalog' => '目录',
			'link' => '外链',
			'page' => '页面',
			'form' => '表单'
		);
	}

    /**
     * 首页
     */
	function index() {

 		$sql = "SELECT * 
				FROM ".$this->db->dbprefix('models_config')." 
				ORDER BY id DESC";
		$dlist = $this->db->query($sql)->result_array();
		foreach ($dlist as $k=>$v) {
			$v['type_name'] = $this->type_name[$v['type']];
		  	$data['lists'][$v['id']] = $v;
		}

		$this->template->display('admin/content/models/index.shtml',$data);
	}

    /**
     * 模型新增
     */
	function add() {
		$dopost = $this->input->post('dopost');
		if ($dopost=='save') {
			$keys=array_keys($_POST);
			$field=array();
			$eng = array();
			foreach ($_POST as $key => $value) {
				if(strpos($key,"engname") !==false){
					$n=substr($key,7);
					$eng[$n] = $value;
				}
			}
			foreach ($eng as $key => $value) {
				if(in_array($value,array('title','id','status','pubdate','unitid','check'))){
					 show_msg('英文名称已经存在','-1');
				}
			}
			
			foreach($keys as $v){
				if(strpos($v,"title") !== false){
					$n=substr($v,5);
					$arr=array();
					$arr['field']=$eng[$n];
					$arr['title']=$_POST['title'.$n];
					$arr['type']=$_POST['type'.$n];
					$arr['sort']=$_POST['sort'.$n] ? $_POST['sort'.$n] : 0;
					if($arr['type']=='select' || $arr['type']=='checkbox' || $arr['type']=='radio'){
						$arr['value']=explode(",",$_POST['value'.$n]);
					}else{
						$arr['value']=array();
					}
					$field[$n]=$arr;
					unset($arr);
				}
			}

			$field=json_encode($field); 

		    $data['name'] 			= $this->input->post('name');
		    $data['description'] 	= $this->input->post('description');
		    $data['type'] 			= $this->input->post('type');
		    $data['field'] 			= $field;

			$this->db->insert('models_config',$data);
			
			$id=$this->db->insert_id();
			$model_type=$this->input->post('type');

			$this->load->dbforge();
			$this->dbforge->add_field('id');
			$this->dbforge->add_field(array('unitid'=>array( 'type' => 'INT','constraint' => '10')));
			$this->dbforge->add_field(array('title'=>array( 'type' => 'VARCHAR','constraint' => '50')));
			$this->dbforge->add_field(array('status'=>array( 'type' => 'INT','constraint' => '10')));
			$this->dbforge->add_field(array('pubdate'=>array( 'type' => 'INT','constraint' => '10')));
			if ($model_type=='form') {
				$this->dbforge->add_field(array('check'=>array( 'type' => 'INT','constraint' => '10')));
			}
			
			$field=json_decode($field,true);
			$fields=array();
			foreach($field as $k => $v){
				switch($v['type']){
					case 'text':
						$this->dbforge->add_field("`".$v['field']."` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT  '' COMMENT  '".$v['title']."'");
						break;
					case 'textarea':
						$this->dbforge->add_field("`".$v['field']."` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT  '".$v['title']."'");
						break;
					case 'pic':
						$this->dbforge->add_field("`".$v['field']."` INT( 10 ) NOT NULL DEFAULT  '0' COMMENT  '".$v['title']."'");
						break;
					case 'pics':
						$this->dbforge->add_field("`".$v['field']."` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT  '' COMMENT  '".$v['title']."'");
						break;
					case 'file':
						$this->dbforge->add_field("`".$v['field']."` INT( 10 ) NOT NULL DEFAULT  '0' COMMENT  '".$v['title']."'");
						break;
					case 'files':
						$this->dbforge->add_field("`".$v['field']."` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT  '' COMMENT  '".$v['title']."'");
						break;
					case 'radio':
						$this->dbforge->add_field("`".$v['field']."` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT  '' COMMENT  '".$v['title']."'");
						break;
					case 'checkbox':
						$this->dbforge->add_field("`".$v['field']."` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT  '' COMMENT  '".$v['title']."'");
						break;
					case 'password':
						$this->dbforge->add_field("`".$v['field']."` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT  '' COMMENT  '".$v['title']."'");
						break;
					case 'editor':
						$this->dbforge->add_field("`".$v['field']."` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT  '".$v['title']."'");
						break;
					case 'date':
						$this->dbforge->add_field("`".$v['field']."` INT( 10 ) NOT NULL DEFAULT  '0' COMMENT  '".$v['title']."'");
						break;
					case 'select':
						$this->dbforge->add_field("`".$v['field']."` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT  '' COMMENT  '".$v['title']."'");
						break;
					case 're_select':
						$this->dbforge->add_field("`".$v['field']."` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT  '' COMMENT  '".$v['title']."'");
						break;
					default:
						
				}

			}
			$this->dbforge->create_table('model_'.$model_type.'_'.$id, TRUE);
			
		    show_msg('新增成功',site_url('content/models/index'),0,1000);
		
		}
		$this->template->display('admin/content/models/add.shtml');
	}

    /**
     * 模型修改
     */
	function edit() {
		$dopost = $this->input->post('dopost');
		if ($dopost=='save') {
			$id= $this->input->post('id');
			$engnum= $this->input->post('engnum');
			$model_type=$this->input->post('type');
			$keys=array_keys($_POST);
			$field=array();
			$eng = array();

			foreach ($_POST as $key => $value) {
				if(strpos($key,"engname") !==false){
					$n=substr($key,7);
					$eng[$n] = $value;
				}
			}


			//验证英文字段名
			$sql = " SELECT * 
					FROM ".$this->db->dbprefix('models_config')." 
					WHERE id = $id";
			$info_f = $this->db->query($sql)->row_array();
			$eng_before=$info_f['field'];
			$ef=json_decode($eng_before,TRUE);
			foreach ($ef as $key => $value) {
				$engbefore[] = $value['field'];
			}
		
			foreach ($eng as $key => $value) {
				if ($key>$engnum) {
					if(in_array($value,$engbefore) || in_array($value,array('title','id','status','pubdate','unitid','check'))){
					 show_msg('英文名称已经存在','-1');
				}
				}
			}

			foreach($keys as $v){
				if(strpos($v,"title") !== false){
					$n=substr($v,5);
					$arr=array();
					$arr['field']=$eng[$n];
					$arr['title']=$_POST['title'.$n];
					$arr['type']=$_POST['type'.$n];
					$arr['sort']=$_POST['sort'.$n] ? $_POST['sort'.$n] : 0;
					if($arr['type']=='select' || $arr['type']=='checkbox' || $arr['type']=='radio'){
						$arr['value']=explode(",",$_POST['value'.$n]);
					}else{
						$arr['value']=array();
					}
					$field[$n]=$arr;
					unset($arr);
				}
			}
			$field=json_encode($field); 
			
			//修改medel_doc表
			$sql = " SELECT * 
					FROM ".$this->db->dbprefix('models_config')." 
					WHERE id = $id";
			$info = $this->db->query($sql)->row_array();
			$field_before=$info['field'];
			$field_after=$field;
			
			$fb=json_decode($field_before,TRUE);
			$fa=json_decode($field_after,TRUE);

			$this->load->dbforge();
			foreach($fb as $k=>$v){
				if(!array_key_exists($k,$fa)){
					$this->dbforge->drop_column('model_'.$model_type.'_'.$id, $v['field']);
				}
			}
			$field_arr=array('text'=>1,'textarea'=>2,'pic'=>3,'pics'=>1,'file'=>3,'files'=>1,'radio'=>1,'checkbox'=>1,'password'=>1,'editor'=>2,'date'=>3,'select'=>1,'re_select'=>1);

			foreach($fa as $k=>$v){
				if(array_key_exists($k,$fb)){
					if($field_arr[$v['type']]!=$field_arr[$fb[$k]['type']]){
						switch($field_arr[$v['type']]){
							case '1':
								$this->dbforge->modify_column('model_'.$model_type.'_'.$id, array($eng[$k] => array('type' => 'VARCHAR','constraint' => '255', 'default' => '')));
								break;
							case '2':
								$this->dbforge->modify_column('model_'.$model_type.'_'.$id, array($eng[$k] => array('type' => 'TEXT')));
								break;
							case '3':
								$this->dbforge->modify_column('model_'.$model_type.'_'.$id, array($eng[$k] => array('type' => 'INT','constraint' => '10', 'default' => '0')));
								break;
						}
					}
				}else{
					switch($field_arr[$v['type']]){
						case '1':
							$this->dbforge->add_column('model_'.$model_type.'_'.$id, array($eng[$k] => array('type' => 'VARCHAR','constraint' => '255', 'default' => '')));
							break;
						case '2':
							$this->dbforge->add_column('model_'.$model_type.'_'.$id, array($eng[$k] => array('type' => 'TEXT')));
							break;
						case '3':
							$this->dbforge->add_column('model_'.$model_type.'_'.$id, array($eng[$k] => array('type' => 'INT','constraint' => '10', 'default' => '0')));
							break;
					}
				}
			}

			//修改models_config
		    $data['name'] 			= $this->input->post('name');
		    $data['description'] 	= $this->input->post('description');
		    $data['type'] 			= $this->input->post('type');
		    $data['field'] 			= $field;

		    $where['id'] 			= $this->input->post('id');
		    $this->db->update('models_config',$data,$where);
		    show_msg('编辑成功',site_url('content/models/index'),0,1000);
		
		}
 		$id = $this->uri->segment(4);

		$sql = " SELECT * 
				FROM ".$this->db->dbprefix('models_config')." 
				WHERE id = $id";
		$data['info'] = $this->db->query($sql)->row_array();
		$data['field']=json_decode($data['info']['field'],true);
		
		foreach($data['field'] as $k => $v){
			$data['field'][$k]['id'] = $k;
			$data['field'][$k]['value'] = implode(',',$v['value']);
		}
		if (!empty($data['field'])) {
			$data['num'] = array_pop(array_keys($data['field']));
		} else {
			$data['num'] = 1;
		}
		$this->template->display('admin/content/models/edit.shtml',$data);
	}
	/**
	 * 模型删除
	 */
	public function del(){
		
		$id = $this->input->post('id') ? (int)$this->input->post('id') : '';
		if (empty($id)) {
			response('','删除失败！','1001');
		}
		$where['id'] 	= $id;
		
		$sql = " SELECT type 
				FROM ".$this->db->dbprefix('models_config')." 
				WHERE id = $id";
		$models_config = $this->db->query($sql)->row_array();
		$model_type=$models_config['type'];
		$this->db->delete('models_config',$where);
		
		$this->load->dbforge();
		$this->dbforge->drop_table('model_'.$model_type.'_'.$id);
		response('','删除成功！','1000');
	}

}
/* End of file *.php */
/* Location: ./application/controllers/*.php */