<?php
/**
 * Created by PhpStorm.
 * User: onsakuquan
 * Date: 17/8/25
 * Time: 下午5:07
 */

//数据库结构缓存,默认apc
 $di['modelsMetadata'] = function () {
      \phpkit\helper\mk_dir(wwwRoot . '/cache/metadata/');
     $metaData = new \Phalcon\Mvc\Model\Metadata\Files([
         "metaDataDir" => wwwRoot . '/cache/metadata/',
     ]);
     return $metaData;
 };
            

//配置读取类
$di['config'] = function () {
    $params = array(
        'configDir' => wwwRoot . '/config/',
    );
    $config = new \phpkit\config\Config($params);
    return $config;
};

//数据库
$di['db'] = function () {
    $params = array(
        'configDir' => wwwRoot . '/config/',
    );
    $config = new \phpkit\config\Config($params);
    $DbConfig = $config->get("database");
    return new \Phalcon\Db\Adapter\Pdo\Mysql($DbConfig);
};

//缓存注入
// $di['cache'] = function () {
//     return new \phpkit\redis\Redis(array(
//         "prefix" => 'project-name-data-cache-',
//         'host' => '127.0.0.1',
//         'port' => 6379,
//         'persistent' => true,
//     ));
// };
$di['cache'] = function () {
    $frontCache = new \Phalcon\Cache\Frontend\Data(array(
        "lifetime" => 0,
    ));
    $cacheDir = wwwRoot . '/cache/data/';
    \phpkit\helper\mk_dir($cacheDir);
   return new \Phalcon\Cache\Backend\File($frontCache, array(
        "cacheDir" => $cacheDir,
    ));
};


//注入日志服务
$di['logger']=function(){
    $params = require wwwRoot."/config/log.php";
    $logger = new \phpkit\aliyunLogger\Logger($params);
    return $logger;
};

//服务调用
$di['services']=function(){
    class services{
       public function getController($name){
          $controllers = "\\services\\controllers\\{$name}";
          if(class_exists($controllers)){
            return  new $controllers();
          }else{
             throw new \Exception("Error class_no_exists:".$controllers, 1);      
          }
       }
       public function getModel($name){
          $model = "\\services\\models\\{$name}";
          if(class_exists($model)){
            return new $model();
          }else{
            throw new \Exception("Error class_no_exists:".$model, 1);     
          }
       }

    }
    return new services();
};


return $di;