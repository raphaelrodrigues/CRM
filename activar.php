	<? include('function.php');
	
	fazConexao();
	$username = mysql_real_escape_string($_GET['user']);
	
	$a = "dd";
	$user = new User($a,$a,$a,$a,$a);
	$r = $user->activaUtilizador( $username );

	header('Location: painel.php?sucess=1');
	exit();
?>