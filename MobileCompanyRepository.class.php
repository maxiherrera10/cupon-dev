<?php

class MobileCompanyRepository {

	// private $mysqli;

	public function __construct() {
		// Conectando, seleccionando la base de datos
		// $mysqli = mysql_connect("localhost", "c8000085_cupon", "baBEwe16so") or die('No se pudo conectar: ' . mysql_error());
		$mysqli = mysql_connect('localhost', 'root', 'root') or die('No se pudo conectar: ' . mysql_error());
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		// echo 'Connected successfully';
		mysql_select_db('cupon_dev') or die('No se pudo seleccionar la base de datos');
		// mysql_select_db('c8000085_cupon') or die('No se pudo seleccionar la base de datos');
	}

	public function findAll() {
		// Realizar una consulta MySQL
		$query = "SELECT * FROM mobile_company ORDER BY name ASC";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$data = array();
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$data[] = array(
				'name' => $row['name'],
				'id' => $row['id']
			);
		}
		return json_encode($data);
	}

	public function findById($id) {
		$query = sprintf("SELECT * FROM mobile_company WHERE id = %d", $id);
		$mobileCompany = NULL;
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		while ($mobileCompanyFound = mysql_fetch_object($result)) {
			$mobileCompany = $mobileCompanyFound;
		}
		return $mobileCompany;
	}
}