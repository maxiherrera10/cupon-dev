<?php

class User {

	public $name;
	public $surname;
	public $email;
	public $birthday;
	public $address;
	public $city;
	public $country;
	public $phone;
	public $mobile;
	public $mobileCompany;
	public $profession;
	public $createDate;
	public $voucher;
	public $sons;

	public function __construct($name, $surname, $email,
		$birthday, $address, $city, $country, $phone,
		$mobile, $mobileCompany, $profession, 
		$createDate, $voucher, $sons) {
		$this->name = $name;
		$this->surname = $surname;
		$this->email = $email;
		$this->birthday = $birthday;
		$this->address = $address;
		$this->city = $city;
		$this->country = $country;
		$this->phone = $phone;
		$this->mobile = $mobile;
		$this->mobileCompany = $mobileCompany;
		$this->profession = $profession;
		$this->createDate = $createDate;
		$this->voucher = $voucher;
		$this->sons = $sons;
	}

}