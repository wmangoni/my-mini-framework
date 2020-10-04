<?php
require_once('constants.php');

class Framework {

	private $pathExplode;
	private $fileName;
	private $method;

	public function __construct() {
		$this->pathExplode = explode("/", $_SERVER['REQUEST_URI']);
	}

	public function getPathsFromUri($route) {
		
		if (!$this->pathExplode[2]) {
			throw new Exception(NOT_FOUND, 1);
		}

		if (sizeof($this->pathExplode) < 3) {
			throw new Exception(NOT_FOUND, 1);
		}

		if (!array_key_exists($this->pathExplode[2], $route)) {
		    throw new Exception(NOT_FOUND, 1);
		}
		

		$this->fileName = $route[$this->pathExplode[2]];

		$this->method = $this->pathExplode[3] ?? 'init';
	}

	public function checkClass() {
		if (!class_exists($this->fileName)) {
		    throw new Exception(NOT_FOUND, 1);
		}
	}

	public function checkMethod() {
		if (!method_exists($this->fileName, $this->method)) {
			throw new Exception(NOT_FOUND, 1);
		}
	}

	public function getPathExplode() {
		return $this->pathExplode;
	}

	public function getFileName() {
		return $this->fileName;
	}

	public function getMethod() {
		return $this->method;
	}


}