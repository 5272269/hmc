<?php

/*无限树的处理，按栏目属性整理为一个数组返回
* LL
*/
class Tree {
	public $raw_array = array();	//原始数据，从数据库获得数据
	public $list_array = array();	//排序后的数据
	public $key = 0;				//数组的键值
	public $level = 0;				//栏目的级别

	/*获得reid为0的顶级目录，并寻找每个顶级目录下的子栏目，列表形式*/
	function init($raw) {
		$this->raw_array = $raw;
		foreach($raw as $k=>$v){
			if($v['reid'] == '0'){
				$this->list_array[$this->key] = $v;
				$this->key = $this->key+1;
				self::get_next_list($v['id']);
				/*一个栏目下的子栏目寻找结束后，栏目级别初始化，防止下一个子栏目栏目级别错误*/
				$this->level = 0;
			}
		}
		return $this->list_array;
	}

	/*递归调用，处理栏目属性为目录的子栏目，寻找到它的结点，列表形式*/
	function get_next_list($id) {
		/*获取原始数据*/
		$raw = $this->raw_array;
		/*因为为子栏目，所以栏目级别加1，递归时继续加1*/
		$this->level = $this->level+1;
		/*一次递归时子栏目的栏目级别*/
		$level = $this->level;
		/*寻找子栏目，并附加栏目级别*/
		foreach($raw as $k=>$v){
			if($v['reid'] == $id){
				$this->list_array[$this->key] = $v;
				for($i=0;$i<$level;$i++){
					$this->list_array[$this->key]['level'] .= '&nbsp&nbsp&nbsp&nbsp';
				}
				$this->list_array[$this->key]['level'] .= '|—';
				/*增加数组长度*/
				$this->key = $this->key+1;
				/*如果还有子栏目，递归*/
				if($v['ispart'] == 'catalog'){
					self::get_next_list($v['id']);
					/*子栏目递归结束后，栏目级别减1，回归递归前的栏目级别*/
					$this->level = $this->level-1;
				}
			}
		}
	}

	/*获得reid为0的顶级目录，并寻找每个顶级目录下的子栏目，树形式*/
	function init_tree($raw) {
		$this->raw_array = $raw;
		foreach($raw as $k=>$v){
			if($v['reid'] == '0'){
				$this->list_array[$this->key] = $v;
				if($v['ispart'] == 'catalog'){
					$this->list_array[$this->key]['tree'] = self::get_next_tree($v['id']);
				} elseif ($v['ispart'] == 'page') {
					$this->list_array[$this->key]['href'] = site_url('content/info/page').'?cid='.$v['id'];
				} elseif ($v['ispart'] == 'form') {
					$this->list_array[$this->key]['href'] = site_url('content/info/formlist').'?cid='.$v['id'];
				} else {
					$this->list_array[$this->key]['href'] = site_url('content/info/index').'?cid='.$v['id'];
				}
				$this->key = $this->key+1;
			}
		}
		return $this->list_array;
	}

	/*递归调用，处理栏目属性为目录的子栏目，寻找到它的结点，树形式*/
	function get_next_tree($id) {
		$raw = $this->raw_array;
		$key = 0;
		$tree = array();
		foreach($raw as $k=>$v){
			if($v['reid'] == $id){
				$tree[$key] = $v;
				if($v['ispart'] == 'catalog'){
					$tree[$key]['href'] = 'javascript:;';
					$tree[$key]['tree'] = self::get_next_tree($v['id']);
				} elseif ($v['ispart'] == 'page') {
					$tree[$key]['href'] = site_url('content/info/page').'?cid='.$v['id'];
				} elseif ($v['ispart'] == 'form') {
					$tree[$key]['href'] = site_url('content/info/formlist').'?cid='.$v['id'];
				} else {
					// $tree[$key]['href'] = site_url('column/column/index');
					$tree[$key]['href'] = site_url('content/info/index').'?cid='.$v['id'];
				}
				$key = $key+1;
			}
		}
		return $tree;
	}

	/*获得reid为0的顶级目录，并寻找每个顶级目录下的子栏目，返回html*/
	function init_html($raw) {
		$this->raw_array = $raw;
		foreach($raw as $k=>$v){
			if($v['reid'] == '0'){
				$this->list_array[$this->key] = $v;
				$this->list_array[$this->key]['html'] = self::get_next_html($v['id']);
				$this->key = $this->key+1;
			}
		}
		return $this->list_array;
	}

	/*递归调用，处理栏目属性为目录的子栏目，寻找到它的结点，返回html*/
	function get_next_html($id) {
		$raw = $this->raw_array;
		$key = 0;
		$html = '';
		foreach($raw as $k=>$v){
			if($v['reid'] == $id){
				if($v['ispart'] == 'catalog'){
					$href = 'href="javascript:;"';
				}
				else{
					$href = 'href="index.htm"';
				}
				$html .= '<li>
							<a '.$href.' title="'.$v['name'].'" target="main">'.$v['name'].'</a>
						  ';
				$key = $key+1;
				if($v['ispart'] == 'catalog'){
					$html .= '<ul class="submenu'.$key.'" style="display: none">';
					$html .= self::get_next_html($v['id']);
					$html .= '</ul></li>';
				}
				else{
					$html .='</li>';
				}
			}
		}
		return $html;
	}


}
?>
