<? 
	require_once ('Organizacao.class.php');
	
	if ( !isset($_GET['q']) )
		exit;
	else
		$nomeOrg = $_GET['q'];
	
	$org = new Organizacao('');
	
	$org->setNome( $nomeOrg);
	
	
	if ( $org->verificaNome() != 1)
		echo "Organização não existe";
	else
		echo "";
	
	flush();
?>