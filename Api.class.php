<?php
require 'Actions.php';

class Api {

	private $actions;

	public function __construct() {
		$this->actions = array(
			'GET' => array(
				'users' => new FindAllUsersAction(),
				'professions' => new FindAllProfessionsAction(),
				'mobileCompanies' => new FindAllMobileCompaniesAction()
			),
			'POST' => array(
				'users' => new CreateUserAction()
			)
		);
	}

	public function execute($method, $resource) {
		return $this->actions[$method][$resource]->execute();
	}
}