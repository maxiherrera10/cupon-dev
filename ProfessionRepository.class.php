<?php

class ProfessionRepository {

	private $mysqli;

	public function __construct() {
		$this->mysqli = (new mysqli("localhost", "root", "root", "cupon_dev"));
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
	}

	public function findAll() {
		$result = $this->mysqli->query("SELECT * FROM profession ORDER BY id ASC");
		$data = array();
		while($row = mysqli_fetch_array($result)) {
			$data[] = array(
				'name' => $row['name'],
				'id' => $row['id']
			);
		}
		return json_encode($data);
	}	
}