<?php 
	// Inclui o arquivo com a classe de login
	
	require_once("function.php");
	
	fazConexao();
	if (isset($_POST['submit'])) { 
	
		if (!$_POST['user'] | !$_POST['pass'] | !$_POST['pass-confirm'] | !$_POST['email'] | !$_POST['nome']) {
	
			die('You did not complete all of the required fields');
	
		}
		
		
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$pass2 = $_POST['pass-confirm'];
		
		$nome = mysql_real_escape_string( stripslashes($nome) );
		$user = mysql_real_escape_string( stripslashes($user) );
		$email = mysql_real_escape_string( stripslashes($email) );
		$pass = mysql_real_escape_string( stripslashes($pass) );
		$pass2 = mysql_real_escape_string( stripslashes($pass2) );
		
		$timeStamp = $_SERVER['REQUEST_TIME'];
		$dateString = date('Y-m-d', $timeStamp  );
		
		
		
		//user(user,pass,email,nome)
		$user = new User($user,$pass,$email,$nome,$dateString);
		
		$r = $user->novoUtilizador();
		echo "cenas" , $r;
		if( $r == 0)
			echo "deu";
		else
			echo "nao deu";
			
		$user->getErros();
		
	}
	
?>

 <h1>Registered</h1>

 <p>Thank you, you have registered - you may now login</a>.</p>