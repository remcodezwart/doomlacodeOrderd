<?php
require('logic/CoreLogic.php');
if ($_POST != null) {
	login($link,$_POST['user'],$_POST['password']);
}

require('templates/header.php');
require('templates/login.php');
require('templates/footer.php');
?>