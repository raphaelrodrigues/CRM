<? 
	require_once ('Organizacao.class.php');
	
	if ( !isset($_GET['q']) )
		exit;
	else
		$nif = $_GET['q'];
	
	$org = new Organizacao();
	
	$org->setNif( $nif);
	
	//echo "nif ",$org->getNif()," ";
	
	if ( $org->verificaNif() == 1)
		echo "Este NIF ja existe";
	else
		echo "Correcto";
	
	flush();
?>