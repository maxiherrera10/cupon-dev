<?php

class MobileCompanyRepository {

	// private $mysqli;

	public function __construct() {
		// Conectando, seleccionando la base de datos
		$mysqli = mysql_connect('localhost', 'root', 'root') or die('No se pudo conectar: ' . mysql_error());
		// $this->mysqli = $link;
		// $this->mysqli = (new mysqli("localhost", "root", "root", "cupon_dev"));
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		// echo 'Connected successfully';
		mysql_select_db('cupon_dev') or die('No se pudo seleccionar la base de datos');
	}

	public function findAll() {
		// Realizar una consulta MySQL
		$query = "SELECT * FROM mobile_company ORDER BY name ASC";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		// $result = $this->mysqli->query("SELECT * FROM mobile_company ORDER BY name ASC");
		$data = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$data[] = array(
				'name' => $row['name'],
				'id' => $row['id']
			);
		}
		return json_encode($data);
	}	
}