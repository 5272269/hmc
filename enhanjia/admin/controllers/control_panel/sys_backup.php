<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 数据库备份还原
 */
class sys_backup extends MY_Controller {
	/**
	 * 初始化
	 */
	function __construct() {
		$action_array = array(
			'controller'	=> array('name'=>'数据库备份还原','key'=>'sys_backup'),
			'class'			=> array(
								'index' 		=>'数据库备份',
								),
			'issystem'		=> TRUE
		);
		parent::_Mycontroller();
		parent::check_login();
		parent::dopower($action_array);
	}
    /**
     * 数据库备份
     */
	function index()
	{

		if($_POST['do'] == 'save'){

			 if(empty($_POST['purviews'])){
		        show_msg('你没选中任何表！',-1);
		        exit();
		    }
			// 加载数据库工具类
			$this->load->dbutil();
			$prefs = array(
	                'tables'      => $_POST['purviews'],// 包含了需备份的表名的数组.
	                'ignore'      => array(),           // 备份时需要被忽略的表
	                'format'      => 'txt',             // gzip, zip, txt
	                'filename'    => 'my.sql',          // 文件名 - 如果选择了ZIP压缩,此项就是必需的
	                'add_drop'    => TRUE,              // 是否要在备份文件中添加 DROP TABLE 语句
	                'add_insert'  => TRUE,              // 是否要在备份文件中添加 INSERT 语句
	                'newline'     => "\n"               // 备份文件中的换行符
	              );

			$this->dbutil->backup($prefs);


			// 备份整个数据库并将其赋值给一个变量
			$backup =& $this->dbutil->backup();

			// 加载文件辅助函数并将文件写入你的服务器
			$this->load->helper('file');

			if (write_file(BASEPATH.'database/my.sql', $backup, 'r+')) {
				show_msg('备份成功',-1);
			} else {
				show_msg('备份失败',-1);
			}
			
			// // 加载下载辅助函数并将文件发送到你的桌面
			// $this->load->helper('download');
			// force_download('my.sql', $backup);
		}

		$data['result'] = $this->db->query('SHOW TABLES')->result_array();

		$data['topLocation'] = '<a href="'.site_url('').'"><u>平台管理</u></a>&nbsp;/&nbsp;数据备份'; 
		$this->template->display('admin/control_panel/sys_backup/backup.shtml',$data);
	}
}
// end security_center.php