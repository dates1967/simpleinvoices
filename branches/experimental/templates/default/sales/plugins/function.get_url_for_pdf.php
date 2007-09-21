<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {assign} function plugin
 *
 * Type:     function<br>
 * Name:     assign<br>
 * Purpose:  assign wrapper for the template<br>
 * @author Yo :)
 * @param array unused in this plugin, this plugin uses {@link Smarty::$_config},
 *              {@link Smarty::$_tpl_vars} and {@link Smarty::$_smarty_debug_info}
 * @param Smarty
 */

function smarty_function_get_url_for_pdf($params, &$smarty){
	if(isset($params['item']) && isset($params['output']) && isset($params['current_pdf'])) {
		$id = $params['item']['id'];
		$out = $params['current_pdf'] . $id;
		//echo urldecode($out);
		$smarty->assign($params['output'], $out);
	}
}
/* vim: set expandtab: */

?>
