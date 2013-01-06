<? 		include ('function.php');
		
		fazConexao();		
		$idParceria = mysql_real_escape_string($_POST['idParceria']);
		$descricao = mysql_real_escape_string($_POST['add_descricao']);

		$parceria = getReuniao( $idParceria );
		
		if( $reuniao == NULL)
			exit();

		
		$parceria->addDescricao( $descricao );
		
		echo "Inseriu com sucesso";
	?>