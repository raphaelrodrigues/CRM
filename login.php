<?php 
	// Inclui o arquivo com a classe de login
	
	require_once("function.php");
	fazConexao();
	
	if(!$_POST['user'] | !$_POST['pass']) {
		header("Location:login_page.php?error=3");
 		//die('You did not fill in a required field.');

 	}
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	//echo $user;
	
	// To protect MySQL injection
	$user = stripslashes($user);
	$pass = stripslashes($pass);
	$user = mysql_real_escape_string($user);
	$pass = mysql_real_escape_string($pass);
	// Se o campo "lembrar" não existir, o script funcionará normalmente
	//$lembrar = (isset($_POST['lembrar']) AND !empty($_POST['lembrar']));
	
	$userClass = new User('','','','','');
	$l = $userClass->login($user , $pass, 1);
	
	if( $l == 0)
		header("Location:dashboard.php");
	else{
		if( $l == -1){ 
			//erro pass ou user errados
			header("Location:login_page.php?error=2");
		}
		else
		{
			//conta em espera
			header("Location:login_page.php?error=3");
		}
	}
?>