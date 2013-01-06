<? include('function.php');
	
	$username = $_POST['username'];
	$passActual = $_POST['passActual'];
	$newPassword1 = $_POST['pass1'];
	$newPassword2 = $_POST['pass2'];
	
	
	
	$username = mysql_real_escape_string($username);
	
	$user = getUtilizador($username);
	
	//echo $username," cens " ,$passActual;
	
	if( $user == NULL)
		header("Location: 404.php ");
	
	if( $user->mudaPassword( $username, $passActual, $newPassword1, $newPassword2) == 0)
	{
		$location = "profile.php?sucess=1";
	}
	else
	{
		$location = "profile.php?sucess=0";
	}
	
	
	error_reporting(E_ALL); 
	ini_set('display_errors', 'On'); 
	header("Location: ". $location ."");
	exit();
	
?>