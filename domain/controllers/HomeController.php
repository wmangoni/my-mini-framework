<?php
class HomeController {

	private $title;

	public function init() {
		echo "Estou na home";
	}

	public function outro($fulano = null) {
		if (is_null($fulano)) {
			echo "boaaa - rapaiz";
		} else {
			echo "boaaa - " . $fulano;
		}
	}
}