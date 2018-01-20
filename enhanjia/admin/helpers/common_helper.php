<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 * 系统加密解密函数
 * 
 * @param string $string 字符串
 * @param string $operation DECODE　解密 UNCODE 解密
 * @param string $key 加密串
 */
function authcode($string, $operation='DECODE', $key = '') {
	
	$index_key = 'jcomp';
	$key = md5($key ? $key : md5($index_key.$_SERVER['HTTP_USER_AGENT']));
	$key_length = strlen($key);

	$string = $operation == 'DECODE' ? base64_decode($string) : substr(md5($string.$key), 0, 8).$string;
	$string_length = strlen($string);

	$rndkey = $box = array();
	$result = '';

	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($key[$i % $key_length]);
		$box[$i] = $i;
	}

	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if($operation == 'DECODE') {
		if(substr($result, 0, 8) == substr(md5(substr($result, 8).$key), 0, 8)) {
			return substr($result, 8);
		} else {
			return '';
		}
	} else {
		return str_replace('=', '', base64_encode($result));
	}
}

/**
 *  短消息函数,可以在某个动作处理后友好的提示信息
 *
 * @param     string  $msg      消息提示信息
 * @param     string  $gourl    跳转地址
 * @param     int     $onlymsg  仅显示信息
 * @param     int     $limittime  限制时间
 * @return    void
 * @param     LL
 */

function show_msg($msg, $gourl, $onlymsg=0, $limittime=0)
{
    if(empty($GLOBALS['cfg_plus_dir'])) $GLOBALS['cfg_plus_dir'] = '..';

    $htmlhead  = "<html>\r\n<head>\r\n<title>tip</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n";
    $htmlhead .= "<base target='_self'/>\r\n<style>div{line-height:160%;}</style></head>\r\n<body leftmargin='0' topmargin='0' bgcolor='#FFFFFF'>".(isset($GLOBALS['ucsynlogin']) ? $GLOBALS['ucsynlogin'] : '')."\r\n<center>\r\n<script>\r\n";
    $htmlfoot  = "</script>\r\n</center>\r\n</body>\r\n</html>\r\n";

    $litime = ($limittime==0 ? 1000 : $limittime);
    $func = '';

    if($gourl=='-1')
    {
        if($limittime==0) $litime = 5000;
        $gourl = "javascript:history.go(-1);";
    }

    if($gourl=='' || $onlymsg==1)
    {
        $msg = "<script>alert(\"".str_replace("\"","“",$msg)."\");</script>";
    }
    else
    {
        //当网址为:close::objname 时, 关闭父框架的id=objname元素
        if(preg_match('/close::/',$gourl))
        {
            $tgobj = trim(preg_replace('/close::/', '', $gourl));
            $gourl = 'javascript:;';
            $func .= "window.parent.document.getElementById('{$tgobj}').style.display='none';\r\n";
        }
        
        $func .= "      var pgo=0;
      function JumpUrl(){
        if(pgo==0){ location='$gourl'; pgo=1; }
      }\r\n";
        $rmsg = $func;
        $rmsg .= "document.write(\"<br /><div style='width:450px;padding:0px;border:1px solid #E9E9E9;'>";
        $rmsg .= "<div style='padding:6px;font-size:12px;color:#0000;border-bottom:1px solid #E9E9E9;background:#E9E9E9';'><b>提示信息！</b></div>\");\r\n";
        $rmsg .= "document.write(\"<div style='height:130px;font-size:10pt;background:#ffffff'><br />\");\r\n";
        $rmsg .= "document.write(\"".str_replace("\"","“",$msg)."\");\r\n";
        $rmsg .= "document.write(\"";
        
        if($onlymsg==0)
        {
            if( $gourl != 'javascript:;' && $gourl != '')
            {
                $rmsg .= "<br /><a href='{$gourl}'>如果你的浏览器没反应，请点击这里...</a>";
                $rmsg .= "<br/></div>\");\r\n";
                $rmsg .= "setTimeout('JumpUrl()',$litime);";
            }
            else
            {
                $rmsg .= "<br/></div>\");\r\n";
            }
        }
        else
        {
            $rmsg .= "<br/><br/></div>\");\r\n";
        }
        $msg  = $htmlhead.$rmsg.$htmlfoot;
    }
    echo $msg;exit;
}


/**
 *  HTML转换为文本
 *
 * @param    string  $str 需要转换的字符串
 * @param    string  $r   如果$r=0直接返回内容,否则需要使用反斜线引用字符串
 * @return   string
 * @param    WC
 */
if ( ! function_exists('html2text'))
{
    function html2text($str,$r=0)
    {
        if(!function_exists('sphtml2text'))
        {
        	
        }
        if($r==0)
        {
            return sphtml2text($str);
        }
        else
        {
            $str = sphtml2text(stripslashes($str));
            return addslashes($str);
        }
    }
}
function sphtml2text($str)
{
	$str = preg_replace("/<sty(.*)\\/style>|<scr(.*)\\/script>|<!--(.*)-->/isU","",$str);
	$alltext = "";
	$start = 1;
	for($i=0;$i<strlen($str);$i++)
	{
		if($start==0 && $str[$i]==">")
		{
			$start = 1;
		}
		else if($start==1)
		{
			if($str[$i]=="<")
			{
				$start = 0;
				$alltext .= " ";
			}
			else if(ord($str[$i])>31)
			{
				$alltext .= $str[$i];
			}
		}
	}
	$alltext = str_replace("　"," ",$alltext);
	$alltext = preg_replace("/&([^;&]*)(;|&)/","",$alltext);
	$alltext = preg_replace("/[ ]+/s"," ",$alltext);
	return $alltext;
}

/**
 * 
 * json输出
 * @param array $data json格式数据
 * @param string $msg 成功的提示
 * @param int $code 成功的标记code
 * @param int $status 网络相应code
 */
function response($data = '', $msg = '', $code = 1000, $status = 200){
    @header ("Cache-Control: no-cache, must-revalidate");  
    @header ("Pragma: no-cache");  
    @header('Content-type: application/json');

    set_status_header($status);
    die(json_encode(array(
        'code' => $code,
        'msg' => $msg,
        'data' => $data
    )));

}

/**
 * 获取新添加的模型的数据库名称
 * @param string $table 模型的模型类型
 * 
 * $table=to_table('form_1');
 */

function to_table($table='doc_1'){

    if(!$table) return false;
    $table = explode('_',$table);
    return OMP_DB_DBPREFIX.'model_'.$table[0].'_'.$table[1];

}


//二维数组排序， $arr是数据，$keys是排序的健值，$order是排序规则，1是升序，0是降序
function array_sort($arr, $keys, $order=0) {
    if (!is_array($arr)) {
    return false;
    }
    $keysvalue = array();
    foreach($arr as $key => $val) {
    $keysvalue[$key] = $val[$keys];
    }
    if($order == 0){
    asort($keysvalue);
    }else {
    arsort($keysvalue);
    }
    reset($keysvalue);
    foreach($keysvalue as $key => $vals) {
    $keysort[$key] = $key;
    }
    $new_array = array();
    foreach($keysort as $key => $val) {
    $new_array[$key] = $arr[$val];
    }
    return $new_array;
}

// 获取客户端IP地址
function get_client_ip(){
   if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
       $ip = getenv("HTTP_CLIENT_IP");
   else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
       $ip = getenv("HTTP_X_FORWARDED_FOR");
   else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
       $ip = getenv("REMOTE_ADDR");
   else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
       $ip = $_SERVER['REMOTE_ADDR'];
   else
       $ip = "0.0.0.0";
   return(ip2long($ip));
}


/* End of file common_helper.php */