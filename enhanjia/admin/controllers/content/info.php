<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 信息管理
 * by henry
 *   
 */
class info extends MY_Controller {
	/**
	 * 初始化
	 */
	function __construct() {
		
		$action_array = array(
			'controller'	=> array('name'=>'信息管理','key'=>'info'),
			'class'			=> array(
									'index' =>'信息查看',
									'add' 	=>'信息添加',
									'edit'	=>'信息编辑',
									'del' 	=>'信息删除',
									'doaction' 	=>'信息发布',
									'recycling' 	=>'回收站',
									'page' 	=>'单页面',
								),
			'issystem'		=> TRUE
		);
		parent::_Mycontroller();
		parent::check_login();
		parent::dopower($action_array);
		
	}

	/**
	 * 后台单个首页展示  整体列表展示待定
	 */
	function index() {
		// cid 栏目ID
	  	$cid = $this->input->get('cid') ? (int)$this->input->get('cid'): '';
	  	$this->load->model('info_model');
		$this->load->model('model_config');

	  	if($cid){
	  		$data['cid'] = $cid;
			//获取数据表
			$table = $this->info_model->get_table($cid);
			$column = $this->info_model->get_column($cid);
			$statusarr = array(
				'0' => '未发布',
				'1' => '已经发布',
				'2' => '回收站',
			);
			//获取数据
			$sql = "SELECT * 
					FROM ".to_table($table)."
					WHERE unitid = ".$cid." AND ( status='0' OR status='1' )
					ORDER BY id DESC
					";
			$rst = $this->db->query($sql);

			$this->load->helper('page');
			isset($_GET['page']) ? $page = (int)$_GET['page'] : $page = '0';
			$base_url = site_url('content/info/index').'?cid='.$cid.'&time='.rand(10000,99999).time();
			$page_size = '10';
			$beginpages = $page>1?($page-1)*$page_size:'0';
			$data['counts'] = $rst->num_rows();
			$data['pages'] = page2($base_url, $rst->num_rows(), $page_size, $page);
			// 取对应表的数据  
			$sql_do = "SELECT *    
					FROM ".to_table($table)." 
					WHERE ( status = '0' OR status='1' ) AND unitid=".$cid."
					ORDER BY  `id` DESC 
					LIMIT $beginpages,$page_size ";
			$rst = $this->db->query($sql_do);
			$list = $rst->result_array();

			foreach ($list as $key => $value) {
			$data['list'][$key] = $value;
			$data['list'][$key]['column'] = $column['name'];
			$data['list'][$key]['ispart'] = $column['ispart'];
			$data['list'][$key]['status'] = $statusarr[$value['status']];
			
			}
			$data['table'] = $table;//确定那个表
	  		$this->template->display('admin/content/info/index.shtml',$data);

	  	} else {
	  		$this->template->display('admin/control_panel/platform_setting/index.shtml');

	  	}
	}

	/**
	 * add 
	 */
	function add(){

		$this->load->model('model_config');
		$this->load->model('info_model');

		if ($_POST['dopost'] == 'save') {
			//各种字段
			$insertdata 				= array();
			$table   					=$_POST['table'];//表
			$insertdata['unitid'] 		=$_POST['unitid'];//外键
			$insertdata['title']     	=$_POST['title'];

			$files = implode(',', array_filter($_POST['files'])); //多图
			$files_files = implode(',', array_filter($_POST['files_files'])); //多文件
			
			//存内容附表
			$addarc['userip'] = get_client_ip();
			if(is_array($_POST['editorValue']))
			{
				$j=0;
				ksort($_POST['editorValue']);
				foreach ($_POST['editorValue'] as $key => $value) {
					$addarc['body'] =  $_POST['editorValue'][$key];
					$this->db->insert('addonarticle',$addarc);
					$aid[$j]= $this->db->insert_id();
					$j++;
				}
				
			}
			else
			{
				$addarc['body'] = $_POST['editorValue'];
				$this->db->insert('addonarticle',$addarc);
				$aid= $this->db->insert_id();
				
			}

			//读取表字段，并插入数据
			$field_s = $this->model_config->get_config($table);
			//var_dump($field_s['info']);exit;
			foreach ($field_s['info'] as $k => $v) {
		

				if($v['type']=='editor')
				{//编辑器
					if(is_array($aid))
					{
						$insertdata[$v['field']] = $aid[0] ? $aid[0] : '';
						array_shift($aid);
						
					} 
					else 
					{
						$insertdata[$v['field']] = $aid ? $aid : '';
					}

				} 
				elseif ($v['type']=='pic')
				{//单图
					$picid = $_POST[$v['field']];
					$insertdata[$v['field']] = $picid ? $picid : '';
				} 
				elseif ($v['type']=='pics')
				{//多图
					$insertdata[$v['field']] = $files ? $files : '';
				} 
				elseif ($v['type']=='date')
				{//日期
					$insertdata[$v['field']] = 	strtotime($_POST[$v['field']]) ? strtotime($_POST[$v['field']]) : '' ;
				} 
				elseif ($v['type']=='checkbox')
				{//多选
					$checkbox = ','.implode(',',$_POST[$v['field']]).','; 
					$insertdata[$v['field']] = $checkbox;
				} 
				elseif ($v['type']=='file')
				{//文件
					$fid = $_POST[$v['field']];
					$insertdata[$v['field']] = $fid ? $fid : '';
				} 
				elseif ($v['type']=='files')
				{//多文件
					$insertdata[$v['field']] = $files_files ? $files_files : '';
				}
				/*关联选项*/
				elseif ($v['type']=='re_select'){
					$insertdata[$v['field']] = $_POST[$v['field']] ? $_POST[$v['field']] : '0';
				}
				else 
				{
					$insertdata[$v['field']] = $_POST[$v['field']];
				}
			}
			
			$this->db->insert('model_'.$table,$insertdata);


			$cid = $insertdata['unitid'];
			show_msg('添加成功',site_url('content/info/index').'?cid='.$cid.'&table='.$table,0,1000);

		}

		$cid = $this->input->get('cid');   //栏目id
		$table = $this->input->get('table');//doc_3
		$data['cid'] = $cid;
		$data['table'] = $table;

		if (empty($cid)) {
			show_msg('栏目id不能为空',site_url('content/info/index'),0,1000);
		}
		$data['column'] = $this->info_model->get_column($cid);

		// 取出编辑器的名称
		$config = $this->model_config->get_config($table);

		foreach ($config['info'] as $key => $value) {
			if($value['type']=='editor'){
				//$n=substr($value['field'],5);
				$_title[$key] = $value['title'];
			}
		}
		
		//引入ueditor 判断是否有editor
		if(!empty($_title)){
			$this->load->library('ueditor');
		    $data['editor'] = $this->ueditor->getueditor('other','100','100','utf-8','',$_title);
		}
		
		//获取字段--展示
		$fields = $this->model_config->get_config($table);
		
		// 按sort排序
		foreach ($fields['info'] as $k => $v) {
		  	$sort[] = $v['sort'];

		  	/*处理特殊字段 关联选项*/
		  	if($v['type'] == 're_select'){
		  		$fields['info'][$k]['value'] = $this->model_config->get_re_select($cid);
		  	}
		}
		array_multisort($sort, SORT_DESC, $fields['info']);

		$data['fields'] = $fields;
		$this->template->display('admin/content/info/add.shtml',$data);
	}

	/**
	 * & edit
	 */
	function edit(){
		$this->load->model('model_config');
		$this->load->model('info_model');

		if ($_POST['dopost'] == 'save') {
			//各种字段
			$insertdata 				= array();
			$table   					=$_POST['table'];//表
			$insertdata['unitid'] 		=$_POST['unitid'];//外键
			$insertdata['title']     	=$_POST['title'];
			$files = implode(',', array_filter($_POST['files'])); //多图
			$files_files = implode(',', array_filter($_POST['files_files'])); //多文件
		
			//存内容附表
			$aid = explode(',',$_POST['aid']);//内容附表id 

			$where2['id'] = $_POST['id'];//文章id
			ksort($_POST['editorValue']);
			
			$addarc['userip'] = get_client_ip();
			if(count($aid)>1){
				$j=0;
				foreach ($_POST['editorValue'] as $key => $value) {
					$addarc['body'] = $_POST['editorValue'][$key];
					$where1['aid'] = $aid[$j];
					$this->db->update('addonarticle',$addarc,$where1);
			   		$j++;
				}
				
			} else {
				$addarc['body'] = $_POST['editorValue'];
				$where1['aid'] = $aid[0];
				$this->db->update('addonarticle',$addarc,$where1);
			}
			

			//读取表字段，并循环插入数据
			$field_s = $this->model_config->get_config($table);
			foreach ($field_s['info'] as $k => $v) {
				if($v['type']=='editor')
				{//编辑器
					if(is_array($aid))
					{
						$insertdata[$v['field']] = $aid[0] ? $aid[0] : '';
						array_shift($aid);
						
					} 
					else 
					{
						$insertdata[$v['field']] = $aid[0] ? $aid[0] : '';
					}
				} 
				elseif ($v['type']=='pic')
				{//单图
					$picid = $_POST[$v['field']];
					$insertdata[$v['field']] = $picid ? $picid : '';
				} 
				elseif ($v['type']=='pics')
				{//多图
					$insertdata[$v['field']] = $files ? $files : '';
				} 
				elseif ($v['type']=='date')
				{//日期
					$insertdata[$v['field']] = 	strtotime($_POST[$v['field']]) ? strtotime($_POST[$v['field']]) : '' ;
				} 
				elseif ($v['type']=='checkbox')
				{//多选
					$checkbox = ','.implode(',', $_POST[$v['field']]).','; 
					$insertdata[$v['field']] = $checkbox;
				}
				 elseif ($v['type']=='file')
				{//单文件
					$fid = $_POST[$v['field']];
					$insertdata[$v['field']] = $fid ? $fid : '';
				}
				elseif ($v['type']=='files')
				{//多文件
					$insertdata[$v['field']] = $files_files ? $files_files : '';
				}
				/*关联选项*/
				elseif ($v['type']=='re_select'){
					$insertdata[$v['field']] = $_POST[$v['field']] ? $_POST[$v['field']] : '0';
				}
				else 
				{
					$insertdata[$v['field']] = $_POST[$v['field']];
				}
			}

			$this->db->update('model_'.$table,$insertdata,$where2);

			$cid = $insertdata['unitid'];
			show_msg('编辑成功',site_url('content/info/index').'?cid='.$cid.'&table='.$table,0,1000);

		}

		$cid = $this->input->get('cid');   //栏目id
		$id = $this->input->get('id');   //新闻id
		$table = $this->input->get('table');//doc_3
		$data['cid'] = $cid;
		$data['table'] = $table;
		$data['id'] = $id;
		$pics = $news = array(); 
		$data['column'] = $this->info_model->get_column($cid);

		if (empty($cid)) {
			show_msg('栏目id不能为空',site_url('content/info/index'),0,1000);
		}
		

		//获取字段--展示
		$fields = $this->model_config->get_config($table);
		//保留之前的排序用于取数据，字段type为唯一标识
		$ziduan = $fields['info'];

		// 按sort排序
		foreach ($fields['info'] as $k => $v) {
			$fields['info'][$k]['key'] = $k;//记录新增字段的实际key
	  		$sort[] = $v['sort'];

	  		/*处理特殊字段 关联选项*/
	  		if($v['type'] == 're_select'){
	  			$fields['info'][$k]['value'] = $this->model_config->get_re_select($cid);
	  		}
		}
		array_multisort($sort, SORT_DESC, $fields['info']);

		$data['fields'] = $fields;//排序完的字段

		//取对应表的数据，用于展示，修改
		$data['newsinfo'] = $info = $this->info_model->getNewsInfo($id, $table);
		$jj=0;
		foreach($ziduan as $k=>$v){
			if($v['type']=='pic')
			{
				$data['pic'][$k]   =	$this->info_model->getAttinfo($info[$v['field']]);
			} 
			elseif ($v['type']=='pics')
			{
				$pics = explode(',', $info[$v['field']]);
				foreach($pics as $key=>$val){
					$data['pics'][$key]  =	$this->info_model->getAttinfo($val);
				}
			} 
			elseif ($v['type']=='editor')
			{
				
				$content[$jj] = $this->info_model->getUeditor($info[$v['field']]);
				$data['aid'][$jj] = $info[$v['field']];
				$jj++;

			} 
			elseif($v['type']=='file') 
			{
				$data['file_data'][$k]   =	$this->info_model->get_file_info($info[$v['field']]);
			} 
			elseif($v['type']=='files')
			{
				$files = explode(',', $info[$v['field']]);
				foreach($files as $key=>$val){
					$data['files_files'][$key]  =	$this->info_model->get_file_info($val);
				}
			}
			else 
			{
				//处理其他字段
				$data[$v['field']] = $info[$v['field']];
			}
		}
		$data['aid'] = implode(',', $data['aid']);

	
		// 取出编辑器的名称
		$config = $this->model_config->get_config($table);

		foreach ($config['info'] as $key => $value) {
			if($value['type']=='editor'){
				//$n=substr($value['field'],5);
				$_title[$key] = $value['title'];
			}
		}
		//引入ueditor 判断是否有editor
		if (!empty($_title)) {
			$this->load->library('ueditor');
			$data['editor'] = $this->ueditor->getueditor('other','100','100','utf-8',$content,$_title);
		}

		$this->template->display('admin/content/info/add.shtml',$data);
	}

	/**
	 * 指定根据cid展示各自的回收站，整体回收站待定
	 */
	function recycling(){

		$cid = $this->input->get('cid');   //栏目id
		$table = $this->input->get('table');//doc_3
		//栏目
		$this->load->model('info_model');
		$column = $data['column'] = $this->info_model->get_column($cid);
		$sql = "SELECT 1 
				FROM ".to_table($table)."
				WHERE status='2' AND unitid=".$cid." ";
		$rst = $this->db->query($sql);
		

		$this->load->helper('page');
		isset($_GET['page']) ? $page = (int)$_GET['page'] : $page = '0';
		$base_url = site_url('content/info/recycling').'?cid='.$cid.'&table='.$table.'&time='.rand(10000,99999).time();
		$page_size = '10';
		$beginpages = $page>1?($page-1)*$page_size:'0';
		$data['counts'] = $rst->num_rows();
		$data['pages'] = page2($base_url, $rst->num_rows(), $page_size, $page);
		// 取对应表的数据
		$sql = "SELECT *    
				FROM ".to_table($table)." 
				WHERE status = '2'  AND unitid=".$cid."
				ORDER BY id desc 
				LIMIT $beginpages,$page_size ";
		$rst = $this->db->query($sql);
		$list = $rst->result_array();

		foreach($list as $key=>$value){
			$data['lists'][$key] = $value;
			$data['lists'][$key]['unitname'] = $column['name'];
			$data['lists'][$key]['ispart'] = $column['ispart'];
		}

		$data['table'] = $table;//确定那个表
		$data['cid'] = $cid;//确定那个表
		$this->template->display('admin/content/info/recycling.shtml',$data);

	}

	/**
	 * 具体的操作，删除，发布
	 */
	public function doaction(){
		$dopost = $this->input->get('do');
  		$this->load->model('info_model');
	  	if ($dopost == "checkArchives") {//发布
		    $aid 	= $this->input->get('aid');
		    $qstr 	= $this->input->get('qstr');
		    $table 	= $this->input->get('table');
		    if ( !empty($aid) && empty($qstr) ) $qstr = $aid;
		    if ($qstr=='' || $table=='') {
		       response ('参数无效！','','1001');
		    }
		    $arcids = preg_replace("#[^0-9,]#", '', preg_replace("#`#", ',', $qstr));
		    //添加搜索功能
		    $sql = "SELECT id,unitid,title,pubdate
		    		FROM ".to_table($table)." 
		            WHERE id in($arcids) ";
		    $aids = $this->db->query($sql)->result_array();
		    if (!empty($aids)){
		    	foreach ($aids as $k=>$v){
		    		$this->info_model->search_api($v['id'],$v);
		    		$unitid = $v['unitid'];
		    	}
		    }
		    //添加具体的table参数，确定表
		    $sql = "UPDATE ".to_table($table)." 
		    		SET status = '1',pubdate='".time()."'
		            WHERE id in($arcids) ";

		   $this->db->query($sql);
		   response ('成功发布指定的文档！','','1000');
		} elseif ($dopost == "delArchives") { //删除操作
			
			$aid 	= $this->input->get('aid');
		    $qstr 	= $this->input->get('qstr');
		    $table 	= $this->input->get('table');
		    if ( !empty($aid) && empty($qstr) ) $qstr = $aid;
		    if ($qstr=='' || $table=='') {
		        response ('参数无效！','','1001');
		    }
		    $arcids = preg_replace("#[^0-9,]#", '', preg_replace("#`#", ',', $qstr));
		    // 删除去除搜索
		    $sql = "SELECT id,unitid,title,pubdate 
		    		FROM ".to_table($table)." 
		            WHERE id in($arcids) ";
		    $aids = $this->db->query($sql)->result_array();
		    if (!empty($aids)) {
		    	foreach ($aids as $k=>$v){
		    		$this->info_model->search_api($v['id'],$v,'delete');
		    		$unitid = $v['unitid'];
		    	}
		    }

			//添加具体的table参数，确定表
		    $sql = "UPDATE ".to_table($table)." 
		    		SET status = '2' 
		            WHERE id in($arcids) ";
		   $this->db->query($sql);
		   response ('成功删除指定的文档！','','1000');
		} elseif ($dopost=="return") { //回收站还原
			
			$aid = $this->input->get('aid');
		    $qstr = $this->input->get('qstr');
		    $table 	= $this->input->get('table');
		    if( !empty($aid) && empty($qstr) ) $qstr = $aid;
		    if ($qstr=='' || $table=='') {
		    	response ('参数无效！','','1001');
		    }
		    $arcids = preg_replace("#[^0-9,]#", '', preg_replace("#`#", ',', $qstr));
		    $sql = "UPDATE ".to_table($table)." 
		    		SET status = '0' 
		            WHERE id in($arcids) ";
		   $this->db->query($sql);
		   response ('成功还原指定的文档！','','1000');
		} elseif ($dopost=="del") { //回收站删除
			
			$aid 	= $this->input->get('aid');
		    $qstr 	= $this->input->get('qstr');
		    $table 	= $this->input->get('table');
		    if( !empty($aid) && empty($qstr) ) $qstr = $aid;
		    if($qstr=='' || $table=='') {
		    	response ('参数无效！','','1001');
		    }
		    $arcids = preg_replace("#[^0-9,]#", '', preg_replace("#`#", ',', $qstr));
		     // 删除去除搜索
		    $sql = "SELECT id,unitid,title,pubdate 
		    		FROM ".to_table($table)." 
		            WHERE id in($arcids) ";
		    $aids = $this->db->query($sql)->result_array();
		    if (!empty($aids)) {
		    	foreach ($aids as $k=>$v){
		    		$this->info_model->search_api($v['id'],$v,'delete');
		    		$unitid = $v['unitid'];
		    	}
		    }
		    $sql = "UPDATE ".to_table($table)." 
		    		SET status = '3' 
		            WHERE id in($arcids) ";
		    $this->db->query($sql);
		    response ('成功删除指定的文档！','','1000');
		}
	}
	
	/**
	 * & page单页面
	*	BY WC
	 */
	function page(){
		$data['cid'] = $cid = $this->input->get('cid');   //栏目id
		$this->load->model('model_config');
		$this->load->model('info_model');

		if ($_POST['dopost'] == 'save') {
			//各种字段
			$insertdata 				= array();
			$table   					=$_POST['table'];//表
			$insertdata['unitid'] 		=$_POST['unitid'];//外键
			$insertdata['title']     	=$_POST['title'];
			$insertdata['status']     	= 1;
			$files = implode(',', array_filter($_POST['files'])); //多图
			$files_files = implode(',', array_filter($_POST['files_files'])); //多文件

			
			//存内容附表
			ksort($_POST['editorValue']);
			$addarc['userip'] = get_client_ip();
		    $aid = explode(',',$_POST['aid']);//内容附表id

			if($aid && !empty($aid['0'])){
				if(count($aid)>1){
				$j=0;
				foreach ($_POST['editorValue'] as $key => $value) {
					$addarc['body'] = $_POST['editorValue'][$key];
					$where1['aid'] = $aid[$j];
			   		$this->db->update('addonarticle',$addarc,$where1);
			   		$j++;
				}
				
				} else {
					$addarc['body'] = $_POST['editorValue'];
					$where1['aid'] = $aid[0];
					$this->db->update('addonarticle',$addarc,$where1);
				}
			}else{
				
				if(is_array($_POST['editorValue']))
				{
					$j=0;
					foreach ($_POST['editorValue'] as $key => $value) {
						$addarc['body'] =  $_POST['editorValue'][$key];
						$this->db->insert('addonarticle',$addarc);
						$aid[$j]= $this->db->insert_id();
						$j++;
					}
					
				}
				else
				{
					$addarc['body'] = $_POST['editorValue'];
					$this->db->insert('addonarticle',$addarc);
					$aid= $this->db->insert_id();

				}

			}
			
			//读取表字段，并循环插入数据
			$field_s = $this->model_config->get_config($table);
			foreach ($field_s['info'] as $k => $v) {
				if($v['type']=='editor')
				{//编辑器
					if(is_array($aid) && count($aid)>1)
					{
					$insertdata[$v['field']] = $aid[0] ? $aid[0] : '';
					array_shift($aid);
					} 
					else 
					{
						if (!is_array($aid)) {//insert
							$insertdata[$v['field']] = $aid ? $aid : '';
						} else {//update
							$insertdata[$v['field']] = $aid[0] ? $aid[0] : '';
						}

					}
				} 
				elseif ($v['type']=='pic')
				{//单图
					$picid = $_POST[$v['field']];
					$insertdata[$v['field']] = $picid ? $picid : '';
				} 
				elseif ($v['type']=='pics')
				{//多图
					$insertdata[$v['field']] = $files ? $files : '';
				} 
				elseif ($v['type']=='date')
				{//日期
					$insertdata[$v['field']] = 	strtotime($_POST[$v['field']]) ? strtotime($_POST[$v['field']]) : '' ;
				} 
				elseif ($v['type']=='checkbox')
				{//多选
					$checkbox = ','.implode(',', $_POST[$v['field']]).','; 
					$insertdata[$v['field']] = $checkbox;
				} 
				elseif ($v['type']=='file')
				{//单文件
					$fid = $_POST[$v['field']];
					$insertdata[$v['field']] = $fid ? $fid : '';
				} 
				elseif ($v['type']=='files')
				{//多文件
					$insertdata[$v['field']] = $files_files ? $files_files : '';
				} 
				else 
				{
					$insertdata[$v['field']] = $_POST[$v['field']] ? $_POST[$v['field']] : '';
				}
			}

		   if($_POST['id']){
				$where2['id'] = $_POST['id'];//xinwen 
				$this->db->update('model_'.$table,$insertdata,$where2);
			}else{
				$insertdata['pubdate']     	= time();
				$this->db->insert('model_'.$table,$insertdata);
			}

			show_msg('编辑成功',site_url('content/info/page').'?cid='.$cid,0,1000);

		}

		if (empty($cid)) {
			show_msg('栏目id不能为空',site_url('content/info/index'),0,1000);
		}
		$data['table'] = $table = $this->info_model->get_table($cid);
		$data['column'] = $this->info_model->get_column($cid);
		$sql = "SELECT * 
				FROM ".to_table($table)."
				WHERE unitid = ".$cid." AND ( status='0' OR status='1' )
				ORDER BY id DESC
				LIMIT 1
				";
		//取对应表的数据，用于展示，修改
		$data['newsinfo'] = $info = $this->db->query($sql)->row_array();
		$fields = $this->model_config->get_config($table);
		//保留之前的排序用于取数据，字段type为唯一标识
		$ziduan = $fields['info'];

		// 按sort排序
		foreach ($fields['info'] as $k => $v) {
			$fields['info'][$k]['key'] = $k;//记录新增字段的实际key
		  	$sort[] = $v['sort'];
		}
		array_multisort($sort, SORT_DESC, $fields['info']);

		$data['fields'] = $fields;//排序完的字段
		$jj=0;
		foreach($ziduan as $k=>$v){
			if($v['type']=='pic')
			{
				$data['pic'][$k]   =	$this->info_model->getAttinfo($info[$v['field']]);
			} 
			elseif ($v['type']=='pics')
			{
				$pics = explode(',', $info[$v['field']]);
				foreach($pics as $key=>$val){
					$data['pics'][$key]  =	$this->info_model->getAttinfo($val);
				}
			} 
			elseif ($v['type']=='editor')
			{
				$content[$jj] = $this->info_model->getUeditor($info[$v['field']]);
				$data['aid'][$jj] = $info[$v['field']];
				$jj++;
			} 
			elseif($v['type']=='file')
			{
				$data['file_data'][$k]   =	$this->info_model->get_file_info($info[$v['field']]);
			} 
			elseif($v['type']=='files')
			{
				$files = explode(',', $info[$v['field']]);
				foreach($files as $key=>$val){
					$data['files_files'][$key]  =	$this->info_model->get_file_info($val);
				}
			} 
			else 
			{
				//处理其他字段
				$news[$v['field']] = $info[$v['field']];
			}

		}
		$data['aid'] = implode(',', $data['aid']);


		// 取出编辑器的名称
		$config = $this->model_config->get_config($table);

		foreach ($config['info'] as $key => $value) {
			if($value['type']=='editor'){
				//$n=substr($value['field'],5);
				$_title[$key] = $value['title'];
			}
		}
		//引入ueditor 判断是否有editor
		if (!empty($_title)) {
			$this->load->library('ueditor');
			$data['editor'] = $this->ueditor->getueditor('other','100','100','utf-8',$content,$_title);
		}
		$this->template->display('admin/content/info/page.shtml',$data);

	}

	/**
	 * 表单
	 */
	function form(){

		$this->load->model('model_config');
		$this->load->model('info_model');

		$data['cid'] = $cid = $this->input->get('cid');   //栏目id
		$id = $this->input->get('id');

		if (empty($cid)) {
			show_msg('栏目id不能为空',site_url('content/info/index'),0,1000);
		}
		$data['table'] = $table = $this->info_model->get_table($cid);
		$data['column'] = $this->info_model->get_column($cid);
		//取对应表的数据，用于展示，修改
		$data['newsinfo'] = $this->info_model->getNewsInfo($id, $table);
		$fields = $this->model_config->get_config($table);
		//保留之前的排序用于取数据，字段type为唯一标识
		$ziduan = $fields['info'];

		// 按sort排序
		foreach ($fields['info'] as $k => $v) {
			$fields['info'][$k]['key'] = $k;//记录新增字段的实际key
		  	$sort[] = $v['sort'];
		}
		array_multisort($sort, SORT_DESC, $fields['info']);

		$data['fields'] = $fields;//排序完的字段
		
		if ($data['newsinfo']['check'] == 0) {

				$sql = "UPDATE ".to_table($table)." 
		    		SET `check` = '1' 
		             WHERE `id` =  ".$id;
				$this->db->query($sql);
		}
		$jj=0;
		foreach($ziduan as $k=>$v){
			if($v['type']=='pic')
			{
				$data['pic'][$k]   =	$this->info_model->getAttinfo($info[$v['field']]);
			} 
			else 
			{
				//处理其他字段
				$news[$v['field']] = $info[$v['field']];
			}

		}

		// 取出编辑器的名称
		$config = $this->model_config->get_config($table);
		
		$this->template->display('admin/content/info/form.shtml',$data);

	}

	/**
	 * 表单列表
	 */
	function formlist(){
		// cid 栏目ID
	  	$cid = $this->input->get('cid') ? (int)$this->input->get('cid'): '';
	  	$this->load->model('info_model');
		$this->load->model('model_config');

	  	if($cid){
	  		$data['cid'] = $cid;
			//获取数据表
			$table = $this->info_model->get_table($cid);
			$column = $this->info_model->get_column($cid);
			$statusarr = array(
				'0' => '未发布',
				'1' => '已经发布',
				'2' => '回收站',
			);
			//获取数据
			$sql = "SELECT * 
					FROM ".to_table($table)."
					WHERE unitid = ".$cid." AND ( status='0' OR status='1' )
					ORDER BY id DESC
					";
			$rst = $this->db->query($sql);

			$this->load->helper('page');
			isset($_GET['page']) ? $page = (int)$_GET['page'] : $page = '0';
			$base_url = site_url('content/info/index').'?cid='.$cid.'&time='.rand(10000,99999).time();
			$page_size = '10';
			$beginpages = $page>1?($page-1)*$page_size:'0';
			$data['counts'] = $rst->num_rows();
			$data['pages'] = page2($base_url, $rst->num_rows(), $page_size, $page);
			// 取对应表的数据  
			$sql_do = "SELECT *    
					FROM ".to_table($table)." 
					WHERE ( status = '0' OR status='1' ) AND unitid=".$cid."
					ORDER BY `check` ASC, `id` DESC 
					LIMIT $beginpages,$page_size";
			$rst = $this->db->query($sql_do);
			$list = $rst->result_array();

			foreach ($list as $key => $value) {
			$data['list'][$key] = $value;
			$data['list'][$key]['column'] = $column['name'];
			$data['list'][$key]['ispart'] = $column['ispart'];
			$data['list'][$key]['status'] = $statusarr[$value['status']];
			
			}
			$data['table'] = $table;//确定那个表
	  		$this->template->display('admin/content/info/formlist.shtml',$data);

	  	} else {
	  		$this->template->display('admin/control_panel/platform_setting/index.shtml');

	  	}
	}


}
// end info.php