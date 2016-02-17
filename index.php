<?php
	
	require "logic/coreLogic.php";
	
	$template = "template.php";
	$content = "erorr page not found";
	
	$page = isset($_GET['page'])? $_GET['page']: "home";

	$PageContent = menu($link,$page);

	$submenu = getModule($page);

	require "templates/header.php"; 
	require "templates/content.php";
	require "templates/footer.php"; 
?>