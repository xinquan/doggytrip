<?php
function secureGetParam($param, $method)
{
	//TODO
	return $_GET["$param"];
}
function print_d($var)
{
	$var_info = var_export($var, TRUE);
	error_log($var_info);
}

?>
