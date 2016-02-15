<div class="container">
			<h2>Pagina toevoegen</h2>
			<form method="post" action="#">
			<label>Pagina:</label>
			<input type="text" name="header">
			<br>
			<label>Menu-optie:</label>
			<input type="text" name="option">
			<label>Volgorden</label>
			<input type="number" name="order">
			<br>
			<label>onder</label>
			 <select name="under">

			 <?php
			   //function get options				?>
						<option value="0">Niets</option>
					<?php 
					foreach($under as $option){
						?>
  						<option value="<?php echo $option['id']?>"><?php echo $option['menuoption']?></option>
  				<?php
					}
  				?>
			</select> 
			<br>

			<label>template:(optioneel)</label>
			<input value="template" type="text" name="template">
			<label>Inhoud:</label>
			<textarea name="page"></textarea>
			<input class="submit" value="opslaan" type="submit">
			</form>
			<a href="index.php">annuleren</a>
	</div>