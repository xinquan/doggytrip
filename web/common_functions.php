<?php
function do_mysqli_connection()
{
	$mysqli = mysqli_init();
	if (!$mysqli) 
		die('mysqli_init failed');

	if (!$mysqli->options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 0')) 
		die('Setting MYSQLI_INIT_COMMAND failed');

	if (!$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) 
		die('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed');

	if (!$mysqli->real_connect('127.0.0.1', 'root', '', 'doggytrip')) 
		die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());


	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	return $mysqli;

}

function do_mysqli_fetch_array($sql)
{
	$mysqli = do_mysqli_connection();
	$result = $mysqli->query($sql);
	$retval = array();

	while($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		$retval[] = $row;
		//print_d($row);

	}
	return $retval;
}

function do_mysqli_update_db($sql)
{
	$mysqli = do_mysqli_connection();
	$result = $mysqli->query($sql);
	return $mysqli->affected_rows;
}

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
