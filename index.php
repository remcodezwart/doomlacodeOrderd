<?php
	require "logic/coreLogic.php";
	$PageContent = array();
	$page = "home";
	$template = "template.php";
	$content = "erorr page not found";
	$id = 1;
	$submenu = "";
	$pageid = 0;
	$contents = "";
	$pagesub = 0;
	$page = isset($_GET['page'])? $_GET['page']: "home";
	$PageContent = menu($link,$page,$PageContent);
	$submenu = getModule($page);
	getContent($PageContent);
	getMenu($PageContent);
	getTitle($PageContent);
	getTemplate($PageContent);




	require "templates/header.php"; 
	require "templates/content.php";
	require "templates/footer.php"; 
?>