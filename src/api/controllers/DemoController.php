<?php

use Phalcon\Mvc\Controller;

class DemoController extends  BaseController{

	 public function IndexAction() {

	 	 // $service = new \services\controllers\HiService();
	 	 // var_dump($service->say());

	 	 // $model = new \services\models\SystemStore();
	 	 // var_dump($model->load(140));
	 	$service = $this->di['services']->get('demo.Hi');
	 	var_dump($service->say());

	 	// $model = $this->di['services']->getModel('SystemStore');
	 	// var_dump($model->load(140));

	}

	public function TestAction(){
		 echo 123;
	}


}
