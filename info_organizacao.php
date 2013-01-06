<? include('function.php');
	
	fazConexao();
	
	if( !isset($_GET['id']) ){
		echo "erros";
	
	}
	$idO = $_GET['id'];
	
	$idO = mysql_real_escape_string($idO);
	
	$org = getOrganizacao( $idO );
	
	if( $org == NULL)
		echo "Erro";
	
	echo $org->toString();
	
	
?>