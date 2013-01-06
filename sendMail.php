<?php

	include('Mail.class.php');
	$to = $_POST['to'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	$from = "raphaeljr28@gmail.com";
	$headers = "From:" . $from;
	
	$mail = new Mail($to,$from,$subject,$message);
	$mail->enviar();
	//header("Location: entidade.php");
?>