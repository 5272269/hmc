<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	Class catalog_model extends Ci_Model {

		public $parentcolumn;
		public $level = -1;				//栏目的级别
		/*获取栏目列表*/
		public function get_catalog_list($id=0) {
			$sql = "SELECT id,reid,sort,name,ispart,info_model
				FROM ".$this->db->dbprefix('column')."
				WHERE status = '0'
				AND reid = '".$id."'
				ORDER BY sort,id";
			$info = $this->db->query($sql)->result_array();
			$this->level = $this->level+1;
			/*一次递归时子栏目的栏目级别*/
			$level = $this->level;
			foreach($info as $k =>$v){
				$info[$k]['level']=$level;
				$info[$k]['child']=$this->get_catalog_list($v['id']);
				$this->level = $this->level-1;
			}
			return $info;
		}


		public function display($parameter=array()) {
	        $this->parentcolumn='';
			$sql = " SELECT * 
					FROM ".$this->db->dbprefix('column')." 
					WHERE eng_name = '".$parameter['column']."'
					ORDER BY sort DESC , id DESC
					LIMIT 1 ";
			$columninfo = $this->db->query($sql)->row_array();
	        if($columninfo['is_exist']==0){
	            //如果没页面 就寻找子栏目
	            $childrencolumn=self::findchildrencolumn($columninfo['id']);
	            if($childrencolumn['display']==false){
	            	$model_s = $childrencolumn['ispart'].'_model';
	            	$this->load->model($model_s);
	                $this->$model_s->display($childrencolumn['parameter']);
	            }
	            return true;
	        }

	        //如果有页面 就显示页面
			$sql = "SELECT *
					FROM ".$this->db->dbprefix('column')." 
					WHERE reid = '".$columninfo['id']."'			
					ORDER BY sort DESC , id DESC";
			$list = $this->db->query($sql)->result_array();
			$data['columninfo']=$columninfo;
			$data['parentcolumn'] = $parameter['parentcolumn'];
			$data['columnlist']=$list;
			//$this->CI->template->display('application/catalog.shtml',$data);
	        if(preg_match('/^(templates\/shtml\/).+((\.shtml)|(\.html)|(\.htm))$/',$columninfo['catagory_template'])){
	            $display=substr($columninfo['catagory_template'], 16);
	            $this->template->display($display,$data);
	        }else{
	            $this->template->display('application/catalog.shtml',$data);
	        }
			
	    }
	    function findchildrencolumn($id=0) {
	            $sql = "SELECT *
	                    FROM ".$this->db->dbprefix('column')." 
	                    WHERE reid = '".$id."'
	                    AND (ispart = 'doc' OR ispart = 'form' OR ispart = 'page' )
	                    ORDER BY sort DESC , id DESC
	                    LIMIT 1 ";
	            $columninfo = $this->db->query($sql)->row_array();
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
	                        FROM ".$this->db->dbprefix('column')." 
	                        WHERE reid = '".$id."'			
	                        AND ispart = 'catalog'
	                        AND is_exist = '1'
	                        ORDER BY sort DESC , id DESC
	                        LIMIT 1 ";
	                $columninfo = $this->db->query($sql)->row_array();
	                if(count($columninfo)){
	                    self::findparentcolumn($columninfo['id']);
	                    $re['parameter']=array('column'=>$columninfo['eng_name'],'parentcolumn'=>$this->parentcolumn,'parameter'=>array());
	                    $re['ispart']=$columninfo['ispart'];
	                    $re['display']=false;
	                    return $re;
	                }else{
	                    //如果连有页面的子目录也没有 就把子目录循环再寻找
	                    $sql = "SELECT *
	                            FROM ".$this->db->dbprefix('column')." 
	                            WHERE reid = '".$id."'			
	                            AND ispart = 'catalog'
	                            AND is_exist = '0'
	                            ORDER BY sort DESC , id DESC";
	                    $list = $this->db->query($sql)->result_array();
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
				FROM ".$this->db->dbprefix('column')." 
				WHERE id = '".$id."'";
			$row = $this->db->query($sql)->row_array();
	        $this->parentcolumn=$row['eng_name'].'/'.$this->parentcolumn;
	        if($row['reid']){
	            self::findparentcolumn($row['reid']);
	        }
	        
	    }



	}
?>