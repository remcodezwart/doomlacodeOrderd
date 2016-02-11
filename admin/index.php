<?php 
	require('logic/CoreLogic.php');
	loginChek($link);
	$pagecontent = getData($link);
	$link->close();
	require('templates/header.php');
	require('templates/index.php');
	require('templates/footer.php');
?>