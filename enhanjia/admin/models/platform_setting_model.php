<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 平台设置模型
 */ 
class platform_setting_model extends Ci_Model{
	
	protected $cachename = 'syssetting';// 缓存名称	
	public function __construct(){
		  parent::__construct();
		  $this->cachename = md5($this->cachename);
	}
	/**
	 * 写入缓存
	 */
	public function writeCache(){
		
		$rs = $this->db->query("SELECT * FROM ".$this->db->dbprefix('sysconfig')." WHERE groupid = 1 ORDER BY id ASC");
		$info = $rs->result_array('array');
		$this->cachename = md5($cachename);
		$this->load->driver('cache');
		foreach ($info as $k=>$v){
			$infolist[$v['var_name']] = $v;
		}
		$this->cache->file->save($this->cachename.'_sys', $infolist, 100000);
		return true;
	}
	/**
	 * 获取缓存数据
	 */
	public function getCache(){
	
		$this->load->driver('cache');
		$info = $this->cache->file->get($this->cachename.'_sys');
		if (empty($info)) {
			self::writeCache();
			return $this->cache->file->get($this->cachename.'_sys');
		}
		return $info;
	}
}