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

function smarty_function_assign_wrapper($params, &$smarty){
	if(isset($params['var']) && isset($params['val']) ){
		$smarty->assign($params['var'], $params['val']);
	}
}
/* vim: set expandtab: */

?>
