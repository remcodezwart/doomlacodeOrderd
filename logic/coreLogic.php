<?php
	require('config/config.php');
// gets the data out of the database for the page 
//makes the menu bar D
function menu($link,$page){
	//if the page is not found the value of the variables makes an erorr page while still making the menu
	$PageContent = array();
	$title = "Error";
	$contents = "Error page not found!";
	$chek = "layout";
	$menu = "<ul>";
	$query = "SELECT * FROM `pagecontent.` WHERE pagecontentid = 0 AND menuoption<>'' ORDER BY menuorder";
	$result = $link->query($query);
	$pagecontent = $result->fetch_all(MYSQLI_ASSOC);
			foreach($pagecontent as $content){		
				$submenus = getSubmenu($link, $content['id']);
					if($page == $content['page']){
							$contents = $content['content'];
							$title = $content['page'];
							$chek = $content['template'];
							$menu .= "\n<li class=\"active\"><a href=\"?page=$content[page]\">$content[menuoption]</a>";
						}else{
							$menu .= "\n<li><a href=\"?page=$content[page]\">$content[menuoption]</a>";
					}
				if ($submenus != null) {
					$menu .= "<ul class=\"submenu\">";	
						foreach ($submenus as $submenu) {
							if($page == $submenu['page']){
								$contents = $submenu['content'];
								$title = $submenu['page'];
								$chek = $submenu['template'];
								$menu .= "\n<li class=\"active\"><a href=\"?page=$submenu[page]\">$submenu[menuoption]</a></li>";
							}
							else{
								$menu .= "\n<li><a href=\"?page=$submenu[page]\">$submenu[menuoption]</a></li>";
							}
						}
					$menu .= "</ul>";
					continue;
				}
					$menu .= "</li>";
			}
				$menu .= "</ul>";	
				$PageContent = array($contents,$title,$chek,$menu);
				return $PageContent;
}
// makes a submenu if there is one D
function getSubmenu ($link ,$id) {
	$stmt = $link->prepare("SELECT * FROM `pagecontent.` WHERE pagecontentid = ?");
	$stmt->bind_param("s", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$submenus = $result->fetch_all(MYSQLI_ASSOC);
	return $submenus;
}
//returns $contents for display D
function getContent($PageContent){
		return  $PageContent['0'];		
}
//returns $menu for menu D
function getMenu($PageContent){
		return $PageContent['3'];
}
//returns $title for title D
function getTitle($PageContent){
		return  $PageContent['1'];	
}
//returns the css file to be used
function getTemplate($PageContent){
		return  $PageContent['2'];
}
//gets the aside info D
function getModule($page){
		$subMenu = "";
		$link = new mysqli('localhost','root','','doomla');
		$stmt = $link->prepare("SELECT * FROM `pagecontent.` WHERE page=?");
		$stmt->bind_param("s", $page);
		$stmt->execute();
		
		$result = $stmt->get_result();
		$Menu = $result->fetch_all(MYSQLI_ASSOC);

		foreach($Menu as $content){
			$subMenu = $content['content'];
		}
		return $subMenu;
	}

?>