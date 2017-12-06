<?php

use Phalcon\Mvc\Controller;

class IndexController extends  \phpkit\base\baseController {

	 public function IndexAction() {

	 	  $service = new \services\demo\Hi();
	 	  var_dump($service->say());

	 	 $model = new \services\demo\models\SystemStore();
	 	 var_dump($model->load(140));
	 	// $service = $this->di['services']->get('Hi');
	 	// var_dump($service->say());

	 	// $model = $this->di['services']->getModel('SystemStore');
	 	//  var_dump($model->load(140));

	}

	public function TestAction(){
		 echo 123;
	}


}
