<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 栏目管理
 * LL
 */
class column extends MY_Controller {

	function __construct() {
		$action_array = array(
			'controller'	=> array('name'=>'栏目管理','key'=>'column'),
			'class'			=> array(
									'index' =>'栏目列表',
									'add' 	=>'栏目添加',
									'edit'	=>'栏目修改',
									'del' 	=>'栏目删除',
								),
			'issystem'		=> TRUE
		);
		parent::_Mycontroller();
		parent::check_login();
		parent::dopower($action_array);
		
		$this->load->model('column_model');
		$this->load->library('file');
	}
	
	/*栏目列表*/
	function index() {
		
		$data['lists'] = $this->column_model->get_column_list();
		/*页面内容处理*/
		$typearr = array('doc'=>'文档','catalog'=>'目录','link'=>'外链','page'=>'页面','form'=>'表单');
		foreach($data['lists'] as $k=>$v){
			if($v['ispart'] == 'catalog'){
				$data['lists'][$k]['do_url'] = '<a href="'.site_url('content/column/add').'?id='.$v['id'].'"><u>增加栏目</u></a>';
			}elseif($v['ispart'] == 'page'){
				$data['lists'][$k]['do_url'] = '<a href="'.site_url('content/info/page').'?cid='.$v['id'].'"><u>信息内容</u></a>';
			}else{
				$data['lists'][$k]['do_url'] = '<a href="'.site_url('content/info/index').'?cid='.$v['id'].'"><u>信息内容</u></a>';
			}
			$data['lists'][$k]['change_url'] = '<a href="'.site_url('content/column/edit/'.$v['id']).'">';
			$data['lists'][$k]['ispart'] = $typearr[$v['ispart']];
		}

		$sql = "SELECT * 
				FROM ".$this->db->dbprefix('models_config')." 
				ORDER BY id DESC";
		$dlist = $this->db->query($sql)->result_array();
		foreach ($dlist as $k=>$v) {
		  	$data['models'][$v['id']] = $v;
		}
		
		$this->template->display('admin/content/column/index.shtml',$data);
	}
	
	/*更新排序*/
	function update_sort () {
		
		$sort = $_POST['sort'];
		$this->column_model->update_sort($sort);
		show_msg('更新排序成功！',site_url('content/column/index'));
	}
	
	/*栏目添加*/
	function add() {

		if ($_POST['do'] == 'save') {
		    $data['ispart']	= $this->input->post('ispart');

		    /*文档*/
		    if($data['ispart'] == 'doc'){
		    	$data['reid']          = $this->input->post('reid');
		    	$data['name']          = $this->input->post('name');
		    	$data['is_nav']	       = !empty($_POST['is_nav'])?$this->input->post('is_nav'):'0';
		    	$data['is_open']       = !empty($_POST['is_open'])?$this->input->post('is_open'):'0';
		    	$data['sort']          = $this->input->post('sort');
		    	$data['searchtype']	   = $this->input->post('searchtype');
		    	$data['eng_name']      = $this->input->post('eng_name');
		    	$data['list_template'] = $this->input->post('list_template');
		    	$data['show_template'] = $this->input->post('show_template');
		    	$data['info_model']    = $this->input->post('info_model');
		    	$data['picid'] 		   = $this->input->post('picid');
		    	$data['seo_title'] 	   = $this->input->post('seo_title');
		    	$data['keywords'] 	   = $this->input->post('keywords');
		    	$data['description']   = $this->input->post('description');

            	$num_rows = $this->column_model->is_eng_name($data['eng_name']);
            	if($num_rows){
                	show_msg('英文名称已经存在','-1');
            	}
		    }
		    /*目录*/
		    elseif($data['ispart'] == 'catalog'){
		    	$data['reid']       = $this->input->post('reid');
		    	$data['name']       = $this->input->post('name');
		    	$data['is_nav']	    = !empty($_POST['is_nav'])?$this->input->post('is_nav'):'0';
		    	$data['is_open']    = !empty($_POST['is_open'])?$this->input->post('is_open'):'0';
		    	$data['sort']       = $this->input->post('sort');
		    	$data['searchtype']	= $this->input->post('searchtype');
		    	$data['eng_name']   = $this->input->post('eng_name');
		    	$data['is_exist']	= !empty($_POST['is_exist'])?$this->input->post('is_exist'):'0';
		    	if($data['is_exist'] == '1'){
		    		$data['category_template']	= $this->input->post('category_template');
		    		$data['seo_title'] 	   	    = $this->input->post('seo_title');
		    		$data['keywords'] 	        = $this->input->post('keywords');
		    		$data['description']        = $this->input->post('description');
		    		$data['picid'] 		   		= $this->input->post('picid');
		    	}

		    	$num_rows = $this->column_model->is_eng_name($data['eng_name']);
            	if($num_rows){
                	show_msg('英文名称已经存在','-1');
            	}
		    }
		    /*外链*/
		    elseif($data['ispart'] == 'link'){
		    	$data['reid']       = $this->input->post('reid');
		    	$data['name']       = $this->input->post('name');
		    	$data['is_nav']	    = !empty($_POST['is_nav'])?$this->input->post('is_nav'):'0';
		    	$data['is_open']    = !empty($_POST['is_open'])?$this->input->post('is_open'):'0';
		    	$data['sort']       = $this->input->post('sort');
		    	$data['searchtype']	= $this->input->post('searchtype');
		    	$data['out_chain']  = $this->input->post('out_chain');
		    }
		    /*页面*/
		    elseif($data['ispart'] == 'page'){
		    	$data['reid']          = $this->input->post('reid');
		    	$data['name']          = $this->input->post('name');
		    	$data['is_nav']	       = !empty($_POST['is_nav'])?$this->input->post('is_nav'):'0';
		    	$data['is_open']       = !empty($_POST['is_open'])?$this->input->post('is_open'):'0';
		    	$data['sort']          = $this->input->post('sort');
		    	$data['searchtype']	   = $this->input->post('searchtype');
		    	$data['eng_name']      = $this->input->post('eng_name');
		    	$data['show_template'] = $this->input->post('show_template');
		    	$data['info_model']    = $this->input->post('info_model');
		    	$data['picid'] 		   = $this->input->post('picid');
		    	$data['seo_title'] 	   = $this->input->post('seo_title');
		    	$data['keywords'] 	   = $this->input->post('keywords');
		    	$data['description']   = $this->input->post('description');

		    	$num_rows = $this->column_model->is_eng_name($data['eng_name']);
            	if($num_rows){
                	show_msg('英文名称已经存在','-1');
            	}
		    }
		    /*表单*/
		    elseif($data['ispart'] == 'form'){
		    	$data['reid']          = $this->input->post('reid');
		    	$data['name']          = $this->input->post('name');
		    	$data['is_nav']	       = !empty($_POST['is_nav'])?$this->input->post('is_nav'):'0';
		    	$data['is_open']       = !empty($_POST['is_open'])?$this->input->post('is_open'):'0';
		    	$data['sort']          = $this->input->post('sort');
		    	$data['searchtype']	   = $this->input->post('searchtype');
		    	$data['eng_name']      = $this->input->post('eng_name');
		    	$data['show_template'] = $this->input->post('show_template');
		    	$data['info_model']    = $this->input->post('info_model');
		    	$data['picid'] 		   = $this->input->post('picid');
		    	$data['seo_title'] 	   = $this->input->post('seo_title');
		    	$data['keywords'] 	   = $this->input->post('keywords');
		    	$data['description']   = $this->input->post('description');

		    	$num_rows = $this->column_model->is_eng_name($data['eng_name']);
            	if($num_rows){
                	show_msg('英文名称已经存在','-1');
            	}
		    }

		    $this->db->insert('column',$data);
		    show_msg('栏目创建成功！',site_url('content/column/index'));
		}
		$id = $this->input->get('id');
		$data['column_id'] = $id;
		$data['mark'] = 1;
		$data['re_info'] = $this->column_model->get_column_info($id);

		$this->load->model('search_model');
		$data['searchtypes'] = $this->search_model->get_searchtype();

		$data['category_template'] = $this->file->get_temp('templates','category');
		unset($this->file->info);
		$data['list_template'] = $this->file->get_temp('templates','list');
		unset($this->file->info);
		$data['show_template'] = $this->file->get_temp('templates','show');

		$this->template->display('admin/content/column/add.shtml',$data);
	}
	
	/*栏目编辑*/
	function edit(){
		
		if ($_POST['do'] == 'save') {
			$wheredata['id'] = $this->input->post('id');
			$data['ispart'] = $this->input->post('ispart');

			/*文档*/
			if($data['ispart'] == 'doc'){
		    	$data['reid']          = $this->input->post('reid');
		    	$data['name']          = $this->input->post('name');
		    	$data['is_nav']	       = !empty($_POST['is_nav'])?$this->input->post('is_nav'):'0';
		    	$data['is_open']       = !empty($_POST['is_open'])?$this->input->post('is_open'):'0';
		    	$data['sort']          = $this->input->post('sort');
		    	$data['searchtype']	   = $this->input->post('searchtype');
		    	$data['eng_name']      = $this->input->post('eng_name');
		    	$data['list_template'] = $this->input->post('list_template');
		    	$data['show_template'] = $this->input->post('show_template');
		    	$data['info_model']    = $this->input->post('info_model');
		    	$data['picid'] 		   = $this->input->post('picid');
		    	$data['seo_title'] 	   = $this->input->post('seo_title');
		    	$data['keywords'] 	   = $this->input->post('keywords');
		    	$data['description']   = $this->input->post('description');

		    	/*需要清空的字段*/
		    	$data['category_template']	= '';
		    	$data['is_exist']			= '0';
		    	$data['out_chain']          = '';
		    	
            	$num_rows = $this->column_model->is_eng_name($data['eng_name'],$wheredata['id']);
            	if($num_rows){
                	show_msg('英文名称已经存在','-1');
            	}
		    }
		    /*目录*/
		    elseif($data['ispart'] == 'catalog'){
		    	$data['reid']       = $this->input->post('reid');
		    	$data['name']       = $this->input->post('name');
		    	$data['is_nav']	    = !empty($_POST['is_nav'])?$this->input->post('is_nav'):'0';
		    	$data['is_open']    = !empty($_POST['is_open'])?$this->input->post('is_open'):'0';
		    	$data['sort']       = $this->input->post('sort');
		    	$data['searchtype']	= $this->input->post('searchtype');
		    	$data['eng_name']   = $this->input->post('eng_name');
		    	$data['is_exist']	= !empty($_POST['is_exist'])?$this->input->post('is_exist'):'0';

		    	if($data['is_exist'] == '1'){
		    		$data['category_template']	= $this->input->post('category_template');
		    		$data['seo_title'] 	   		= $this->input->post('seo_title');
		    		$data['keywords'] 	   		= $this->input->post('keywords');
		    		$data['description']   		= $this->input->post('description');
		    		$data['picid'] 				= $this->input->post('picid');
		    	}
		    	else{
		    		$data['category_template'] = '';
		    		$data['seo_title'] 	   	   = '';
		    		$data['keywords'] 	       = '';
		    		$data['description']       = '';
		    		$data['picid']			   = '0';
		    	}

		    	/*需要清空的字段*/
		    	$data['list_template'] = '';
		    	$data['show_template'] = '';
		    	$data['info_model'] = '0';
		    	$data['out_chain'] = '';

		    	$num_rows = $this->column_model->is_eng_name($data['eng_name'],$wheredata['id']);
            	if($num_rows){
                	show_msg('英文名称已经存在','-1');
            	}
		    }
		    /*外链*/
		    elseif($data['ispart'] == 'link'){
		    	$data['reid']       = $this->input->post('reid');
		    	$data['name']       = $this->input->post('name');
		    	$data['is_nav']	    = !empty($_POST['is_nav'])?$this->input->post('is_nav'):'0';
		    	$data['is_open']    = !empty($_POST['is_open'])?$this->input->post('is_open'):'0';
		    	$data['sort']       = $this->input->post('sort');
		    	$data['searchtype']	= $this->input->post('searchtype');
		    	$data['out_chain']  = $this->input->post('out_chain');

		    	/*需要清空的字段*/
		    	$data['category_template'] = '';
		    	$data['list_template'] = '';
		    	$data['show_template'] = '';
		    	$data['info_model'] = '0';
		    	$data['picid'] = '0';
		    	$data['seo_title'] = '';
		    	$data['keywords'] = '';
		    	$data['description'] = '';
		    	$data['eng_name'] = '';
		    	$data['is_exist'] = '0';
		    }
		    /*页面*/
		    elseif($data['ispart'] == 'page'){
		    	$data['reid']          = $this->input->post('reid');
		    	$data['name']          = $this->input->post('name');
		    	$data['is_nav']	       = !empty($_POST['is_nav'])?$this->input->post('is_nav'):'0';
		    	$data['is_open']       = !empty($_POST['is_open'])?$this->input->post('is_open'):'0';
		    	$data['sort']          = $this->input->post('sort');
		    	$data['searchtype']	   = $this->input->post('searchtype');
		    	$data['eng_name']      = $this->input->post('eng_name');
		    	$data['show_template'] = $this->input->post('show_template');
		    	$data['info_model']    = $this->input->post('info_model');
		    	$data['picid'] 		   = $this->input->post('picid');
		    	$data['seo_title'] 	   = $this->input->post('seo_title');
		    	$data['keywords'] 	   = $this->input->post('keywords');
		    	$data['description']   = $this->input->post('description');

		    	/*需要清空的字段*/
		    	$data['category_template'] = '';
		    	$data['list_template'] = '';
		    	$data['out_chain'] = '';
		    	$data['is_exist'] = '0';

		    	$num_rows = $this->column_model->is_eng_name($data['eng_name'],$wheredata['id']);
            	if($num_rows){
                	show_msg('英文名称已经存在','-1');
            	}
		    }
		    /*表单*/
		    elseif($data['ispart'] == 'form'){
		    	$data['reid']          = $this->input->post('reid');
		    	$data['name']          = $this->input->post('name');
		    	$data['is_nav']	       = !empty($_POST['is_nav'])?$this->input->post('is_nav'):'0';
		    	$data['is_open']       = !empty($_POST['is_open'])?$this->input->post('is_open'):'0';
		    	$data['sort']          = $this->input->post('sort');
		    	$data['searchtype']	   = $this->input->post('searchtype');
		    	$data['eng_name']      = $this->input->post('eng_name');
		    	$data['show_template'] = $this->input->post('show_template');
		    	$data['info_model']    = $this->input->post('info_model');
		    	$data['picid'] 		   = $this->input->post('picid');
		    	$data['seo_title'] 	   = $this->input->post('seo_title');
		    	$data['keywords'] 	   = $this->input->post('keywords');
		    	$data['description']   = $this->input->post('description');

		    	/*需要被清空的字段*/
		    	$data['category_template'] = '';
		    	$data['list_template'] = '';
		    	$data['out_chain'] = '';
		    	$data['is_exist'] = '0';

		    	$num_rows = $this->column_model->is_eng_name($data['eng_name'],$wheredata['id']);
            	if($num_rows){
                	show_msg('英文名称已经存在','-1');
            	}
		    }

		    $ispart_before = $this->input->post('ispart_before');
		    $info_model_before = $this->input->post('info_model_before');
		    $old_ispart = $this->input->post('old_ispart');

		    /*判断是否有子栏目，如果有子栏目，则无法更改栏目属性*/
		    if($old_ispart == 'catalog' && $data['ispart'] != 'catalog'){
		    	$reid_nums = $this->column_model->get_column_by_reid($wheredata['id']);
		    	if($reid_nums){
		    		show_msg('有子栏目存在！无法更改栏目类型！','-1');
		    	}
		    }

		    if($data['info_model'] !== $info_model_before && $data['ispart'] !== 'catalog' && $old_ispart != 'catalog' && $old_ispart != 'link') {
		    	//子栏目更改栏目模型，清空之前的数据
		    	$mod_database = 'model_'.$ispart_before.'_'.$info_model_before;
		    	$sql = " DELETE FROM ".$this->db->dbprefix($mod_database)." WHERE unitid = ".$wheredata['id']."";
		    	$this->db->query($sql);
		    }

		    $this->db->update('column',$data,$wheredata);
		    show_msg('栏目编辑成功！',site_url('content/column/index'));
		}

		$id = $this->uri->segment(4);
		if (empty($id)) {
			 show_msg('参数错误',site_url('content/column/index'));
		}
		$data['mark'] = 2;
		$data['info'] = $this->column_model->get_column_info($id);
		
		/*获取信息模型*/
		$data['info']['info_model_list'] = $this->column_model->get_model_list($data['info']['info_model']);
		/*获取上级栏目信息*/
		$data['re_info'] = $this->column_model->get_column_info($data['info']['reid']);

		/*获取图片信息*/
		if($data['info']['picid']){
			$data['info']['picidarr'] = $this->column_model->get_pic($data['info']['picid']);
		}
		/*特殊字段，首页展示图片*/
		if($data['info']['home_pic']){
			$data['info']['home_picarr'] = $this->column_model->get_pic($data['info']['home_pic']);
		}
		
		$this->load->model('search_model');
		$data['searchtypes'] = $this->search_model->get_searchtype();

		$data['category_template'] = $this->file->get_temp('templates','category');
		unset($this->file->info);
		$data['list_template'] = $this->file->get_temp('templates','list');
		unset($this->file->info);
		$data['show_template'] = $this->file->get_temp('templates','show');
		$this->template->display('admin/content/column/add.shtml',$data);
	}

	/*栏目删除*/
	function del(){
		$id = $this->input->post('id');
		if (empty($id)) {
			response('删除失败！','','1001');
		}
		$this->column_model->del_column($id);
		response('删除成功！','','1000');
	}

	/*根据栏目属性通过ajak获取信息模型*/
	function info_model(){
		$ispart = $this->input->post('ispart');
		$res = $this->column_model->get_info_model($ispart);
		$data = '';
		foreach($res as $k=>$v){
			$data .= '<option value="'.$v['id'].'">'.$v['name'].'</option>'; 
		}
		response($data,'','1000');
	}
	//更换主栏目
	function change_parent(){
		$wheredata['id'] = (int)$this->input->post('id');
		$data['reid'] = (int)$this->input->post('parent_id');

		if(!$wheredata['id']) response('', '非法操作', 1001);

		//非顶级栏目验证栏目类型
		if($data['reid'] != 0){
			$sql = "SELECT * 
                FROM ".$this->db->dbprefix('column')." 
                WHERE id = '".$data['reid']."'";
	        $row = $this->db->query($sql)->row();
	        if($row->ispart != 'catalog') response('', '目标栏目类型必须为目录', 1001);
		}

		$this->db->update('column', $data, $wheredata);
		response('', '', 1000);
	}

}
// end column.php
?>