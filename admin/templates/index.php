<a href="create.php">Pagina toevoegen</a>
<a href="logic/loguit.php">Afmelden</a>
	<table>
	<?php foreach($pagecontent as $content){ ?>
			<tr>
				<th class="left">Pagina</th>
				<th class="center">Inhoud</th>
				<th class="right">Menu-optie</th>
				<th>Volgorden</th>
				<th>Template</th>
				<th></th>
				<th></th>
				<th>Onder</th>
			</tr>
			<tr>
				<td><?php echo $content['page']?></td>
				<td><?php echo $content['content']?></td>
				<td><?php echo $content['menuoption']?></td>
				<td><?php echo $content['menuorder']?></td>
				<td><?php echo $content['template']?></td>
				<td><a href="delete_confirm.php?id=<?php echo $content['id']?>">Verwijderen</td>
				<td><a href="edit.php?id=<?php echo $content['id']?>">Bewerk</td>
				<td><?php 
				if($content['pagecontentid'] != 0){
				echo $content['pagecontentid'];
				}
				else{
				echo "Niets";
				}
				?></td>
			<?php 
				}
			?>
			</tr>
	</table>