<?php

namespace services\demo;

class Hi extends  \services\Base {

	 public function say() {
	 	  $model = new models\SystemStore();
	 	  var_dump($model->load(140)->store_name);

	 	  $data= $model->where(array('store_name'=>'你好1'))->load();
	 	  var_dump("model -> find");
	 	  var_dump($data->store_id);

	 	   $data= $model->where("store_id like '%你好%'")->select();
	 	    var_dump("model -> find in ");
	 	  var_dump($data);
		 return  'hi , winn';
	}


}
