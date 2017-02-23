<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Theme includes
function cowdev_autoloader($class) {
	if(strpos($class,"BvdB_")===0){
		$class = str_replace('_', '/', $class) . '.php';
		$path = __DIR__.'/inc/'.$class;
		if(file_exists($path)){
			require_once($path);
		}
	}
}
spl_autoload_register('cowdev_autoloader');