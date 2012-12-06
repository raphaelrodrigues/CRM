<?php
	/**
	 * mail.php
	 *
	 *
	 * @author Raphael Rodrigues
	 * @version 1.0
	 */
	
	include('connect.php');
	class Mail{
		private $to ;
		private $from ;
		private $subject;
		private $body;
		private $headers;
		private $mysql;
	
		 function __construct($to,$from,$subject,$body){
			$this->to      = $to;
			$this->from    = $from;
			$this->subject = $subject;
			$this->body    = $body;
			$this->mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
	
		}
		
		
		
		/*
		* Funcao que envia o mail e dps guarda na base de dados
		*/
	
		function enviar(){
			$this->addHeader('From: '.$this->from."\r\n");
			$this->addHeader('Reply-To: '.$this->from."\r\n");
			$this->addHeader('Return-Path: '.$this->from."\r\n");
			$this->addHeader('');
			
			mail($this->to,$this->subject,$this->body,$this->headers);
			
			$this->guardar();
			
			return 0;
		}
		
		
		/*
		* Funcao que guarda o mail na Base de dados.
		*/
		
		function guardar()
		{
			
			$sql = "INSERT INTO `mail`( `idOrg`, `fromM`, `toM`, `subject`, `message`, `date`, `idUser`) VALUES (16,'$this->from','$this->to','$this->subject','$this->message','2011-10-10',18)";
			
			$result = $this->mysql->query($sql);
			
			if (!$result) {
					 die('Invalid query: ' . mysql_error());
					 return -1;
			}
			return 0;
		}
		
		/*
		* Devolve a lista dos mails
		*/
		
		function getMails()
		{
			$result = $this->mysql->query("select * from mail ");
		}
		
		/*
		* Devolve a lista dos mails
		* @params idU -id do Utilizador
		*/
		
		function getMailsByUser( $idU )
		{
			$result = $this->mysql->query("select * from mail where idUser = '$idU' ");
		}
		
		/*
		* Devolve a lista dos mails
		* @params idOrg -id da organizacao
		*/
		
		function getMailsByOrg( $idOrg )
		{
			$result = $this->mysql->query("select * from mail where idOrg = '$idOrg'");
		}
	
		function addHeader($header){
			$this->headers .= $header;
		}
	
	}
?>