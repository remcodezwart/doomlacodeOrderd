<h1>Pagina verwijderen</h1>
	<p>weet u zeker dat u onderstaande pagina wilt verwijderen?</p>
	<form method="post" action="#" class="submitting">
	<input type="hidden" name="id" value="<?php echo $id ?>"></input>
	<input class="submit"  type="submit" value="Ja"></input>
	</form>
	<form action="index.php" class="submitting">
	<input class="submit"  type="submit" value="Nee"></input>
	</form>
	<br>
	<?php foreach($pagecontent as $content){ ?>
	<label>Pagina:<?php echo $content['page']?></label>
	<br>
	<label>Menu-optie <?php echo $content['menuoption']?></label>
	<br>
	<label>Inhoud:</label><?php echo $content['content'];
				};
		?>