<?php

header("Content-type: text/css; charset=UTF-8"); 
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

if ( ! isset($_GET['app']) || ( isset($_GET['main']) && $_GET['main'] == TRUE ) )
{
	// Static Import
	echo file_get_contents("bootstrap.css");
	echo file_get_contents("bootstrap-responsive.css");
	echo file_get_contents("bootstrap.custom.css");
	echo file_get_contents("font-face.css");
	echo file_get_contents("custom.css");
	echo file_get_contents("jquery.ui.css");
	echo file_get_contents("file-browser.css");
	echo file_get_contents("redactor.css");
	echo file_get_contents("font-awesome.css");
	echo file_get_contents("font-awesome-ie7.min.css");
	echo file_get_contents("coin-slider-styles.css");
	
}

if ( isset($_GET['app']) )
{
	// Dynamic import
	if ( ! isset($_GET['page']))
	{
		echo @file_get_contents('app/' . $_GET['app'] . '.css');
	}
	else
	{
		echo @file_get_contents('app/' . $_GET['app'] . '.' . $_GET['page'] . '.css');
	}
}

?>