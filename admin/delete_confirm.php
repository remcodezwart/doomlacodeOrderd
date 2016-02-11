<?php 
	require('logic/CoreLogic.php');
	$id = "";
	$id = $_GET['id'];
	loginChek($link);

	if (isset($_POST['id'])) {
		Delete($link);
	}
	else{
	$pagecontent = getSingleRecord($link);
	}

	require('templates/header.php');
	require('templates/remove.php');
	require('templates/footer.php');
?>
