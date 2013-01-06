<? include('function.php');
	
	fazConexao();
	if( !isset($_GET['id']) ){
		echo "erros";
	
	}
	$idR = $_GET['id'];
	
	$idR = mysql_real_escape_string($idR);
	
	$parceria = getParceria( $idR );
	
	if( $parceria == NULL)
		echo "Erro";
	
	echo $parceria->toString();
	
	
?>