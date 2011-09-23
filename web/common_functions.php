<?php
function secureGetParam($param, $method = NULL)
{
	//TODO
	if('GET'==$method)
	{
		return $_GET["$param"];
	}else if ('POST' == $method)
	{
		return $_POST["$param"];
	}else if (NULL == $methog)
	{
		$ret = $_GET[$param];
		if(!empty($_POST[$param]))
			$ret = $_POST[$param];
		return $ret;

	}
}
function print_d($varvalue, $varname = NULL)
{
	echo "<pre>";
	if(!empty($varname))
		echo "dumping $varname:";
	print_r($varvalue);
	echo "</pre>";
}

?>
