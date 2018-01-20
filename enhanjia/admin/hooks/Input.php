<?php

//过滤字符串
function cleanArrayForMysql($data)
{
	if(!get_magic_quotes_gpc())
		return (is_array($data))?array_map('cleanArrayForMysql', $data):mysql_real_escape_string($data);
	else
		return $data;
}

?>