<div class="container">
<?php foreach($pagecontent as $content){ ?>
			
			<h2>Pagina wijzigen</h2>
			<form method="post" action="#">
			<input value="<?php echo $content['id'] ?>" type="hidden" name="id"></input>
			<label>Pagina:</label>
			<input value="<?php echo $content['page'] ?>" type="text" name="page"></input>
			<br>
			<label>Menu-optie:</label>
			<input value="<?php echo $content['menuoption'] ?>" type="text" name="option"></input>
			<label>Volgorden</label>
			<input type="number" value=<?php echo $content['menuorder'] ?> name="order"></input>
			<br>
			<label>onder</label>
			 <select name="under">
			 <?php
			    $query = "SELECT * FROM `pagecontent.` WHERE pagecontentid = 0 AND menuoption<>''";
				$result = $link->query($query);
				$under = $result->fetch_all(MYSQLI_ASSOC);
				?>
						<option value="0">Niets</option>
					<?php 
					foreach($under as $option){
						if($option['id'] != $id){
							?>	
  						<option  value="<?php echo $option['id']?>"><?php echo $option['menuoption']?></option>
  				<?php
  						}
					}
  				?>
			</select> 
			<br>
			<label>template:(optioneel)</label>
			<input value="template" type="text" name="template"></input>
			<label>Inhoud:</label>
			<textarea type="text" name="content"> <?php echo $content['content'] ?>   </textarea>
			<input class="submit" value="opslaan" type="submit"></input>
			</form>
			<?php 
				}
			?>
			<a href="index.php">annuleren</a>
	</div>