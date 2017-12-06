<?php
namespace phpkit\dict;
class Dict {
	function __construct($param = array()) {
		$this->model = new models\SystemDict();
	}

	function get($name) {
		$dict = $this->model->load($name);
		$value = $dict->value;
		return $value;
	}

	function set($name, $value, $remark = "") {
		$row = array(
			'name' => $name,
			'value' => $value,
			'remark' => $remark,
			'addtime' => time(),
		);
		if ($this->model->save($row) == false) {
			foreach ($model->getMessages() as $message) {
				$messages[] = $message;
			}
			if (is_array($messages)) {
				$msg = implode(",", $messages);
			}
			$this->errorMsg = $msg;
			return false;

		} else {
			return true;
		}
	}

	function delete($name) {
		return $this->model->remove($name);
	}
}
