<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 上传类
 * @author zhangjian <zhangjian#webce.cn>
 */
class upload extends MY_Controller {
	
	function __construct()
	{
		parent::_Mycontroller();
		parent::check_login();
	}
	/**
	 *  附件上传接口 
	 *  上传格式：Word/Excel/PDF/PPT/JPG/JPEG/PNG/GIF/Flash/RAR/ZIP上传限制：单个文件不超过100M
	 *  包含报价单上传 是Excel 采用字段区分
	 *  上传接口
	 */
	function archives_do(){
    	$imgdid = $this->input->get('imgdid') ? $this->input->get('imgdid') : 'divpicview';
    	$type 	= $this->input->get('type') ? $this->input->get('type') : 'one';
    	$hidden = $this->input->get('hidden') ? $this->input->get('hidden') : 'goods_thumb';
    	$filename = $this->input->get('filename') ? $this->input->get('filename') : 'picid_litpic';

		if ($_FILES[$filename]['name']) {
			$config['upload_path']   = './data/cms/upload_files/'.date('Ymd',time());
			if(!is_dir($config['upload_path']))
	        {
	        	$this->load->helper('dedefile');
	            MkdirAll($config['upload_path']);
	        }
			//$config['allowed_types'] = 'gif|jpg|png|pdf|tar|zip|rar|ppt|pptx|doc|docx|xls|xlsx|swf';
			$config['allowed_types'] = 'gif|jpg|png|pdf|ppt|pptx|doc|docx|xls|xlsx';
			$config['max_size']      = 204800;
			$config['file_name']     = time().rand(1000,9999);
		
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload($filename))
			{
				$data['up']['result'] = false;
				$a = $data['up']['result'] = $this->upload->display_errors();
				
				  $msg = "<script language='javascript'>alert('你没指定要上传的文件或文件大小超过限制！');</script>";
			}
			else
			{	
				$data_tem = $this->upload->data();
				
				$data['filename'] = '/data/cms/upload_files/'.date('Ymd',time()).'/'.$data_tem['file_name']; // 已上传的文件名（包括扩展名）
				$datas['thumbfilename'] = 'data/cms/upload_files/'.date('Ymd',time()).'/'.$data_tem['file_name']; // 已上传的文件名（包括扩展名）
				$data['filetype'] = $data_tem['file_type'];
				$data['filepath'] = $data_tem['file_path'];
				$data['fullpath'] = $data_tem['full_path'];
				$data['origname'] = $data_tem['orig_name'];
				$data['fileext']  = $data_tem['file_ext'];
				$data['filesize'] = $data_tem['file_size'];
				$data['description'] = $data_tem['client_name'];
				$data['addtime']   = time();
				
				$this->db->insert('attachment',$data);
				$aid = $this->db->insert_id();
				
				$config = array();
				$this->load->library('image_lib');
				$config['image_library'] = 'gd2';//(必须)设置图像库  
		        $config['source_image'] = $datas['thumbfilename'];//(必须)设置原始图像的名字/路径  
		        $config['dynamic_output'] = FALSE;//决定新图像的生成是要写入硬盘还是动态的存在  
		        $config['width'] = 338;//(必须)设置你想要得图像宽度。  
		        $config['height'] = 306;//(必须)设置你想要得图像高度  
		        $config['create_thumb'] = TRUE;//让图像处理函数产生一个预览图像(将_thumb插入文件扩展名之前)  
		        $config['thumb_marker'] = '_thumb';//指定预览图像的标示。它将在被插入文件扩展名之前。例如，mypic.jpg 将会变成 mypic_thumb.jpg  
		        $config['maintain_ratio'] = TRUE;//维持比例  
		        $this->image_lib->initialize($config);
		        $this->image_lib->resize();
		        
				$this->load->helper('number');
				
				$returndata['aid'] 		= ''.$aid.'';
				$thumbfilename = explode('.', $data['filename']);
				$thumbfilename_str = $thumbfilename['0'].'_thumb.'.$thumbfilename['1'];
				$returndata['filename'] = base_url().$thumbfilename_str;
				$returndata['fileext']  = $data['fileext'];
				$returndata['name']     = $data['description'];
				$returndata['filesize'] = byte_format($data['filesize']*1024);
				
				header("Content-Type:text/html;charset=utf-8"); 	
				if($type == 'one') {
					$msg = "<script language='javascript'>
							parent.document.getElementById('".$hidden."').value = '{$returndata['aid']}';
		                    if(parent.document.getElementById('".$imgdid."')) {
		                        parent.document.getElementById('".$imgdid."').innerHTML = \"<img src='{$returndata['filename']}?n' width='70%' />\";
		                    }
	                		</script>";
				}
				else {
					$msg = "<script language='javascript'>
							var thisval =  parent.document.getElementById('".$hidden."').value;
							var innerHTMLval =  parent.document.getElementById('".$imgdid."').innerHTML;
		                    parent.document.getElementById('".$hidden."').value = thisval+','+'{$returndata['aid']}';
		                    if(parent.document.getElementById('".$imgdid."')) {
		                    	 parent.document.getElementById('".$imgdid."').innerHTML = innerHTMLval+' '+\"<img src='{$returndata['filename']}?n' width='20%' />\";
		                    }
	                		</script>";
				}
			}
		} else {
			  $msg = "<script language='javascript'>alert('非法操作！');</script>";
		}
    	echo $msg;
   	    exit();
	}


	/**
	 *  附件上传接口 
	 *  
	 */
	function archives_do_file(){

    	$imgdid = $this->input->get('imgdid') ? $this->input->get('imgdid') : 'divpicview_file';
    	$type 	= $this->input->get('type') ? $this->input->get('type') : 'one';
    	$hidden = $this->input->get('hidden') ? $this->input->get('hidden') : 'file_id';
    	$filename = $this->input->get('filename') ? $this->input->get('filename') : 'upload_file_name';

		if ($_FILES[$filename]['name']) {
		
			$config['upload_path']   = './data/cms/file/'.date('Ymd',time());
			if(!is_dir($config['upload_path']))
	        {
	        	$this->load->helper('dedefile');
	            MkdirAll($config['upload_path']);
	        }
			$config['allowed_types'] = '*';
			// $config['allowed_types'] = 'pdf|tar|zip|rar|ppt|pptx|doc|docx|xls|xlsx|swf|txt';
			$config['max_size']      = 204800;
			$config['file_name']     = time().rand(1000,9999);
		
			$this->load->library('upload', $config);


			if ( ! $this->upload->do_upload($filename))
			{
				$data['up']['result'] = false;
				$data['up']['result'] = $this->upload->display_errors();
				$msg = $data['up']['result'];
				// $msg = "<script language='javascript'>alert('请上传规定的格式的文件或文件大小超过限制！');</script>";
			} 
			else
			{	
				$data_tem = $this->upload->data();
				$data['filename'] = '/data/cms/file/'.date('Ymd',time()).'/'.$data_tem['file_name']; // 已上传的文件名（包括扩展名）
				$datas['thumbfilename'] = 'data/cms/file/'.date('Ymd',time()).'/'.$data_tem['file_name']; // 已上传的文件名（包括扩展名）
				$data['filetype'] = $data_tem['file_type'];
				$data['filepath'] = $data_tem['file_path'];
				$data['fullpath'] = $data_tem['full_path'];
				$data['origname'] = $data_tem['orig_name'];
				$data['fileext']  = $data_tem['file_ext'];
				$data['filesize'] = $data_tem['file_size'];
				$data['description'] = $data_tem['client_name'];
				$data['addtime']   = time();
				$this->db->insert('attachment',$data);
				$aid = $this->db->insert_id();

				$this->load->helper('number');
				
				$returndata['aid'] 		= ''.$aid.'';
				$returndata['fileext']  = $data['fileext'];
				$returndata['name']     = $data['description'];
				$returndata['filesize'] = byte_format($data['filesize']*1024);

				$filename_ne = $returndata['name'];
				header("Content-Type:text/html;charset=utf-8");
				if($type='one'){
					$msg = "<script language='javascript'>
						parent.document.getElementById('".$hidden."').value = '{$returndata['aid']}';
	                    if(parent.document.getElementById('".$imgdid."')) {
	                        parent.document.getElementById('".$imgdid."').innerHTML = '".$filename_ne."';
	                    }
                	</script>";
				}	
			}
		} else {
			  $msg = "<script language='javascript'>alert('非法操作！');</script>";
		}
    	echo $msg;
   	    exit();
	}

}
/* End of file upload.php */
