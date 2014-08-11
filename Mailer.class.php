<?php
	require ('vendor/PHPMailerAutoload.php');

class Mailer {
	public function send($customer) {

		$fullName = sprintf("%s %s",$customer->name, $customer->surname);
		$subject = sprintf("Registracion de %s al cupon", $fullName);
		$sons = ($customer->sons == 1) ? "Si" : "no";

		$message = '<html><body>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= "<tr><td style='background: #eee;'><strong>Nombre:</strong> </td><td>" . $customer->name . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Apellido:</strong> </td><td>" . $customer->surname . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Email:</strong> </td><td>" . $customer->email . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Fecha de Nacimiento:</strong> </td><td>" . $customer->birthday . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Direccion:</strong> </td><td>" . $customer->address . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>ciudad:</strong> </td><td>" . $customer->city . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Pais:</strong> </td><td>" . $customer->country . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Telefono:</strong> </td><td>" . $customer->phone . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Celular:</strong> </td><td>" . $customer->mobile . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Compania de Celular:</strong> </td><td>" . $customer->mobileCompany->name . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Profesion:</strong> </td><td>" . $customer->profession->name . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Hijos?:</strong> </td><td>" . $sons . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Voucher:</strong> </td><td>" . $customer->voucher . "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";

		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		// smtp.editorialpaginas.com.ar
		// $mail->Mailer = "mail";
		$mail->CharSet = 'UTF-8';
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->Port = 587; //587
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'appedpaginas@gmail.com';                 // SMTP username
		$mail->Password = 'applucas';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

		$mail->From = 'registracion@editorialpaginas.com.ar';
		$mail->FromName = 'Editorial Paginas';
		$mail->addAddress($customer->email, $fullName);     // Add a recipient
		$mail->addBCC('lucasvazquez@gmail.com');
		$mail->addBCC('maxi.herrera10@gmail.com');

		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body    = $message;
		$mail->send();
	}
}
?>