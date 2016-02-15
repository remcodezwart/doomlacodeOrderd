<?php 
	require('logic/CoreLogic.php');
	loginChek($link);
	if (!isset($_GET['id'])) {
		header("Location:index.php");
	}
	$id = $_GET['id'];
	$pagecontent = getSingleRecord($link);
	if (isset($_POST['id'])) {
		EditLogic($link);
	}
	require('templates/header.php');
	require('templates/edit.php');
	require('templates/footer.php');
?>