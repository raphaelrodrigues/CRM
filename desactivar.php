<? include('User.class.php');
	
	$username = mysql_real_escape_string($_GET['user']);
	
	$user = new User();
	
	$user->desactivaUtilizador( $username );
	error_reporting(E_ALL); 
	ini_set('display_errors', 'On'); 
	header('Location: painel.php?sucess=2');
	exit();
?>