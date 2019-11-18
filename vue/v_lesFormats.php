<!-- page start-->
<div class="col-sm-12">
	<section class="panel">
		<div class="chat-room-head">
			<h3><i class="fa fa-angle-right"></i> Gérer les formats</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-advance table-hover">
			<thead>
			  <tr class="tableau-entete">
				<th><i class="fa fa-bullhorn"></i> Identifiant</th>
				<th><i class="fa fa-bookmark"></i> Nom</th>
				<th><i class="fa fa-bookmark"></i> Description</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			<!-- formulaire pour ajouter un nouveau format-->
			<tr>
			<form action="index.php?uc=gererFormats" method="post">
				<td>Nouveau</td>
				<td>
					<input type="text" id="txtLibFormat" name="txtLibFormat" size="32" required minlength="4"  maxlength="40"  placeholder="Nom" title="De 4 à 40 caractères"  />
				</td>
				<td>
					<input type="text" id="txtDescFormat" name="txtDescFormat" size="80" required minlength="4"  maxlength="400"  placeholder="Description" title="De 4 à 400 caractères"  />
				</td>
				<td> 
					<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouveauFormat" title="Enregistrer nouveau format"><i class="fa fa-save"></i></button>
					<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>	
				</td>
			</form>
			</tr>
				
			<?php
			foreach ($tbFormats as $format) {
			?>
			  <tr>
			  
				<!-- formulaire pour modifier et supprimer les formats-->
				<form action="index.php?uc=gererFormats" method="post">
				<td><?php echo $format->identifiant; ?><input type="hidden"  name="txtIdFormat" value="<?php echo $format->identifiant; ?>" /></td>
				<td><?php 
					if ($format->identifiant != $idFormatModif) {
						echo $format->libelle;
						?>
						</td>
						<td>
						<?php 
							echo $format->description;
						?>
						</td>
						<td>
							<?php if ($notification != 'rien' && $format->identifiant == $idFormatNotif) {
								echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'</button>'; 
							
							} ?>
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierFormat" title="Modifier"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-xs" type="submit" name="cmdAction" value="supprimerFormat" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce format?');"><i class="fa fa-trash-o "></i></button>
						</td>
					<?php
					}
					else {
						?><input type="text" id="txtLibFormat" name="txtLibFormat" size="32" required minlength="4"  maxlength="40"   value="<?php echo $format->libelle; ?>" />
						</td>
						<td><input type="text" id="txtDescFormat" name="txtDescFormat" size="80" required minlength="4"  maxlength="400"   value="<?php echo $format->description; ?>" /></td>
						<td>		 
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierFormat" title="Enregistrer"><i class="fa fa-save"></i></button>
							<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>				
							<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierFormat" title="Annuler"><i class="fa fa-undo"></i></button>
						</td>				
					<?php
					}				
					?>
				</form>
				
			  </tr>  
			<?php
			}
			?>
			</tbody>
		  </table>
			  	  
		</div><!-- fin div panel-body-->
    </section><!-- fin section formats-->
</div><!--fin div col-sm-12-->
 
