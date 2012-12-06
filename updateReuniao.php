<? 
		
		include ('Reuniao.class.php');
		
		$idReuniao = $_POST['idReuniao'];
		$nome = $_POST['nome'];
		$assunto = $_POST['assunto'];
		$data = $_POST['data'];
		$participantes = $_POST['participantes'];
		$objectivo = $_POST['objectivo'];
		$feedback = $_POST['feedback'];
		/*
		$idUtilizador = $_POST['contactoResp'];
		$dataCriacao = $_POST['emailResp'];
		*/
		
		
		
		echo $idReuniao . "<br>";
		
		$data = mysql_real_escape_string($data);
		$data =  strtotime($data);
		$data = date('Y-m-d',$data);

		$op = array(
				'idReuniao' => $idReuniao,
				'nome' => $nome,
				'assunto' => $assunto,
				'data' => $data,
				'participantes' => $participantes,
				'objectivo' => $objectivo,
				'feedback' => $feedback,
				'estado' =>'A'
				/*,
				'contactoResp' => $idUtilizador,
				'emailResp' => $dataCriacao*/
			);
			
		
		validaFormOrganizacao( $op );
		
		
		$reuniao = new Reuniao( $op );
		
		echo $reuniao->getFeedback() . "<br>";
		
		$reuniao->actualiza();
		
		echo $reuniao->getNome() ."  TIPO ";
		
		echo "ACT com sucesso";
	?>