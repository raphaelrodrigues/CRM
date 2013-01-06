<? 		include ('function.php');
		
		fazConexao();		
		$idReuniao = mysql_real_escape_string($_POST['idReuniao']);
		$feedback = mysql_real_escape_string($_POST['add_feedback']);

		$reuniao = getReuniao( $idReuniao );
		
		if( $reuniao == NULL)
			exit();

		
		$reuniao->addFeedback( $feedback );
		
		echo "Inseriu com sucesso";
	?>