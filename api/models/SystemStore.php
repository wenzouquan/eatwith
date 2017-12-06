<?php
namespace services\models;
class SystemStore extends  \phpkit\base\baseModel {
    protected $Created;
	public function initialize() {
		parent::initialize();
	}
    public function getCreated(){
        $this->Created = date("Y-m-d H:i:s",$this->Created);
    }

    public function setCreated($v){
        return time();
    }


}
