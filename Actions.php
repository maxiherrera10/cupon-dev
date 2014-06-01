<?php
require 'UserRepository.class.php';
require 'ProfessionRepository.class.php';
require 'MobileCompanyRepository.class.php';
require 'User.class.php';

interface Action {
	public function execute();
};

class FindAllUsersAction implements Action {

	private $userRepository;

	public function __construct() {
		$this->userRepository = new UserRepository();
	}

	public function execute() {
		return $this->userRepository->findAll();
	}
};

class CreateUserAction implements Action {

	private $userRepository;

	public function __construct() {
		$this->userRepository = new UserRepository();
	}

	public function execute() {
		$voucher = rand(00000, 99999);
		$user = new User($_POST["name"], $_POST["surname"],
			$_POST["email"], $_POST["birthday"], $_POST["address"],
			$_POST["city"], $_POST["country"], $_POST["phone"],
			$_POST["mobile"], $_POST["mobileCompany"],
			$_POST["profession"], $_POST["createDate"],
			$voucher);
		$this->userRepository->create($user);
		return $voucher;
	}
};

class FindAllProfessionsAction implements Action {

	private $professionRepository;

	public function __construct() {
		$this->professionRepository = new ProfessionRepository();
	}

	public function execute() {
		return $this->professionRepository->findAll();
	}
};

class FindAllMobileCompaniesAction implements Action {

	private $mobileCompanyRepository;

	public function __construct() {
		$this->mobileCompanyRepository = new MobileCompanyRepository();
	}

	public function execute() {
		return $this->mobileCompanyRepository->findAll();
	}
};