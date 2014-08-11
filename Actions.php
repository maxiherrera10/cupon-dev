<?php
require 'CustomerRepository.class.php';
require 'ProfessionRepository.class.php';
require 'MobileCompanyRepository.class.php';
require 'Customer.class.php';

interface Action {
	public function execute();
};

class FindAllCustomersAction implements Action {

	private $customerRepository;

	public function __construct() {
		$this->customerRepository = new CustomerRepository();
	}

	public function execute() {
		return $this->customerRepository->findAll();
	}
};

class CreateCustomerAction implements Action {

	private $customerRepository;
	private $professionRepository;
	private $mobileCompanyRepository;

	public function __construct() {
		$this->customerRepository = new CustomerRepository();
		$this->mobileCompanyRepository = new MobileCompanyRepository();
		$this->professionRepository = new ProfessionRepository();
	}

	public function execute() {
		$email = $_POST["email"];
		$customer = $this->customerRepository->findByEmail($email);
		//create a new customer
		if (is_null($customer)) {
			$voucher = rand(00000, 99999);
			$customer = new Customer($_POST["name"], $_POST["surname"],
			$email, $_POST["birthday"], $_POST["address"],
			$_POST["city"], $_POST["country"], $_POST["phone"],
			$_POST["mobile"], $_POST["mobileCompany"],
			$_POST["profession"], $_POST["createDate"],
			$voucher, $_POST["sons"]);
			$this->customerRepository->create($customer);
		}
		$customer->profession = $this->professionRepository->findById($customer->profession);
		$customer->mobileCompany = $this->mobileCompanyRepository->findById($customer->mobileCompany);
		$mailer = new Mailer();
		$mailer->send($customer);
		return $customer->voucher;
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