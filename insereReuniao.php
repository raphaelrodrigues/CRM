<? 
		
		include ('Reuniao.class.php');
		include ('function.php');
		
		$nomeOrg = $_POST['nome'];
		
		$idOrg = getIdOrg( $nomeOrg );
		
		if( $idOrg == NULL)
			echo "NULL";
		echo $idOrg, "<br>";
		$assunto = $_POST['assunto'];
		$data = $_POST['data'];
		$hora = $_POST['hora'];
		
		$participantes = $_POST['participantes'];
		$objectivo = $_POST['objectivo'];
		$feedback = $_POST['feedback'];
		/*
		$idUtilizador = $_POST['contactoResp'];
		$dataCriacao = $_POST['emailResp'];
		*/
		$timeStamp = $_SERVER['REQUEST_TIME'];
	
		$dateString = date('Y-m-d', $timeStamp  );
		
		echo $nome . "<br>";
		if( $data != ''){
			$data = mysql_real_escape_string($data);
			$data =  strtotime($data);
			$data = date('Y-m-d',$data);
		}
		else
			$data = $dateString;
		
		
		
		echo $dateString , ' ' ,$data,  "<br>";
		$op = array(
				'idOrg' => $idOrg,
				'nomeOrg' => $nomeOrg,
				'assunto' => $assunto,
				'data' => $data,
				'hora' => $hora,
				'participantes' => $participantes,
				'objectivo' => $objectivo,
				'feedback' => $feedback,
				'dataCriacao' => $dateString,
				'estado' => 'A'
				
			);
		
		
		validaFormReuniao( $op );
		
		$reuniao = new Reuniao( $op );
		
		echo $reuniao->getFeedback() . "cenas<br>";
		
		
		//$reuniao->insere();
		
		echo $reuniao->getNome() ."  TIPO ";
		
		echo "Inseriu com sucesso";
	?>