<? 
	require_once ('User.class.php');
	if ( !isset($_GET['q']) )
		exit;
	else
		$user = $_GET['q'];
	
	$userClass = new User('','','','','');
	
	
	
	//echo "nif ",$org->getNif()," ";
	
	if ( $userClass->verificaUsername($user) == 1)
		echo "Este username já existe";
	else
		echo "Username disponível";
	
	flush();
?>