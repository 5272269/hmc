<?php
/**
 * 模板标签类 
 */
class Catalog{
    function __construct(){
        $this->CI =& get_instance();
    }
	public $parentcolumn;

    public function display($parameter=array()) {
        $this->parentcolumn='';
		$sql = " SELECT * 
				FROM ".$this->CI->db->dbprefix('column')." 
				WHERE eng_name = '".$parameter['column']."'
				ORDER BY sort DESC , id DESC
				LIMIT 1 ";
		$columninfo = $this->CI->db->query($sql)->row_array();
        if($columninfo['is_exist']==0){
            //如果没页面 就寻找子栏目
            $childrencolumn=self::findchildrencolumn($columninfo['id']);
            if($childrencolumn['display']==false){
            	$this->CI->load->library($childrencolumn['ispart']);
                $this->CI->$childrencolumn['ispart']->display($childrencolumn['parameter']);
            }
            return true;
        }

        //如果有页面 就显示页面
		$sql = "SELECT *
				FROM ".$this->CI->db->dbprefix('column')." 
				WHERE reid = '".$columninfo['id']."'			
				ORDER BY sort DESC , id DESC";
		$list = $this->CI->db->query($sql)->result_array();
		$data['columninfo']=$columninfo;
		$data['parentcolumn'] = $parameter['parentcolumn'];
		$data['columnlist']=$list;
		//$this->CI->template->display('application/catalog.shtml',$data);
        if(preg_match('/^(templates\/shtml\/).+((\.shtml)|(\.html)|(\.htm))$/',$columninfo['catagory_template'])){
            $display=substr($columninfo['catagory_template'], 16);
            $this->CI->template->display($display,$data);
        }else{
            $this->CI->template->display('application/catalog.shtml',$data);
        }
		
    }
    function findchildrencolumn($id=0) {
            $sql = "SELECT *
                    FROM ".$this->CI->db->dbprefix('column')." 
                    WHERE reid = '".$id."'
                    AND (ispart = 'doc' OR ispart = 'form' OR ispart = 'page' )
                    ORDER BY sort DESC , id DESC
                    LIMIT 1 ";
            $columninfo = $this->CI->db->query($sql)->row_array();
            if(count($columninfo)){
                //如果有文档、表单、页面类型的子栏目 就显示页面
                self::findparentcolumn($columninfo['id']);
                $re['parameter']=array('column'=>$columninfo['eng_name'],'parentcolumn'=>$this->parentcolumn,'parameter'=>array());
                $re['ispart']=$columninfo['ispart'];
                $re['display']=false;
                return $re;
            }else{
                //如果没有 就寻找有页面的子目录
                $sql = "SELECT *
                        FROM ".$this->CI->db->dbprefix('column')." 
                        WHERE reid = '".$id."'			
                        AND ispart = 'catalog'
                        AND is_exist = '1'
                        ORDER BY sort DESC , id DESC
                        LIMIT 1 ";
                $columninfo = $this->CI->db->query($sql)->row_array();
                if(count($columninfo)){
                    self::findparentcolumn($columninfo['id']);
                    $re['parameter']=array('column'=>$columninfo['eng_name'],'parentcolumn'=>$this->parentcolumn,'parameter'=>array());
                    $re['ispart']=$columninfo['ispart'];
                    $re['display']=false;
                    return $re;
                }else{
                    //如果连有页面的子目录也没有 就把子目录循环再寻找
                    $sql = "SELECT *
                            FROM ".$this->CI->db->dbprefix('column')." 
                            WHERE reid = '".$id."'			
                            AND ispart = 'catalog'
                            AND is_exist = '0'
                            ORDER BY sort DESC , id DESC";
                    $list = $this->CI->db->query($sql)->result_array();
                    foreach($list as $k=>$v){
                        self::findparentcolumn($v['id']);
                        $res=array('column'=>$v['eng_name'],'parentcolumn'=>$this->parentcolumn,'parameter'=>array());
                        if(self::display($res)){
                            $re['display']=true;
                            return $re;
                        }
                    }
                }
           }
    }
    function findparentcolumn($id){
		$sql = " SELECT * 
			FROM ".$this->CI->db->dbprefix('column')." 
			WHERE id = '".$id."'";
		$row = $this->CI->db->query($sql)->row_array();
        $this->parentcolumn=$row['eng_name'].'/'.$this->parentcolumn;
        if($row['reid']){
            self::findparentcolumn($row['reid']);
        }
        
    }
}