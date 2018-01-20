<?php

/*文件处理
* LL
*/
class File {

	public $key = 0;
	public $info = array();

	/*获取模板文件
	* $directory 	文件路径
	*/
	public function get_temp($directory,$prefix='') {
		$route = @opendir($directory);
		while($filename = readdir($route)){
			if($filename != '.' && $filename != '..'){
				$subfile = $directory.'/'.$filename;
				if(is_file($subfile)){
                    
					/* $ext_name = substr(strrchr($subfile, '.'), 1);
					if($ext_name == 'html'||$ext_name == 'htm'||$ext_name == 'shtml'||$ext_name == 'php'){
						$this->info[$this->key] = $subfile;
						$this->key = $this->key+1;
					} */
                    if(!empty($prefix)){
                        if(preg_match('/^('.$prefix.').*((\.shtml)|(\.html)|(\.htm)|(\.php))$/',$filename)){
                            $this->info[$this->key] = $subfile;
                            $this->key = $this->key+1;
                        }
                    }else{
                        if(preg_match('/.*((\.shtml)|(\.html)|(\.htm)|(\.php))$/',$filename)){
                            $this->info[$this->key] = $subfile;
                            $this->key = $this->key+1;
                        }
                    }
                    
				}
				if(is_dir($subfile)){
					self::get_temp($subfile,$prefix);
				}
			}
		}
		return $this->info;
	}
}
?>
