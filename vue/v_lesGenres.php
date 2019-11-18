<!-- page start-->
<div>
	<section class="panel">
		<div class="chat-room-head">
			<h3><i class="fa fa-angle-right"></i> Gérer les genres</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-advance table-hover">
			<thead>
			  <tr class="tableau-entete">
				<th><i class="fa fa-bullhorn"></i> Identifiant</th>
				<th><i class="fa fa-bookmark"></i> Libellé</th>
				<th><i class="fa fa-bookmark"></i> Gérant</th>
				<th><i class="fa fa-bookmark"></i> Nombre de jeux</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			<!-- formulaire pour ajouter un nouveau genre-->
			<tr>
			<form action="index.php?uc=gererGenres" method="post">
				<td>Nouveau</td>
				<td>
					<input type="text" id="txtLibGenre" name="txtLibGenre" size="24" required minlength="4"  maxlength="24"  placeholder="Libellé" title="De 4 à 24 caractères"  />
				</td>
				<td>
					<?php
						afficherListe($tbPersonnes_LA, "lstPersonnes", "1", "");
					?>
				</td>
				<td>
					0
				</td>
				<td> 
					<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouveauGenre" title="Enregistrer nouveau genre"><i class="fa fa-save"></i></button>
					<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>	
				</td>
			</form>
			</tr>
				
			<?php
			foreach ($tbGenres as $genre) { 
			?>
			  <tr>
			  
				<!-- formulaire pour modifier et supprimer les genres-->
				<form action="index.php?uc=gererGenres" method="post">
				<td><?php echo $genre->identifiant; ?><input type="hidden"  name="txtIdGenre" value="<?php echo $genre->identifiant; ?>" /></td>
				<td><?php 
					if ($genre->identifiant != $idGenreModif) {
						echo $genre->libelle;
						?>
						</td>
						<td><?php echo $genre->gerantGenre; ?></td>
						<td><?php echo $genre->nbJeuxGenre; ?></td>
						<td>
							<?php if ($notification != 'rien' && $genre->identifiant == $idGenreNotif) {  
								echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'</button>'; 
							
							} ?>
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierGenre" title="Modifier"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-xs" type="submit" name="cmdAction" value="supprimerGenre" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce genre?');"><i class="fa fa-trash-o "></i></button>
						</td>
					<?php
					}
					else {
						?><input type="text" id="txtLibGenre" name="txtLibGenre" size="24" required minlength="4"  maxlength="24"   value="<?php echo $genre->libelle; ?>" />     
						</td>
						<td>
							<?php
									afficherListe($tbPersonnes_LA, "lstPersonnes", "1", $genre->idGerant);
							?>
						</td>
						<td><?php echo $genre->nbJeuxGenre; ?></td>
						<td>		 
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierGenre" title="Enregistrer"><i class="fa fa-save"></i></button>
							<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>				
							<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierGenre" title="Annuler"><i class="fa fa-undo"></i></button>
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
    </section><!-- fin section genres-->
</div><!--fin div col-sm-6-->

 

<section class="panel">
	<div class="panel-body">
		<!--page start-->
		<div class="row mt">
		  <aside class="col-lg-3 mt">
			<h4><i class="fa fa-angle-right"></i> Evénements à positionner</h4>
			<div id="external-events">
			  <div class="external-event label label-theme">Animation</div>
			  <div class="external-event label label-success">Réunion interne</div>
			  <div class="external-event label label-info">Tournoi</div>
			  <div class="external-event label label-warning">Soirée</div>
			  <div class="external-event label label-danger">Fête</div>
			  <div class="external-event label label-default">Sortie organisée</div>
			  <div class="external-event label label-theme">Séjour</div>
			  <div class="external-event label label-info">Réunion participative</div>
			  <div class="external-event label label-success">Représentation</div>
			  <p class="drop-after">
				<input type="checkbox" id="drop-remove"> Supprimer après déplacement
			  </p>
			</div>
		  </aside>
		  <aside class="col-lg-9 mt">
			<section class="panel">
			  <div class="panel-body">
				<div id="calendar" class="has-toolbar"></div>
			  </div>
			</section>
		  </aside>
		</div>
		<!-- page end-->
	 </div>
	</section>
</div><!--fin div col-sm-6-->
