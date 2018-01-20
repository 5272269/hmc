<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// 菜单模型
class Menu_note extends Ci_Model{
	
	protected $tree; //已审核子树类
	protected $tree_all; //全部子树类
	protected $all_node; //所有分类
	protected $cachename = 'menu_note';// 缓存名称
	protected $type = array('_self'=>'当前窗口','_blank'=>'新窗口','top'=>'上窗口','left'=>'左窗口','main'=>'右窗口');
	
	public function __construct(){
		
		  parent::__construct();
		  $this->cachename = md5($this->cachename);
		 
	}
	// 得到菜单全部select下拉框数据
	public function getMenuSelect($p=0,$name=''){
		$check = ($p==0) ? ' selected="selected"' : '';
		$name = $name ? $name : 'reid';

		// 得到经过排序的全部子列表
		$nodes = $this->getChildList(0);
		
		$tmp =  '<select name="'.$name.'" id="'.$name.'">';
		$tmp .= '<option value="0"'.$check.'>顶级菜单</option>';
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
				$val['name'] = "【".$val['name']."】";
				$level = '';
			}
			$tmp .= '<option value="'.$val['id'].'"'.$check.$class.' >'.$level.$val['name'].'</option>';
		}
		$tmp .= '</select>';
		
		return $tmp;
	}

	//得到弹出窗口选项的select下拉框
	public function getTargetSelect($p){
		$tmp = '<select name="target" id="target">';
		foreach ($this->type as $k => $v){
			$check = ($k==$p) ? ' selected="selected"' : '';
			$tmp .= '<option value="'.$k.'"'.$check.'>'.$v.'</option>';
		}
		$tmp .= '</select>';
		return $tmp;
	}

	//窗口类型转换成名称
	public function target2name($p){
		return $this->type[$p];
	}

	// 得到菜单全部分类Checkbox勾选框数据 $type菜单类型 1管理员后台 2会员后台
	public function getMenuCheckbox($p=array(),$name='',$type=1){
		if (!is_array($p)) $p = explode(',',trim($p,','));
		$name = $name ? $name : 'menuids';
		$typeid = $this->_type2id($type);

		// 全部菜单
		$nodes = $this->getChildTree($typeid);
		if (!$nodes) {
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

	//删除菜单
	public function deleteMenu($id){
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

	// 得到所有未排序的节点
	public function getAllNode(){
		if (!$this->all_node) {
			$tree = $this->tree();
			$this->all_node = $tree->getAllNode();
			return $this->all_node;
		}
		return $this->all_node;
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

	// 得到父列表
	public function getParentList($id){
		return $this->tree()->getParentList($id);
	}

	// 得到子列表
	public function getChildList($id){
		
		return $this->tree()->getChildList($id);
	}

	// 得到子树
	public function getChildTree($id){
		return $this->tree()->getChildTree($id);
	}

	//删除所有分类节点缓存
	public function delCache(){
		$this->tree()->delCache();
		$this->treeAll()->delCache();
	}

	/**
	 * 
	 * 获取对应id下的所有栏目
	 * @param 
	 */
	public function getAccessMenu($id){

		// 全部菜单节点
		$allnode = $this->getChildTree($id);
		// $this->load->model('system_note', '', TRUE);
		foreach ($allnode as $k=>$v){ 
			// 如果是管理员 或者 有菜单节点权限 则显示菜单
			foreach($v['child'] as $k3=>$v3){
			    if (empty($v3['url']) && !empty($v3['nodeid']) ) {
					
					$recodearr = $this->db->query(" SELECT id,reid,code 
													FROM ".$this->db->dbprefix('system_node')." 
													where id = ".$v3['nodeid']." limit 1")->first_row('array');
					$recode = $recodearr['code'];
					
					if(!empty($recodearr['reid'])){
						$codearr = $this->db->query("SELECT id,reid,code 
													 FROM ".$this->db->dbprefix('system_node')." 
													 WHERE id = ".$recodearr['reid']." limit 1")->first_row('array');
						$code = $codearr['code'];
						$code = $code.'|'.$recode;
					}
					
			  	   if(!empty($codearr['reid'])){
						$arr = $this->db->query("SELECT id,reid,code 
												FROM ".$this->db->dbprefix('system_node')." 
												WHERE id = ".$codearr['reid']." limit 1")->first_row('array');
						$newcode = $arr['code'];
						$code = $code.'|'.$newcode;
					}
					
					if ( !empty( $code ) ) {
						$code 		= explode('|',$code);
						$module 	= $code[0] ? $code[0] : 'index';
						$action 	= $code[1] ? $code[1] : 'index';
						$app 		= $code[2] ? $code[2] : 'content';
						$v3['url'] 	= site_url($app.'/'.$module.'/'.$action).$v3['parameter'];
					} else {
						$v3['url'] 	= 'javascript:;';
					}
					
				     $sql_do = "SELECT id FROM ".$this->db->dbprefix('admin_role')." 
								WHERE id = '".$this->G['role_id']."' 
					 			AND ( auth like '%,".$recodearr['id'].",%' OR auth like '%,".$codearr['id'].",%' OR auth like '%,".$arr['id'].",%' OR auth ='all' ) 
					 			LIMIT 1";
					 $ispower = $this->db->query($sql_do);
					 if($ispower->num_rows() == '1'){
						$allnode[$k]['child'][$k3] = $v3;
					 }else{
					 	unset($allnode[$k]['child'][$k3]);
					 }
				}
			}
			
			if (empty($v['child'])) {
				if (empty($v['url']) && !empty($v['nodeid']) ) {
					
					$recodearr = $this->db->query(" SELECT id,reid,code 
													FROM ".$this->db->dbprefix('system_node')." 
													where id = ".$v['nodeid']." limit 1")->first_row('array');
					$recode = $recodearr['code'];
					
					if(!empty($recodearr['reid'])){
						$codearr = $this->db->query("SELECT id,reid,code 
													 FROM ".$this->db->dbprefix('system_node')." 
													 WHERE id = ".$recodearr['reid']." limit 1")->first_row('array');
						$code = $codearr['code'];
						$code = $code.'|'.$recode;
					}
					
			  	   if(!empty($codearr['reid'])){
						$arr = $this->db->query("SELECT id,reid,code 
													 FROM ".$this->db->dbprefix('system_node')." 
													 WHERE id = ".$codearr['reid']." limit 1")->first_row('array');
						$newcode = $arr['code'];
						$code = $code.'|'.$newcode;
					}
					
					if ( !empty( $code ) ) {
						$code 		= explode('|',$code);
						$module 	= $code[0] ? $code[0] : 'content';
						$action 	= $code[1] ? $code[1] : 'index';
						$app 		= $code[2] ? $code[2] : 'index';
						$v['url'] 	= site_url($app.'/'.$module.'/'.$action).$v['parameter'];
					} else {
						$v['url'] 	= 'javascript:;';
					}
					
					$sql_do = "SELECT id FROM ".$this->db->dbprefix('admin_role')." 
								WHERE id = '".$this->G['role_id']."' 
					 			AND ( auth like '%,".$recodearr['id'].",%' OR auth like '%,".$codearr['id'].",%' OR auth like '%,".$arr['id'].",%' OR auth ='all' ) 
					 			LIMIT 1";
					 $ispower = $this->db->query($sql_do);
					 if($ispower->num_rows() == '1'){
						$allnode[$k]['child'][$k3] = $v3;
					 }else{
					 	unset($allnode[$k]['child'][$k3]);
					 }
				}
			}
		}
		return $allnode;
	}
	/**
	 * 得到节点类
	 * Enter description here ...
	 */
	protected function tree(){
		if ($this->tree) {
			return $this->tree;
		}else{
			
			include_once APPPATH.'/libraries/menu_tree.php';
			$info = self::gettreec();
			$this->tree = new menu_tree($info,'id','reid');
			return $this->tree;
		}
	}
	// 写入缓存
	public function writetreec(){
		
		$sql = "SELECT * FROM ".$this->db->dbprefix('menu')." WHERE is_check=1 ORDER BY sort ASC,id ASC";
		$info = $this->db->query($sql)->result_array('array');
		// var_dump($info);
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		$this->cache->file->save($this->cachename.'_tree', $info, 100000);
		return $this->cache->file->get($this->cachename.'_tree');
	}
	
	public function gettreec(){
	
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
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
			
			include_once APPPATH.'/libraries/menu_tree.php';
			$info = self::getc();
			$this->tree_all = new menu_tree($info,'id','reid');
			return $this->tree_all;
		}
	}
	
	// 写入缓存
	public function writec(){
		
		$sql = "SELECT * FROM ".$this->db->dbprefix('menu')." where is_check = '1' ORDER BY sort ASC,id ASC";
		$info = $this->db->query($sql)->result_array('array');
		
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
		$this->cache->file->save($this->cachename.'_tree_all', $info, 100000);
		return $this->cache->file->get($this->cachename.'_tree_all');
		
	}
	// 
	public function getc(){
		
		$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
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

	// 根据菜单类型转换成菜单ID
	protected function _type2id($type){
		if ($type == 1) {
			//管理员后台菜单
			$id = 1;
		}elseif($type == 2){
			//会员前台菜单
			$id = 1;
		}else{
			// 待开发
			$id = 1;
		}
		return $id;
	}
	
	public function writecache(){
		self::writetreec();
		self::writec();
	}
}