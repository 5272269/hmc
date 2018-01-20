<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	Class catalog_model extends Ci_Model {

        public $parameter;

		//分配模板
		function display($parameter=array()){
            $this->parameter = $parameter;
			
			$columninfo = $this->_G['params'];

			//列表页
			if(preg_match('/^(templates\/shtml\/).+((\.shtml)|(\.html)|(\.htm))$/',$columninfo['category_template'])){

	            $display=substr($columninfo['category_template'], 16);
	            $this->template->display($display);

		    }

		}
	}
?>