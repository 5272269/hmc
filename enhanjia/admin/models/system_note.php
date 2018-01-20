<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 权限节点模型
 */ 
class System_note extends Ci_Model{
	
	//已审核子树类
	protected $tree; 
	//全部子树类
	protected $tree_all; 
	//所有分类
	protected $all_node; 
	//所有权限值
	protected $all_code; 
	
	protected $cachename = 'system_note';// 缓存名称
	
	public function __construct(){
		
		  parent::__construct();
		  $this->cachename = md5($this->cachename);
		
	}
	//得到节点全部分类Checkbox勾选框数据
	//$name 表单名称
	//$type节点类型 1管理员后台节点 2会员前台节点
	public function getNodeCheckbox($p=array(),$name='',$type=1){
		if (!is_array($p)) $p = explode(',',trim($p,','));
		$name = $name ? $name : 'nodeids';
		$typeid = $this->_type2id($type);

		// 全部权限值
		$result = $this->getChildTree(0);
		if ($result[$typeid]) {
			$nodes[$typeid] = $result[$typeid];
		}else{
			return '';
		}		
		$tmp = '';
		foreach ($nodes as $app){
			$tmp .=  '<div class="purview">';
			if (in_array($app['id'],$p)) {
				$check = ' checked="checked"';
			}			
			$tmp .= '<div class="tit"><input type="checkbox" name="'.$name.'[]" value="'.$app['id'].'" '.$check.' />'.$app['name'].'</div>';
			unset($check);
			if ($app['child_count'] > 0) {
				foreach ($app['child'] as $module){
					if (in_array($module['id'],$p)) {
						$check = ' checked="checked"';
					}
					$tmp .= '<div class="tit1"><input type="checkbox" name="'.$name.'[]" value="'.$module['id'].'" '.$check.' />'.$module['name'].'</div>';
					$tmp .= '<ul>';
					unset($check);
					if ($module['child_count'] > 0) {
						foreach ($module['child'] as $action){
							if (in_array($action['id'],$p)) {
								$check = ' checked="checked"';
							}
							$tmp .= '<li><input type="checkbox" name="'.$name.'[]" value="'.$action['id'].'" '.$check.' />'.$action['name'].'</li>';
							unset($check);
						}
					}
					$tmp .= '</ul>';
				}
			}
			$tmp .= '</div>';	
		}		
		return $tmp;
	}

	// 得到节点全部select下拉框数据
	public function getNodeSelect($p=0,$name='',$size=''){		
		if ($size) {
			$size = ' size="'.$size.'"';
		}
		$name = $name ? $name : 'reid';
		$check = ($p==0) ? ' selected="selected"' : '';

		// 得到经过排序的全部子列表
		$nodes = $this->getChildList(0);
		$tmp =  '<select name="'.$name.'" id="'.$name.'"'.$size.'>';
		$tmp .= '<option value="0"'.$check.'>顶级节点</option>';
		foreach ($nodes as $val){
			if ( $val['id'] == $p ) {
				$check = ' selected="selected"';
			}else{
				$check = '';
			}
			$class = ($val['level'] == 2) ? ' style="background:#e9e9e9"' : '';
			if ($val['level'] > 1) {
				$level = str_repeat('　',$val['level']-1);
				$level .= '|—';
			}else{
				$level = '';
			}
			$tmp .= '<option value="'.$val['id'].'"'.$check.$class.'>'.$level.$val['name'].'</option>';
		}
		$tmp .= '</select>';
		return $tmp;
	}
	
	// 删除节点
	public function deleteNode($id){
		//此节点下的所有子节点
		$sun = $this->treeAll()->getChildList($id);
		$in = '';
		if ($sun) {
			foreach ($sun as $v) {
				$in .= $v['id'].',';
			}
		}
		$in = $in.$id;
		$result = $this->where("id in($in)")->delete();
		$this->delCache();//清除缓存
		return $result;
	}
	
	// 单个节点详情
	public function getNodeInfo($id){
		$result = $this->where("id = '$id'")->find();
		return $result;
	}

	// 得到所有未排序的节点
	public function getAllNode(){
		if (!$this->all_node) {
			$tree = $this->tree();
			$this->all_node = $tree->getAllNode();
			return $this->all_node;
		}
		return $this->all_node;
	}

	// 得到所有未排序节点 以code为键的数组
	public function getAllNodeCode(){
		if (!$this->all_code) {
			$allcode = array();
			$allnode = $this->getAllNode();
			
			foreach ($allnode as $key => $val){
				$code = '';
				// 查询ID的父列表ID
				$parent = $this->getParentList($val['id']);
				
				if ($parent) {
					// 所有父列表的code值
					foreach ($parent as $v){
						$code .= $v['code'].'_';
					}
					// 合并自身的code值
					$code .= $val['code'];
				}else{
					$code = $val['code'];
				}
				$allcode[strtolower($code)] = $val['id'];
			}
			
			$this->all_code = $allcode;
			return $allcode;
			
		}
		return $this->all_code;
	}

	// 得到某个节点
	public function getNode($id){
		return $this->tree()->getNode($id);
	}

	// 节点id转换成名称
	public function id2name($id){
		$result = $this->getAllNode();
		if (isset($result[$id]['name'])) {
			return $result[$id]['name'];
		}else{
			return '';
		}
	}

	// 将标示符转换成节点ID
	public function code2id($name){
		$result = $this->getAllNodeCode();
		
		if (isset($result[$name])) {
			return $result[$name];
		}else{
			return '';
		}
	}

	// 将节点ID转换成标示符
	public function id2code($id){
		
		$result = array_flip($this->getAllNodeCode());
		
		if (isset($result[$id])) {
			return $result[$id];
		}else{
			return '';
		}
	}

	// 得到父列表
	public function getParentList($id){
		
		return $this->tree()->parent_tree[$id];
	}

	// 得到子列表
	public function getChildList($id){
		
		return $this->tree()->getChildList($id);
	}

	// 得到子树
	public function getChildTree($id){
		return $this->tree()->getChildTree($id);
	}

	// 得到节点类
	protected function tree(){
		
		if ($this->tree) {
			
			return $this->tree;
		}else{
			include_once APPPATH.'/libraries/tree.php';
			$info = self::gettreec();
			$this->tree = new Tree($info,'id','reid');
			return $this->tree;
		}
	}
	
	// 写入缓存
	public function writetreec(){
		
		$sql = "SELECT * FROM ".$this->db->dbprefix('system_node')." WHERE is_check=1 ORDER BY sort ASC,id ASC";
		$info = $this->db->query($sql)->result_array('array');
		$this->load->driver('cache');
		$this->cache->file->save($this->cachename.'_tree', $info, 100);
		return $this->cache->file->get($this->cachename.'_tree');
	}
	
	public function gettreec(){
	
		$this->load->driver('cache');
		$info = $this->cache->file->get($this->cachename.'_tree');
		if(empty($info)){
			self::writetreec();
		}
		return $this->cache->file->get($this->cachename.'_tree');
	}
	// 得到全部节点包括带审核的
	public function treeAll(){
		if ($this->tree_all) {
			
			return $this->tree_all;
		}else{
						
			include_once APPPATH.'/libraries/tree.php';
			$info = self::getc();
			$this->tree_all = new Tree($info,'id','reid');
			return $this->tree_all;
		}
		
	}
	// 写入缓存
	public function writec(){
		
		$sql = "SELECT * 
				FROM ".$this->db->dbprefix('system_node')." 
				ORDER BY sort ASC,id ASC";
		$info = $this->db->query($sql)->result_array('array');
		$this->load->driver('cache');
		$this->cache->file->save($this->cachename.'_tree_all', $info, 100);
		
		return $this->cache->file->get($this->cachename.'_tree_all');
		
	}
	
	public function getc(){
		
		$this->load->driver('cache');
		$info = $this->cache->file->get($this->cachename.'_tree_all');
		if(empty($info)){
			self::writec();
		}
		return $this->cache->file->get($this->cachename.'_tree_all');
	}
	// 得到全部子列表 包括待审核的
	public function getChildListAll($id){
		return $this->treeAll()->getChildList($id);
	}
	
	// 根据节点类型转换成节点ID
	protected function _type2id($type){
		if ($type == 1) {
			//管理员后台节点
			$id = 1;
		}elseif($type == 2){
			//会员前台节点
			$id = 1;
		}else{
			// 待开发
			$id = 1;
		}
		return $id;
	}
	/**
	 * 清除缓存
	 */
	public function writecache(){
		
		self::writetreec();
		self::writec();
	}
}