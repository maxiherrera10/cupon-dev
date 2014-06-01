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
				'voucher' => $row['voucher']
			);
		}
		return json_encode($data);
	}

	// public function findByEmail($email) {
	// 	$stmt = $mysqli->prepare("SELECT * FROM user  WHERE user = ?");	

	// 	if (!$stmt->bind_param("s", $email) {
	// 		echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
	// 	}

	// 	// Sentencia preparada, etapa 3: ejecucion 
	// 	if (!$stmt->execute()) {
	// 		echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
	// 	}

	// 	$data = $stmt->get_result()->fetch_assoc();

	// 	return json_encode($data);
	// }

	public function create($user) {
		/* Prepared statement, stage 1: prepare 
		surname, email, birthday, address, city, country, phone, mobile_id, profession_id, 
		create_date, voucher */

		$stmt =  $this->mysqli->stmt_init();

		if (!($stmt->prepare("INSERT INTO user (name, surname, email, 
				birthday, address, city, country, phone, mobile, mobile_company_id, 
				profession_id, create_date, voucher) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)"))) {
			echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}

		$today = date('Y-m-d H:i:s');

		/* Sentencia preparada, etapa 2: vinculación*/
		if (!$stmt->bind_param("sssssssssiisi", $user->name, $user->surname, $user->email, 
			$today, $user->address, $user->city, $user->country, $user->phone, $user->mobile, 
			$user->mobileCompany, $user->profession, $today, $user->voucher)) {
			echo "Falló la vinculación de parámetros: (" . $stmt->errno . ") " . $stmt->error;
		}

		// Sentencia preparada, etapa 3: ejecucion 
		if (!$stmt->execute()) {
			echo "Falló la ejecución: (" . $stmt->errno . ") " . $stmt->error;
		}
	}	
}