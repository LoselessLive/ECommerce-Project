<?php

header("Content-type: application/javascript; charset=UTF-8"); 
header("Cache-Control: must-revalidate");
$offset = 60 * 60 * 24 * 3;
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
header($ExpStr);

function compress($buffer) {
	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	$buffer = preg_replace('/\/\/(.*)/','',$buffer);
	$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
	return $buffer;
} 

if ( ! isset($_GET['app']) || ( isset($_GET['main']) && $_GET['main'] == TRUE ))
{
	// Static Import
	echo file_get_contents('jquery.1.9.0.js')."\r\n";
	echo file_get_contents('jquery.migrate.1.0.0.js')."\r\n";
	echo file_get_contents('jquery-ui.1.9.2.js');
	echo file_get_contents('jquery.bootstrap.js');
	echo file_get_contents('jquery.custom.js');
	echo file_get_contents('redactor.min.js');
	echo file_get_contents('squard.js');
	echo file_get_contents('equal_heights.js');
	echo file_get_contents('file-browser.js');
	echo file_get_contents('coin-slider.js');
	
}
else
{
	// Dynamic import
	if ( ! isset($_GET['page']))
	{
		echo @file_get_contents('app/' . $_GET['app'] . '.js');
	}
	else
	{
		echo @file_get_contents('app/' . $_GET['app'] . '.' . $_GET['page'] . '.js');
	}
}

?>