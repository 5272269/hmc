<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class models extends MY_Controller {

	function __construct() {
	
		parent::_Mycontroller();
	}
    /**
     * 首页
     */
	public $column;
	public $parentcolumn;
	public $reidlist;
	public $urilist;
	public $columnlist;

	function index() {

		foreach($this->all_menu as $v){
			$this->urilist[$v['id']] = $v['eng_name'];
			$this->reidlist[$v['id']] = $v['reid'];
			$columnlist_all[$v['eng_name']] = $v;
		}

		$uri = $this->uri->uri_string();
		$uri = explode('/', $uri);
		$eng_name = $this->select_models($uri);

		$row = $columnlist_all[$eng_name['column']];
    	$row['uri'] = $eng_name['parentcolumn'];

    	/*处理栏目图片*/
    	$this->load->model('column_model');
    	$pic = $this->column_model->get_pic($row['picid']);
    	$row['pic'] = $pic['filename'];

		$this->_G['params'] = $row;

		$model = $row['ispart'].'_model';
		$this->load->model('index/'.$model);
	
		$this->$model->display($eng_name);
	}

	function select_models($parameters){
		if(!empty($parameters) && in_array($parameters[0], $this->urilist)){
			$this->parentcolumn.=$parameters[0].'/';
			$this->column=$parameters[0];
			$this->columnlist[]=$parameters[0];
            $parameters = array_slice($parameters, 1);
			return self::select_models($parameters);
		}else{
            $over=false;
            if(count($this->columnlist)==1){
                    $id=array_search($this->columnlist[0],$this->urilist);
                    $reid=$this->reidlist[$id];
                    if($reid!=0){
                        redirect();//404 暂时跳转到首页
                    }
            }else{
                for($i=count($this->columnlist)-1;$i>0;$i--){
                    if($over){
                        redirect();//404 暂时跳转到首页
                    }
                    $id=array_search($this->columnlist[$i],$this->urilist);
                    $reid=$this->reidlist[$id];
                    
                    if($reid!=0){
                        if($this->urilist[$reid]!=$this->columnlist[$i-1]){
                            redirect();//404 暂时跳转到首页
                        }
                    }else{
                        $over=true;
                    }
                }
            }
			return array('column'=>$this->column,'parentcolumn'=>$this->parentcolumn,'parameter'=>$parameters);
		}
	}
}
/* End of file *.php */
/* Location: ./application/controllers/*.php */