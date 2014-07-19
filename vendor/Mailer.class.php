<?php
	require ('vendor/PHPMailerAutoload.php');

class Mailer {
	public function send($user) {

		$fullName = $user->name + " " + $user->surname;

		$message = '<html><body>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message .= "<tr><td style='background: #eee;'><strong>Nombre:</strong> </td><td>" . $user->name . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Apellido:</strong> </td><td>" . $user->surname . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Email:</strong> </td><td>" . $user->email . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Fecha de Nacimiento:</strong> </td><td>" . $user->birthday . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Direccion:</strong> </td><td>" . $user->address . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>ciudad:</strong> </td><td>" . $user->city . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Pais:</strong> </td><td>" . $user->country . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Telefono:</strong> </td><td>" . $user->phone . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Celular:</strong> </td><td>" . $user->mobile . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Compania de Celular:</strong> </td><td>" . $user->mobileCompany . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Profesion:</strong> </td><td>" . $user->profession . "</td></tr>";
		$message .= "<tr><td style='background: #eee;'><strong>Voucher:</strong> </td><td>" . $user->voucher . "</td></tr>";
		$message .= "</table>";
		$message .= "</body></html>";

		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		// smtp.editorialpaginas.com.ar
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->Port = 465;
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'maxi.herrera10@gmail.com';                 // SMTP username
		$mail->Password = 'M@x11901';                           // SMTP password
		$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted

		$mail->From = 'registracion@editorialpaginas.com.ar';
		$mail->FromName = 'Registracion';
		$mail->addAddress($user->email, $fullName);     // Add a recipient
		$mail->addBCC('lucasvazquez@gmail.com');
		$mail->addBCC('maxi.herrera10@gmail.com');

		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Registracion de ' . $fullName . ' al cupon';
		$mail->Body    = $message;
		$mail->send();
	}
}
?>