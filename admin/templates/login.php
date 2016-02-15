	<h1>Aanmelden</h1>
	
		<form method="post" action="#">
			<label>Gebruiker:</label>
			<span class="marginUser"></span><input type="text" class="login" placeholder="gebruikersnaam" name="user"><!--input in html has no end tag-->
			<br>
			<label>Wachtwoord:</label>
			<input type="password" class="login" name="password" placeholder="wachtwoord"><!--input in html has no end tag-->
			<br>
			<input type="submit" class="confirm" value="Aanmelden"><!--input in html has no end tag-->
		</form>
		<p><?php if(isset($erorr)) echo $erorr ?></p>