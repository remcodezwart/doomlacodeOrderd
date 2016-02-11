<?php
//just to be sure on the safety thise loguit logic is in a seperate files
		require "../../config/config.php";
		$username = "";
		$token = 0;
		$expiry = 0;
		if(isset($_COOKIE["User"])){
		$username = $_COOKIE['User'];
		}
			$stmt = $link->prepare("UPDATE user SET  token=?, expiry=? WHERE name=? ");
			$stmt->bind_param("sss", $token, $expiry, $username);
			$stmt->execute();
			if(isset($_COOKIE["Token"])){
		setcookie("Token","",time()-1);
		}
		if(isset($_COOKIE["User"])){
		setcookie("User","",time()-1);
		}
		header("Location:../login.php");
?>