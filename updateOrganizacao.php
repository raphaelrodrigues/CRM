<? 

		include ('Organizacao.class.php');
		
		$idOrg = $_POST['idOrg'];
		echo $idOrg;
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
				'idOrg' => $idOrg,
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
		
		$org = new Organizacao( $op );
		$org->print1();
	
		$org->actualiza();
		
		
		echo $org->getNome() ."  TIPO ".$org->getTipo();
		
		echo "Inseriu com sucesso";
	?>