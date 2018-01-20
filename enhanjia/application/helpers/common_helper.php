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
 *  HTML转换为文本
 *
 * @param    string  $str 需要转换的字符串
 * @param    string  $r   如果$r=0直接返回内容,否则需要使用反斜线引用字符串
 * @return   string
 * @param    WC
 */
if (!function_exists('html2text')){
    function html2text($str,$r=0){
        if(!function_exists('sphtml2text')){
        	
        }
        if($r==0){
            return sphtml2text($str);
        }else{
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
    @header("Cache-Control: no-cache, must-revalidate");  
    @header("Pragma: no-cache");  
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

/*
 * 将整数转换到指定的区间
 * $num:需转换的整数
 * $min:最小值
 * $max:最大值
*/
function toLimitLng($num, $min, $max=0){
    $num = (int)($num);
    $min = (int)($min);
    $max = (int)($max);

    if ($num < $min){
        return $min;
    }

    if ($max > 0 && $num > $max){
        return $max;
    }
    return $num;
}

/*
 * 对字符串过滤xss
 * $val:需要过滤的内容
*/
function RemoveXSS($val) { 
    // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed 
    // this prevents some character re-spacing such as <java\0script> 
    // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some          // inputs 
    $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val); 
    
    // straight replacements, the user should never need these since they're normal characters 
    // this prevents like <IMG SRC=@avascript:alert('XSS')> 
    $search = 'abcdefghijklmnopqrstuvwxyz'; 
    $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $search .= '1234567890!@#$%^&*()'; 
    $search .= '~`";:?+/={}[]-_|\'\\'; 
    for ($i = 0; $i < strlen($search); $i++) { 
        // ;? matches the ;, which is optional 
        // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars 

        // @ @ search for the hex values 
        $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val);//with a ; 
        // @ @ 0{0,7} matches '0' zero to seven times 
        $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ; 
    } 

    // now the only remaining whitespace attacks are \t, \n, and \r 
    $ra1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'base'); 
    $ra2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload'); 
    $ra = array_merge($ra1, $ra2); 
   
    $found = true; // keep replacing as long as the previous round replaced something 
    while ($found == true) { 
        $val_before = $val; 
        for ($i = 0; $i < sizeof($ra); $i++) { 
            $pattern = '/'; 
            for ($j = 0; $j < strlen($ra[$i]); $j++) { 
                if ($j > 0) { 
                    $pattern .= '('; 
                    $pattern .= '(&#[xX]0{0,8}([9ab]);)'; 
                    $pattern .= '|'; 
                    $pattern .= '|(&#0{0,8}([9|10|13]);)'; 
                    $pattern .= ')*'; 
                } 
                $pattern .= $ra[$i][$j]; 
            } 
            $pattern .= '/i'; 
            $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag 
            $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags 
            if ($val_before == $val) { 
                // no replacements were made, so exit the loop 
                $found = false; 
            } 
        } 
    } 
    return $val; 
}

/*截取中英文字串*/
function sys_substr($str, $strcount, $isellipsis){
    if($strcount>0){
        if(!$isellipsis)
            return cnSubstr( $str,0,$strcount-1 );
        elseif($isellipsis && cnStrLen($str)>$strcount)
            return cnSubstr( $str,0,$strcount-1 )."...";
        else 
            return $str; //保留完整标
    }else{
        return $str; 
    }
}

/*
 * 截取字符数
 * $str:字符串
 * $start:起始位置
 * $lenth:多少字符
*/
function cnSubStr($str, $start, $lenth){
    $len = strlen($str);
    $r = array();
    $n = 0;
    $m = 0;
    for($i = 0; $i < $len; $i++) {
        $x = substr($str, $i, 1);
        $a = base_convert(ord($x), 10, 2);
        $a = substr('00000000'.$a, -8);
        if ($n < $start){
            if (substr($a, 0, 1) == 0) {
            }elseif (substr($a, 0, 3) == 110) {
                $i += 1;
            }elseif (substr($a, 0, 4) == 1110) {
                $i += 2;
            }
            $n++;
        }else{
            if (substr($a, 0, 1) == 0) {
                $r[] = substr($str, $i, 1);
            }elseif (substr($a, 0, 3) == 110) {
                $r[] = substr($str, $i, 2);
                $i += 1;
            }elseif (substr($a, 0, 4) == 1110) {
                $r[] = substr($str, $i, 3);
                $i += 2;
            }else{
                $r[] = '';
            }
            if (++$m >= $lenth){
                break;
            }
        }
    }
    return join('', $r);
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
 * 安全过滤函数
 *
 * @param $string
 * @return string
 */
if ( ! function_exists('safe_replace'))
{
    function safe_replace($string) {
        $string = str_replace('%20','',$string);
        $string = str_replace('%27','',$string);
        $string = str_replace('%2527','',$string);
        $string = str_replace('*','',$string);
        $string = str_replace('"','&quot;',$string);
        $string = str_replace("'",'',$string);
        $string = str_replace('"','',$string);
        $string = str_replace(';','',$string);
        $string = str_replace('<','&lt;',$string);
        $string = str_replace('>','&gt;',$string);
        $string = str_replace("{",'',$string);
        $string = str_replace('}','',$string);
        $string = str_replace('\\','',$string);
        $string = remove_xss($string);
        return $string;
    }
}
/**
 * xss过滤函数
 *
 * @param $string
 * @return string
 */
if ( ! function_exists('remove_xss'))
{
    function remove_xss($string) { 
        $string = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S', '', $string);
    
        $parm1 = Array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'base');
    
        $parm2 = Array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
    
        $parm = array_merge($parm1, $parm2); 
    
        for ($i = 0; $i < sizeof($parm); $i++) { 
            $pattern = '/'; 
            for ($j = 0; $j < strlen($parm[$i]); $j++) { 
                if ($j > 0) { 
                    $pattern .= '('; 
                    $pattern .= '(&#[x|X]0([9][a][b]);?)?'; 
                    $pattern .= '|(&#0([9][10][13]);?)?'; 
                    $pattern .= ')?'; 
                }
                $pattern .= $parm[$i][$j]; 
            }
            $pattern .= '/i';
            $string = preg_replace($pattern, '', $string); 
        }
        return $string;
    }
}
/**
 * 生成sql语句，如果传入$in_cloumn 生成格式为 IN('a', 'b', 'c')
 * @param $data 条件数组或者字符串
 * @param $front 连接符
 * @param $in_column 字段名称
 * @return string
 */
function to_sqls($data, $front = ' AND ', $in_column = false) {
    if($in_column && is_array($data)) {
        $ids = '\''.implode('\',\'', $data).'\'';
        $sql = "$in_column IN ($ids)";
        return $sql;
    } else {
        if ($front == '') {
            $front = ' AND ';
        }
        if(is_array($data) && count($data) > 0) {
            $sql = '';
            foreach ($data as $key => $val) {
                $sql .= $sql ? " $front `$key` = '$val' " : " `$key` = '$val' ";
            }
            return $sql;
        } else {
            return $data;
        }
    }
}

/**
 * 返回经addslashes处理过的字符串或数组
 * @param $string 需要处理的字符串或数组
 * @return mixed
 */
function new_addslashes($string){
    if(!is_array($string)) return addslashes($string);
    foreach($string as $key => $val) $string[$key] = new_addslashes($val);
    return $string;
}

/**
 * 返回经stripslashes处理过的字符串或数组
 * @param $string 需要处理的字符串或数组
 * @return mixed
 */
function new_stripslashes($string) {
    if(!is_array($string)) return stripslashes($string);
    foreach($string as $key => $val) $string[$key] = new_stripslashes($val);
    return $string;
}

/**
 * 返回经htmlspecialchars处理过的字符串或数组
 * @param $obj 需要处理的字符串或数组
 * @return mixed
 */
function new_html_special_chars($string) {
    $encoding = 'utf-8';
    if(strtolower(CHARSET)=='gbk') $encoding = 'ISO-8859-15';
    if(!is_array($string)) return htmlspecialchars($string,ENT_QUOTES,$encoding);
    foreach($string as $key => $val) $string[$key] = new_html_special_chars($val);
    return $string;
}

/**
 * 生成随机字符串
 */
function getRandChar($length){
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $max = strlen($strPol)-1;

    for($i=0;$i<$length;$i++){
        $str .= $strPol[rand(0,$max)];
    }

    return $str;
}

/* End of file common_helper.php */