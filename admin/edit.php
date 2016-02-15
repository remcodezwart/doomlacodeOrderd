<?php 
	require('logic/CoreLogic.php');

	loginChek($link);
	$id = $_GET['id'];
	$pagecontent = getSingleRecord($link);
	if (isset($_POST['id'])) {
		EditLogic($link);
	}
	require('templates/header.php');
	require('templates/edit.php');
	require('templates/footer.php');
?>