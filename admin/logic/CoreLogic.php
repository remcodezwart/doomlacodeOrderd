<?php
	require('../config/config.php');
//gets the data to build an option menu for add.php and edit.php
   function getOptions($link){
  				$query = "SELECT * FROM `pagecontent.` WHERE pagecontentid = 0 AND menuoption<>''";
				$result = $link->query($query);
				$under = $result->fetch_all(MYSQLI_ASSOC);
				return $under;
	}
	//gets the data for the edit page so that it can display the information the user wants to edit 
	function getSingleRecord($link){
		$id = $_GET['id'];
		$stmt = $link->prepare("SELECT * FROM `pagecontent.` WHERE id=?");
		$stmt->bind_param("s", $id);
		$stmt->execute();
		$result = $stmt->get_result();
		$pagecontent = $result->fetch_all(MYSQLI_ASSOC);
		return $pagecontent;
	}
	//creates a new record
	function createRecord($link){
		$h1 = "<h1>"; //the header of the page ends up here
		$h1end = "</h1>";
		$pagragraphe = "<p>"; //the content of the page ends up here
		$pagragrapheEnd = "</p>";
		$template = "template.php";
		$template = $_POST['template'];
		$order = $_POST['order'];
		$header = $_POST['header'];
		$headerPage = $_POST['header'];
		$page = $_POST['page'];
		$h1 .= $header .= $h1end;
		$pagragraphe .= $page .=$pagragrapheEnd;
		$h1 .= $pagragraphe;
		$option = $_POST['option'];
		$under = $_POST['under'];
		$stmt = $link->prepare("INSERT INTO `pagecontent.` (`page`,`content`,`menuoption`,`menuorder`,`template`,`pagecontentid`)
		VALUES(?,?,?,?,?,?)");
		$stmt->bind_param("ssssss", $headerPage,$h1,$option,$order,$template,$under);
		$stmt->execute();
		//header('Location: index.php');
	}
	//Deletes a single record
	function Delete($link){
		$id = "";
		$id = $_POST['id'];
		$stmt = $link->prepare("DELETE FROM `pagecontent.` WHERE id=?");
		$stmt->bind_param("s", $id);
		$stmt->execute();
		header('Location: index.php');
	}
	//logic for editing a single record
	function EditLogic($link){
			$id = "";
			$id = $_POST['id'];
			$content = $_POST['content'];
			$page = $_POST['page'];
			$menu = $_POST['option'];
			$order = $_POST['order'];
			$template = $_POST['template'];
			$under = $_POST['under'];
			$stmt = $link->prepare("UPDATE `pagecontent.` SET page=?,content=?,menuoption=?,menuorder=?,template=?,pagecontentid=? WHERE id=?") ;
			$stmt->bind_param("sssssss", $page,$content,$menu,$order,$template,$under,$id);
			$stmt->execute();
			header('Location: index.php');
	}
	//gets the data to display it
	function getData($link){
		$query = "SELECT * FROM `pagecontent.`";
		$result = $link->query($query);
		$pagecontent = $result->fetch_all(MYSQLI_ASSOC);
		return $pagecontent;
	}
	//if the user enters a valide coombination of username and password then the user gets acces to the admmin pages D
	function setSession($username,$link,$login){
		$token = (rand(1,9999999));
		$token = (string)$token;
		$expiring = time() + 600;
		setcookie("Token", $token, $expiring);
		setcookie("User", $username, $expiring);
		$username="jan";
		$stmt = $link->prepare("UPDATE user SET  token=?, expiry=? WHERE name=? ");
		$stmt->bind_param("sss", $token, $expiring, $username);
		$stmt->execute();
		if ($login == "Login in") {
			header("Location:index.php");
		}
	}
	//logs the user in if the password and username combination are valid D 
	function login($link){
		$login = "Login in";
		if($link->connect_error){
			die("Connection failed: " . $link->connect_error);
		}	
		$username = "";
		$password = "";
		if(isset($_POST['user'])){
			$username = $_POST['user'];
		}
		if(isset($_POST['password'])){
			$password = $_POST['password'];
		}
		if(!($password != "" || $username != "")){
			$erorr = "paswoord of usernaam leeg";
		}
		else{
		$query = "SELECT * FROM user ";
		$result = $link->query($query);
		$pagecontent = $result->fetch_all(MYSQLI_ASSOC);
			foreach($pagecontent as $cheking){
				if($username == $cheking['name'] && $password == $cheking['password']){
					setSession($username,$link,$login);
				}
			}
			$erorr = "foute gebruikersnaam of wachtwoord";
			
			}
		}
	//cheks if the user is login if true then they can proceed if not there send to the login page
	function loginChek($link){
			 $username  = "";
			 getAccessUsername();
			 checkAccess($link);
		}
	function checkAccess($link){
		$login = "";
		 $username = getAccessUsername();
		 setSession($username,$link,$login);
	}
	function Chek($username){
		$token = (rand(1,9999999));
		$token = (string)$token;
		$expiring = time() + 600;
		setcookie("Token", $token, $expiring);
		setcookie("User", $username, $expiring);
		$username="jan";
		$stmt = $link->prepare("UPDATE user SET  token=?, expiry=? WHERE name=? ");
		$stmt->bind_param("sss", $token, $expiring, $username);
		$stmt->execute();
		$link->close();
	}
	function getAccessUsername(){
		$link = new mysqli('localhost','root','','doomla');
	if(count($_COOKIE) <= 0){
		header("Location:login.php");
	}
	if($_COOKIE["User"] && $_COOKIE["Token"]){
			$user = "User";
			$Token = "Token";
			$query = "SELECT * FROM user ";
			$result = $link->query($query);
			$pagecontent = $result->fetch_all(MYSQLI_ASSOC);	
		foreach($pagecontent as $cheking){
			$now = time();
					if($_COOKIE[$user] == $cheking['name'] 
					&& $_COOKIE[$Token] == $cheking['token']
					&& $now < $cheking['expiry']);
					{	
						$username  = $_COOKIE[$user];
						return $username;
					}	
			}
			header("Location:login.php");
		}
		header("Location:login.php");
	}
	
	//end of loginChek function
?>