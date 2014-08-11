<?php

class CustomerRepository {

	private $mysqli;

	public function __construct() {
		// $this->mysqli = (new mysqli("localhost", "c8000085_cupon", "baBEwe16so", "c8000085_cupon"));
		$this->mysqli = (new mysqli("localhost", "root", "root", "cupon_dev"));
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
	}

	public function findAll() {
		$result = $this->mysqli->query("SELECT * FROM customer ORDER BY email ASC");
		$data = array();
		while($row = mysqli_fetch_array($result)) {
			$data[] = array(
				'name' => $row['name'],
				'surname' => $row['surname'],
				'email' => $row['email'],
				'birthday' => $row['birthday'],
				'address' => $row['address'],
				'city' => $row['city'],
				'country' => $row['country'],
				'phone' => $row['phone'],
				'mobile' => $row['mobile'],
				'mobile_company_id' => $row['mobile_company_id'],
				'profession_id' => $row['profession_id'],
				'create_date' => $row['create_date'],
				'voucher' => $row['voucher'],
				'sons' => $row['sons']
			);
		}
		return json_encode($data);
	}

	public function findByEmail($email) {
		$query = sprintf("SELECT * FROM customer WHERE email = %s", $email);
		$customer = NULL;
		$result = mysql_query($query);
		while ($customerFound = mysql_fetch_object($result)) {
			$customer->name = $customerFound->name;
			$customer->surname = $customerFound->surname;
			$customer->email = $customerFound->email;
			$customer->birthday = $customerFound->birthday;
			$customer->address = $customerFound->address;
			$customer->city = $customerFound->city;
			$customer->country = $customerFound->country;
			$customer->phone = $customerFound->phone;
			$customer->mobile = $customerFound->mobile;
			$customer->mobileCompany = $customerFound->mobile_company_id;
			$customer->profession = $customerFound->profession_id;
			$customer->sons = $customerFound->sons;
			$customer->voucher = $customerFound->voucher;
		}
		return $customer;
	}

	public function create($customer) {
		$stmt =  $this->mysqli->stmt_init();

		if (!($stmt->prepare("INSERT INTO customer (name, surname, email, 
				birthday, address, city, country, phone, mobile, mobile_company_id, 
				profession_id, create_date, voucher, sons) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))) {
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		$birthday = date('Y-m-d', strtotime($customer->birthday));
		$today = date('Y-m-d H:i:s');

		if (!$stmt->bind_param("sssssssssiisis", $customer->name, $customer->surname, $customer->email, 
			$birthday, $customer->address, $customer->city, $customer->country, $customer->phone, 
			$customer->mobile, $customer->mobileCompany, $customer->profession, $today, $customer->voucher, 
			$customer->sons)) {
			echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
		}

		if (!$stmt->execute()) {
			echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
		}
	}	
}