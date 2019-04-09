<?php
namespace jamowar;
class AutoLoader {

	 static function register(){
        spl_autoload_register(array(__CLASS__, 'downloadClass'));
    }

	static function downloadClass($file) {
 	$file = str_replace('jamowar\\', '',$file);
 	require_once('model/'.lcfirst($file).'.php');
	}

}