<? include('Reuniao.class.php');
	
	fazConexao();
	if( !isset($_GET['id']) ){
		header('Location : 404.php');
		exit();
	}
	
	$idR = $_GET['id'];
	
	$idR = mysql_real_escape_string($idR);
	$reuniao = new Reuniao();
	
	$reuniao->remover( $idR );
	
	header('Location: painel.php');
	exit();
?>