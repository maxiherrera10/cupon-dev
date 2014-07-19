<?php

class UserRepository {

	private $mysqli;

	public function __construct() {
		$this->mysqli = (new mysqli("localhost", "root", "root", "cupon_dev"));
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
	}

	public function findAll() {
		$result = $this->mysqli->query("SELECT * FROM user ORDER BY email ASC");
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
		$query = 'SELECT * FROM user WHERE email = "'.$email.'";';
		$result = $this->mysqli->query($query);
		$data = array();
		while($row = mysqli_fetch_array($result)) {
			$data[] = array(
				'voucher' => $row['voucher']
			);
		}
		return $data[0]['voucher'];
	}

	public function create($user) {
		$stmt =  $this->mysqli->stmt_init();

		if (!($stmt->prepare("INSERT INTO user (name, surname, email, 
				birthday, address, city, country, phone, mobile, mobile_company_id, 
				profession_id, create_date, voucher, sons) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)"))) {
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		$birthday = date('Y-m-d', strtotime($user->birthday));
		$today = date('Y-m-d H:i:s');
		/* Sentencia preparada, etapa 2: vinculación*/
		if (!$stmt->bind_param("sssssssssiisis", $user->name, $user->surname, $user->email, 
			$birthday, $user->address, $user->city, $user->country, $user->phone, 
			$user->mobile, $user->mobileCompany, $user->profession, $today, $user->voucher, 
			$user->sons)) {
			echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
		}

		// Sentencia preparada, etapa 3: ejecucion 
		if (!$stmt->execute()) {
			echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
		}
	}	
}