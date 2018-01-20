<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 将整数转换到指定的区间
 * $num:需转换的整数
 * $min:最小值
 * $max:最大值
*/
function to_limit_lng($num, $min, $max=0){
	$num 	= (int)($num);
	$min	= (int)($min);
	$max	= (int)($max);

	if ($num < $min){
		return $min;
	}

	if ($max > 0 && $num > $max){
		return $max;
	}
	return $num;
}

/*
 * 分页函数
 * $page : 当前页
 * $record_count : 总记录数
 * $page_size : 每页记录数
*/

function page($page_url, $record_count, $page_size, $page){
	if( ! $page_url){
		$page_url = $_SERVER['PHP_SELF'] . "?";
	}else{
		if(stripos($page_url, "?") === false){
			$page_url .= "?";
		}else{
			if (substr($page_url, -1) != "&") $page_url .= "&";
		}
	}

	if( ! $record_count) return;

	$page_size	= to_limit_lng($page_size, 1, "");
	$page_count = ceil($record_count / $page_size);
	$page		= to_limit_lng($page, 1, $page_count);

	$page_str  	= "共 <font color='red'>". $record_count ."</font> 条&nbsp;&nbsp;( <font color='red'>" . $page . "</font> / " . $page_count . " )&nbsp;&nbsp;";

	if($page == 1){
		$page_str	.= "<a href='javascript:;' class='page'>首页</a>&nbsp;&nbsp;";
		$page_str	.= "<a href='javascript:;' class='page'>上一页</a>&nbsp;&nbsp;";
	}else{
		$page_str	.= "<a href='" . $page_url . "page=1' class='page'>首页</a>&nbsp;&nbsp";
		$page_str	.= "<a href='" . $page_url . "page=" . ($page-1) . "' class='page'>上一页</a>&nbsp;&nbsp";
	}

	if ($page == $page_count){
		$page_str	.= "<a href='javascript:;' class='page'>下一页</a>&nbsp;&nbsp;";
		$page_str	.= "<a href='javascript:;' class='page'>末页</a>&nbsp;&nbsp;";
	}else{
		$page_str	.= "<a href='" . $page_url . "page=" . ($page+1) . "' class='page'>下一页</a>&nbsp;&nbsp;";
		$page_str	.= "<a href='" . $page_url . "page=$page_count' class='page'>末页</a>&nbsp;&nbsp;";
	}

	$page_str	.= '<input type="text" name="page" value="" size="4" class="inputText1" />';
	$page_str	.= '<input type="button" value="Go" class="tMiddle" onclick="location.href=\''. $page_url . 'page=' . '\' + this.previousSibling.value;" />';
	return $page_str;
}

function page1($page_url, $record_count, $page_size, $page){
	if( ! $page_url){
		$page_url = $_SERVER['PHP_SELF'] . "?";
	}else{
		if(stripos($page_url, "?") === false){
			$page_url .= "?";
		}else{
			if (substr($page_url, -1) != "&") $page_url .= "&";
		}
	}

	if( ! $record_count) return;

	$page_size	= to_limit_lng($page_size, 1, "");
	$page_count = ceil($record_count / $page_size);
	$page		= to_limit_lng($page, 1, $page_count);

	$page_str  	= "共 <font color='red'>". $record_count ."</font> 条&nbsp;&nbsp;( <font color='red'>" . $page . "</font> / " . $page_count . " )&nbsp;&nbsp;";

	if($page == 1){
		$page_str	.= "<a href='javascript:;' class='page'>首页</a>&nbsp;&nbsp;";
		$page_str	.= "<a href='javascript:;' class='page'>上一页</a>&nbsp;&nbsp;";
	}else{
		$page_str	.= "<a href='" . $page_url . "page=1' class='page'>首页</a>&nbsp;&nbsp";
		$page_str	.= "<a href='" . $page_url . "page=" . ($page-1) . "' class='page'>上一页</a>&nbsp;&nbsp";
	}

	if ($page == $page_count){
		$page_str	.= "<a href='javascript:;' class='page'>下一页</a>&nbsp;&nbsp;";
		$page_str	.= "<a href='javascript:;' class='page'>末页</a>&nbsp;&nbsp;";
	}else{
		$page_str	.= "<a href='" . $page_url . "page=" . ($page+1) . "' class='page'>下一页</a>&nbsp;&nbsp;";
		$page_str	.= "<a href='" . $page_url . "page=$page_count' class='page'>末页</a>&nbsp;&nbsp;";
	}

	$page_str .= "<select name='page' onchange=\"window.location=this.options[this.selectedIndex].value\">\n";
	for ($i = 1; $i <= $page_count; $i++){
		$URL = $page_url . "page=$i";
		if ($page == $i){
			$page_str .= "<option value='$i' selected>$i</option>\n";
		}else{
			$page_str .= "<option value=\"$URL\">$i</option>\n";
		}
	}
	$page_str .= "</select>";

	return $page_str;
}


function page2($page_url, $record_count, $page_size, $page){
	if (!$page_url){
		$page_url = $_SERVER['PHP_SELF'] . "?";
	}else{
		if (stripos($page_url, "?") === false){
			$page_url .= "?";
		}else{
			if (substr($page_url, -1) != "&") $page_url .= "&";
		}
	}

	$pre_page = "page=" . ($page+1) ;
	$next_page = "page=" . ($page-1) ;

	if (!$record_count) return;

	$page_size	= to_limit_lng($page_size, 1, "");
	$page_count = ceil($record_count / $page_size);
	$page		= to_limit_lng($page, 1, $page_count);
	$page_str = '';

	$count	= 10;	//显示页码数
	$i 		= ($page-(int)($count/2) > 0) ? ($page-(int)($count/2)) : 1;	//起始页码
	$count 	= ($i + $count < $page_count) ? ($i + $count) : $page_count;	//终止页码

	$page_str .= "<p>显示页数 ".$i."—".$count."（共".$page_count."页）</p>";

	$page_str .= "<ul>";

	//上一页
	if ($page == 1){
		$page_str .= '<li style="width: 11%;"><a href="javascript:;" class="btn prev">上一页</a></li>';
	}else{
		$page_str .= '<li style="width: 11%;"><a href="'.$page_url.$next_page.'" class="btn prev">上一页</a></li>';
	}

	$page_str .= '<li class="page_num" style="width: 81%;">';

	while($i<=$count){
		if ($i == $page){
			$page_str 	.= "<a href='". $page_url ."page=" . $i . "' class='active'>" . $i . "</a>";
		}else{
			$page_str 	.= "<a href='". $page_url ."page=" . $i . "'>" . $i . "</a>";
		}

		$i++;
	}

	if($page < $record_count-10){
		$page_str .= '<span>…</span>';
	}

	$page_str .= '</li><li style="width: 8%;">';
	
	//后一页
	if ($page == $page_count){
		$page_str .= '<a href="javascript:;" class="btn next">下一页</a>';
	}else{
		$page_str .= '<a href="'. $page_url . $pre_page.'" class="btn next">下一页</a>';
	}

	$page_str .= "</li></ul>";

	return $page_str;
}

//Fckeditor编辑器的内容分页
function page_content($page_url, $page_count, $page){
	$page_count = (int)($page_count);
	if($page_count < 2){
		return;
	}

	$page = toLimitLng($page, 1, $page_count);
	$page_str = "";

	//上一页
	if ($page == 1) {
		$page_str .= "<a href='javascript:;'>上一页</a>";
	} else {
		$page_str .= "<a href='" . $page_url . "?p=" . ($page-1) . "'>上一页</a>";
	}

	$i	= 1;//起始页码
	while($i <= $page_count){
		if ($i == $page) {
			$page_str .= "<a href='". $page_url ."?p=" . $i . "' class='cur'>" . $i . "</a>";
		} else {
			$page_str .= "<a href='". $page_url ."?p=" . $i . "'>" . $i . "</a>";
		}
		$i++;
	}

	//后一页
	if ($page == $page_count) {
		$page_str .= "<a href='javascript:;'>下一页</a>";
	} else {
		$page_str .= "<a href='" . $page_url . "?p=" . ($page+1) . "'>下一页</a>";
	}

	return $page_str;
}

/* End of file page_helper.php */