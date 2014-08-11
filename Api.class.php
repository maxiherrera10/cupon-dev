<?php
require 'Actions.php';

class Api {

	private $actions;

	public function __construct() {
		$this->actions = array(
			'GET' => array(
				'customers' => new FindAllCustomersAction(),
				'professions' => new FindAllProfessionsAction(),
				'mobileCompanies' => new FindAllMobileCompaniesAction()
			),
			'POST' => array(
				'customers' => new CreateCustomerAction()
			)
		);
	}

	public function execute($method, $resource) {
		return $this->actions[$method][$resource]->execute();
	}
}