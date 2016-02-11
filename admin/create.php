<?php
	require('logic/CoreLogic.php');

	loginChek($link);
	if (isset($_POST['header'])) {
		createRecord($link);
	}


	$under = getOptions($link);

	require('templates/header.php');
	require('templates/add.php');
	require('templates/footer.php');
?>
