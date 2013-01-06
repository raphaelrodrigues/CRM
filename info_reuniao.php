<? include('function.php');
	
	fazConexao();
	if( !isset($_GET['id']) ){
		echo "erros";
	
	}
	$idR = $_GET['id'];
	
	$idR = mysql_real_escape_string($idR);
	
	$reuniao = getReuniao( $idR );
	
	if( $reuniao == NULL)
		echo "Erro";
	
	echo $reuniao->toString();
	
	
?>