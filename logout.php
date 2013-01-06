<?
	/**
	* The logout file
	* destroys the session
	* expires the cookie
	* redirects to login.php
	*/
	include('User.class.php');
	
	$user = new User('','','','','');
	
	$user->logout();
	
	/*
	session_start();
	session_destroy();
	setcookie('username', '', time() - 1*24*60*60);
	setcookie('password', '', time() - 1*24*60*60);
	header("location: login_page.php");
	*/
?>