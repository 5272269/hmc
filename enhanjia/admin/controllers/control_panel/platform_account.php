<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author zhangjian <zhangjian#outlook.com>
 */
class platform_account extends MY_Controller {
	
	function __construct(){
		
		$action_array = array(
			'parent'		=> array('name'=>'控制面板','key'=>'control_panel'),
			'controller'	=> array('name'=>'平台账户','key'=>'platform_account'),
			'class'			=> array(
								'index' 		=>'管理员查看',
								'add' 			=>'管理员添加',
								'edit' 			=>'管理员修改',
								'del' 			=>'管理员删除',
								'group' 		=>'管理组查看',
								'group_add' 		=>'管理组添加',
								'group_edit' 	=>'管理组修改',
								'group_del' 		=>'管理组删除',
								),
			'issystem'		=> TRUE
		);
		
		parent::_Mycontroller();
		parent::check_login();
		parent::dopower($action_array);
		$this->load->model('admin_model');
	}
	/*管理员列表*/
	function index() {
		$id = $this->input->get('id');
		$data['info'] = $this->admin_model->get_admin_list($id);
		foreach($data['info'] as $k=>$v){
			$role_name = $this->admin_model->get_group_info($v['role_id']);
			$data['info'][$k]['role_name'] = $role_name['name'];
		}
		$this->template->display('admin/control_panel/platform_account/admin_index.shtml',$data);
	}

	/*管理员添加*/
	function add() {
		if($_POST['do'] == 'save'){
			//判断用户名是否存在，如果存在，则无法使用
			if($_POST['username']){
				$username = trim($_POST['username']);
				$rst = $this->admin_model->is_username($username);
				if ($rst > 0){
					show_msg('用户名已经存在',site_url('control_panel/platform_account/add'));
				}
			}
			//收集数据，录入数据库
			$data['role_id']	 =		$this->input->post('role_id');
			$data['username']	 = 		$this->input->post('username');
			$data['realname']	 = 		$this->input->post('realname');
			$data['posts']		 = 		$this->input->post('posts');
			$data['email']	     = 		$this->input->post('email');
			$data['qq']			 = 		$this->input->post('qq');
			$data['phone']		 = 		$this->input->post('phone');
			$data['mobile']		 = 		$this->input->post('mobile');
			$data['cardid']		 = 		$this->input->post('cardid');
			$data['birthday']	 = 		$this->input->post('birthday');
			$data['question']    = 		$this->input->post('question');
			$data['answer'] 	 = 		$this->input->post('answer');
			$data['create_time'] = 		$create_time	=	time();
			if(!empty($_POST['password'])){
				$data['password']	 = 	md5($this->input->post('password'));
			}
			$this->db->insert('admin',$data);
			$insert_id = $this->db->insert_id();
			

			
			show_msg('编辑成功',site_url('control_panel/platform_account/index'));
		}
		$data['role_array'] = $this->admin_model->get_group();
		$this->template->display('admin/control_panel/platform_account/admin_add.shtml',$data);
	}

	/*管理员编辑*/
	function edit() {
		if($_POST['do'] == 'save'){
			//判断用户名是否存在，如果存在，则无法使用
			if($_POST['username']){
				$username =  trim($_POST['username']);
				$rst = $this->admin_model->is_username($username,$_POST['id']);
				if ($rst > 0){
					show_msg('用户名已经存在',site_url('control_panel/platform_account/edit').'?id='.$_GET['id']);
				}
			}
			//收集数据，录入数据库
			$wheredata['id']     =  	$this->input->post('id');
			$data['role_id']	 =		$this->input->post('role_id');
			$data['username']	 = 		$this->input->post('username');
			$data['realname']	 = 		$this->input->post('realname');
			$data['posts']		 = 		$this->input->post('posts');
			$data['email']	     = 		$this->input->post('email');
			$data['qq']			 = 		$this->input->post('qq');
			$data['phone']		 = 		$this->input->post('phone');
			$data['mobile']		 = 		$this->input->post('mobile');
			$data['cardid']		 = 		$this->input->post('cardid');
			$data['birthday']	 = 		$this->input->post('birthday');
			$data['question']    = 		$this->input->post('question');
			$data['answer'] 	 = 		$this->input->post('answer');
			$data['modify_time'] = 		$modify_time	=	time();

			if(!empty($_POST['password']) || !empty($_POST['new_passwd'])){
				$old_password	 = 	md5($this->input->post('password'));//原密码
				$sql = "SELECT password
						FROM ".$this->db->dbprefix('admin')." 
						WHERE id=".$this->input->post('id')."";
				$rst = $this->db->query($sql)->row_array();
				if($rst['password'] != $old_password){
					show_msg('原密码错误，请重新填写','-1');
				}
				$data['password'] = md5($this->input->post('new_passwd'));//新密码
			}

			$this->db->update('admin',$data,$wheredata);

			show_msg('编辑成功',site_url('control_panel/platform_account/index'));
		}

		$id = $this->input->get('id');
		$data['info'] = $this->admin_model->get_admin_info($id);
		$data['role_array'] = $this->admin_model->get_group();
		$this->template->display('admin/control_panel/platform_account/admin_edit.shtml',$data);
	}

	/*管理员删除*/
	function del() {	
		$id = $this->input->post('id');
		$this->admin_model->del_admin($id);
		$data['show_info'] = '删除成功！';
		$get_json_action = get_json_decode('http://swshop.com/api/cms.php?action=user_del&id='.$id.'&token='.(sha1(md5('user_del<|@|>').'ompcms')));
		echo json_encode($data);
	}

	/*用户组*/
	function group() {
		$data['info'] = $this->admin_model->get_group();
		$this->template->display('admin/control_panel/platform_account/group_index.shtml',$data);
	}

	/*增加用户组*/
	function group_add() {
		if($_POST['do'] == 'save'){
			if($_POST['name']){
				$group_name = trim($_POST['name']);
				$rst = $this->admin_model->is_group_name($group_name);
				if ($rst > 0){
					show_msg('用户组名已经存在',site_url('control_panel/platform_account/group_add'));
				}
			} else {
				show_msg('请输入用户组名',site_url('control_panel/platform_account/group_add'));
			}
			$data['name'] 			= 	$this->input->post('name');
			$data['description'] 	= 	$this->input->post('description');
			$data['auth'] 			= 	','.implode(',', $_POST['purviews']).',';

			$this->db->insert('admin_role',$data);
			show_msg('编辑成功',site_url('control_panel/platform_account/group'));
		}
		//获取权限列表
		$sql = "SELECT *
		FROM ".$this->db->dbprefix('system_node')." 
		WHERE `is_check` = '1'
		ORDER BY sort DESC , id DESC";
		$data['system_node'] = $this->db->query($sql)->result_array();
        foreach($data['system_node'] as $k1=>$v1){
            if($v1['reid']==0){
                $data['role_array'][]=$v1;
            }
        }
        foreach($data['system_node'] as $k1=>$v1){
            if($v1['reid']!=0){
                foreach($data['role_array'] as $k2 =>$v2){
                    if($v1['reid']==$v2['id']){
                        $data['role_array'][$k2]['child'][]=$v1;

                        break;
                    }
                }
            }
        }
        foreach($data['role_array'] as $k1=>$v1){
            foreach($v1['child'] as $k2=>$v2){
                foreach($data['system_node'] as $k3=>$v3){
                    if($v3['reid']==$v2['id']){
                        $data['role_array'][$k1]['child'][$k2]['child'][]=$v3;
                    }
                    
                }
            }
        }


		$this->template->display('admin/control_panel/platform_account/group_add.shtml',$data);
	}

	/*编辑用户组*/
	function group_edit() {
		if($_POST['do'] == 'save'){
			if($_POST['name']){
				$group_name = trim($_POST['name']);
				$rst = $this->admin_model->is_group_name($group_name,$_POST['id']);
				if ($rst > 0){
					show_msg('用户组名已经存在',site_url('control_panel/platform_account/group_edit').'?id='.$_GET['id']);
				}
			}
			else{
				show_msg('请输入用户组名',site_url('control_panel/platform_account/group_edit').'?id='.$_GET['id']);
			}
			$wheredata['id']        =   $this->input->post('id');
			$data['name'] 			= 	$this->input->post('name');
			$data['description'] 	= 	$this->input->post('description');
			$data['auth'] 			= 	','.implode(',', $_POST['purviews']).',';

			$this->db->update('admin_role',$data,$wheredata);
			show_msg('编辑成功',site_url('control_panel/platform_account/group'));
		}

		$id = $this->input->get('id');
		$data['info'] = $this->admin_model->get_group_info($id);

		//获取权限列表
		$sql = "SELECT *
		FROM ".$this->db->dbprefix('system_node')." 
		WHERE `is_check` = '1'
		ORDER BY sort DESC , id DESC";
		$data['system_node'] = $this->db->query($sql)->result_array();
        foreach($data['system_node'] as $k1=>$v1){
            if($v1['reid']==0){
                $data['role_array'][]=$v1;
            }
        }
        foreach($data['system_node'] as $k1=>$v1){
            if($v1['reid']!=0){
                foreach($data['role_array'] as $k2 =>$v2){
                    if($v1['reid']==$v2['id']){
                        $data['role_array'][$k2]['child'][]=$v1;

                        break;
                    }
                }
            }
        }
        foreach($data['role_array'] as $k1=>$v1){
            foreach($v1['child'] as $k2=>$v2){
                foreach($data['system_node'] as $k3=>$v3){
                    if($v3['reid']==$v2['id']){
                        $data['role_array'][$k1]['child'][$k2]['child'][]=$v3;
                    }
                    
                }
            }
        }
            

		$this->template->display('admin/control_panel/platform_account/group_edit.shtml',$data);
	}

	/*删除用户组*/
	function group_del() {
		$id = $this->input->post('id');
		$this->admin_model->del_group($id);
		$get_json_action = get_json_decode('http://swshop.com/api/cms.php?action=group_del&id='.$id.'&token='.(sha1(md5('group_del<|@|>').'ompcms')));
		$data['show_info'] = '删除成功！';
		echo json_encode($data);
	}
}

// end platform_account.php