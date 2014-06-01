<?php
require 'Api.class.php';

class Command {

	private $method;
	private $uri;
	private $api;

	public function __construct($method, $uri) {
		$this->method = $method;
		$this->uri = $uri;
		$this->api = new Api();
	}

	public function execute() {
		//$empty is because start on /
		list($empty, $mainPage, $resource, $params) = explode("/", $this->uri, 3);
		return $this->api->execute($this->method, $resource);
	}
}