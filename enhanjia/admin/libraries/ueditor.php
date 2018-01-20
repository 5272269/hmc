<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 编辑器类
 */
class Ueditor {
	
	public $height; // 高
	public $width; // 宽
	public $type;  // simple 简版   other
	public $charset = 'utf-8'; // 编码
	public $base = '';
	public $url = 'templates/js/ueditor/';
	public $content = '请输入内容';
    private $CI;
    private $HTTP;
    private $index_page;
    private $uurl;
	public function __construct(){
		$this->CI =& get_instance();
        $this->HTTP = $this->CI->config->config['base_url'];
        $this->HTTPU = $this->CI->config->config['base_url'].'/';
		$this->uurl = $this->HTTP.$this->url;
	}
	/**
	 * 获取编辑器
	 */
	public function getueditor($type,$width,$heght,$charset,$content,$_title){

			if(!empty($content)){
				$this->content = $content[0];
			}
			$this->charset = 'utf-8';

			$ueditorstr = '';
			$ueditorstr .= '<style type="text/css">
						      
						    </style>';
			$ueditorstr .= '<script type="text/javascript">
    					var HTTP = "'.$this->HTTP.'";
    					var HTTPU = "'.$this->HTTPU.'";
    					var URLU = "'.$this->url.'";
    					</script>';
	    	
	    	$ueditorstr.='<script type="text/javascript" charset="'.$this->charset.'" src="'.$this->uurl.'ueditor.config.js"></script>';			
	    	$ueditorstr.='<script type="text/javascript" charset="'.$this->charset.'" src="'.$this->uurl.'ueditor.all.js"> </script>';			
	    	$ueditorstr.='<script type="text/javascript" charset="'.$this->charset.'" src="'.$this->uurl.'lang/zh-cn/zh-cn.js"></script>';			
    	if(count($_title)>1 || count($content)>1){
    		$keys = array_keys($_title);
    		foreach($content as $kk=>$vv){
    			$_content_last[$keys[$kk]] = $vv;
    		}
    		
    		foreach($_title as $k=>$v){
    			if (empty($_content_last[$k])) {
    				$_content_last[$k]='请输入内容';
    			} else {
    				$_content_last[$k] = $_content_last[$k];
    			}

			$ueditorstr.='<h2>'.$v.'</h2><script id="myEditor_'.$k.'" type="text/plain" style="width:100%;height:450px;">'.$_content_last[$k].'</script>';			
			$ueditorstr .= '<script type="text/javascript">
							var editor_'.$k.' = new baidu.editor.ui.Editor({
    						textarea: \'editorValue['.$k.']\'
    						});
    						editor_'.$k.'.render( \'myEditor_'.$k.'\' );
							</script>';
    		}
    	
    	} else {
    		$ueditorstr.=' <script id="myEditor" type="text/plain" style="width:100%;height:450px;">'.$this->content.'</script>';			
    		$ueditorstr .= '<script type="text/javascript">
							var editor_a = new baidu.editor.ui.Editor({
							textarea: \'editorValue\'	
							});
    						editor_a.render( \'myEditor\' );
	    					</script>';
    	}

		return $ueditorstr;
	}
	
}

/* End of file ueditor_helper.php */