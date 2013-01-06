<? 
		
		include ('Reuniao.class.php');
		
		$idReuniao = mysql_real_escape_string($_POST['idReuniao']);
		$nome = mysql_real_escape_string($_POST['nome']);
		$idOrg = mysql_real_escape_string($_POST['idOrg']);

				
		$assunto = mysql_real_escape_string($_POST['assunto']);
		$data = mysql_real_escape_string($_POST['data']);
		$hora = mysql_real_escape_string($_POST['hora']);
		
		$participantes = mysql_real_escape_string($_POST['participantes']);
		$objectivo = mysql_real_escape_string($_POST['objectivo']);
		$feedback = mysql_real_escape_string($_POST['feedback']);
		/*
		$idUtilizador = $_POST['contactoResp'];
		$dataCriacao = $_POST['emailResp'];
		*/
		
		
		
		//echo $idReuniao . "<br>";
		
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
			
		
		//validaFormOrganizacao( $op );
		
		
		$reuniao = new Reuniao( $op );
		
				
		 $r = $reuniao->actualiza();
		
		
		
		if( $r == -1) 
		{
			header("Location: editReuniao.php?id='$idReuniao'");
		}
		else
		{
			header("Location: entidade.php?id=$idOrg&sucess=1");
		}
		
		
	?>