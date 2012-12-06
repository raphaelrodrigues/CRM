<? 

		include ('Organizacao.class.php');
		include ('function.php');
		
		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$cidade = $_POST['cidade'];
		$email = $_POST['email'];
		$nif = $_POST['nif'];
		$nomeResp = $_POST['nomeResp'];
		$contactoResp = $_POST['contactoResp'];
		$emailResp = $_POST['emailResp'];
		$sectorActividade = $_POST['sectorActividade'];
		$descricao = $_POST['descricao'];
		
		
		
		$op=array(
				'nome' => $nome,
				'cidade' => $cidade,
				'telefone' => $telefone,
				'email' => $email,
				'nif' => $nif,
				'nomeResp' => $nomeResp,
				'contactoResp' => $contactoResp,
				'emailResp' => $emailResp,
				'sectorActividade' => $sectorActividade,
				'descricao' => $descricao
			);
		
		validaFormOrganizacao( $op );
		
		$org = new Organizacao( $op );
		//$org->print1();
		
	
		//$org->insere();
		
		
		//echo $org->getNome() ."  TIPO ".$org->getTipo();
		
		echo "Inseriu com sucesso";
	?>