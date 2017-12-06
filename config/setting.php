<?php
$setting = array(
	'appDir' => phpkitRoot,
	'appBaseUri'=>'phpkit-admin',
    'cacheDir'=>wwwRoot.'/cache/',
    'viewsDir'=>phpkitRoot."/views/",
    'registerNamespaces' => array(
		'services' => wwwRoot . '/services', //服务层目录
		//'services\\models' => wwwRoot . '/services/models', //Model层实现目录
	),
	'adminUrl'=>'http://www.eatwith.me/phpkit-admin',
	'asstesUrl'=>'http://www.eatwith.me/phpkit-admin/asstes'
);

$setting['di'] = require wwwRoot."/config/di.php";
return $setting;