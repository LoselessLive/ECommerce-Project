<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * CodeIgniter Inflector Helpers
 *
 * Customised singular and plural helpers.
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team, stensi
 * @link		http://codeigniter.com/user_guide/helpers/inflector_helper.html
 */

// --------------------------------------------------------------------

/**
 * get_style
 *
 * @access	public
 * @param	string
 * @return	str
 */
if ( ! function_exists('get_style'))
{	
	function get_style($app = FALSE, $page = FALSE)
	{
		if ( $app && $page )
		{
			return '<link href="'. base_url() .'static/css/style.php?app='. $app .'&amp;page='. $page .'" rel="stylesheet">';	
		}
		elseif ( $app )
		{
			return '<link href="'. base_url() .'static/css/style.php?app='. $app .'" rel="stylesheet">';	
		}
		else
		{
			return '<link href="'. base_url() .'static/css/style.php" rel="stylesheet">';	
		}
	}
}

// --------------------------------------------------------------------

/**
 * get_style
 *
 * @access	public
 * @param	string
 * @return	str
 */
if ( ! function_exists('get_js'))
{	
	function get_js($app = FALSE, $page = FALSE)
	{
		if ( $app && $page )
		{
			return '<script src="'. base_url() .'static/js/javascript.php?app='. $app .'&page='. $page .'"></script>';	
		}
		elseif ( $app )
		{
			return '<script src="'. base_url() .'static/js/javascript.php?app='. $app .'"></script>';	
		}
		else
		{
			return '<script src="'. base_url() .'static/js/javascript.php"></script>';	
		}
	}
}

function load_script($path)
{
	return '<script type="text/javascript" src="/'.$path.'"></script>';
}