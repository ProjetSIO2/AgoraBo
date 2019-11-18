<!-- page start-->
<div class="col-12">
	<section class="panel">
		<div class="chat-room-head">
			<h3><i class="fa fa-angle-right"></i> Gérer les jeux vidéo</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-advance table-hover">
			<thead>
				<tr class="tableau-entete">
					<th><i class="fa fa-bullhorn"></i> Reference</th>
					<th><i class="fa fa-bookmark"></i> Plateforme</th>
					<th><i class="fa fa-bookmark"></i> Pegi</th>
					<th><i class="fa fa-bookmark"></i> Genre</th>
					<th><i class="fa fa-bookmark"></i> Marque</th>
					<th><i class="fa fa-bookmark"></i> Nom</th>
					<th><i class="fa fa-bookmark"></i> Prix</th>
					<th><i class="fa fa-bookmark"></i> Date parution</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php
			//require_once '_forms.inc.php';
				?>
				<!-- formulaire pour ajouter un nouveau jeu vidéo-->
				<tr>
				<form action="index.php?uc=gererJeuxVideo" method="post">
					<td>
						<input type="text" id="txtRefJeu" name="txtRefJeu" size="16" required minlength="4"  maxlength="16"  placeholder="Nouveau / Référence" title="De 4 à 16 caractères"  />
					</td>
					<td>
						<?php
							afficherListe($tbPlateformes, "lstPlateformes", "1", "");
						?>
					</td>
					<td>
						<?php
							afficherListe($tbPegis, "lstPegis", "1", "");
						?>
					</td>
					<td>
						<?php
							afficherListe($tbGenres, "lstGenres", "1", "");
						?>
					</td>
					<td>
						<?php
							afficherListe($tbMarques, "lstMarques", "1", "");
						?>
					</td>
					<td>
						<input type="text" id="txtNom" name="txtNom" size="24" required minlength="1"  maxlength="50"  placeholder="Nom" title="De 1 à 50 caractères"  />
					</td>
					<td>
						<input type="text" id="txtPrix" name="txtPrix" size="24" required minlength="1"  maxlength="5"  placeholder="Prix" title="De 1 à 5 caractères"  />
					</td>
					<td>
						<input type="date" id="txtDateParution" name="txtDateParution" />
					</td>
					<td> 
						<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouveauJeuVideo" title="Enregistrer nouveau jeu vidéo"><i class="fa fa-save"></i></button>
						<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>	
					</td>
				</form>
				</tr>
				<?php
				foreach ($tbJeuxVideo as $jeuVideo) { 
				?>
				  <tr>
				  
					<!-- formulaire pour modifier et supprimer les jeux vidéo-->
					<form action="index.php?uc=gererJeuxVideo" method="post">
					<td><?php echo $jeuVideo->reference; ?><input type="hidden"  name="txtRefJeu" value="<?php echo $jeuVideo->reference; ?>" /></td>
					<td><?php 
						if ($jeuVideo->reference != $refJeuModif) {
							echo $jeuVideo->libPlateforme; ?></td>
							<td><?php echo $jeuVideo->libPegi; ?></td>
							<td><?php echo $jeuVideo->libGenre; ?></td>
							<td><?php echo $jeuVideo->libMarque; ?></td>
							<td><?php echo $jeuVideo->nom; ?></td>
							<td><?php echo $jeuVideo->prix; ?></td>
							<td><?php echo $jeuVideo->dateP; ?></td>
							<td>
								<?php if ($notification != 'rien' && $jeuVideo->reference == $refJeuNotif) {  
									echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'</button>'; 
								
								} ?>
								<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierJeuVideo" title="Modifier"><i class="fa fa-pencil"></i></button>
								<button class="btn btn-danger btn-xs" type="submit" name="cmdAction" value="supprimerJeuVideo" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer ce jeu vidéo ?');"><i class="fa fa-trash-o "></i></button>
							</td>
						<?php
						}
						else {
							afficherListe($tbPlateformes, "lstPlateformes", "1", $jeuVideo->idPlateforme);
							?>
							</td>
							<td>
								<?php
									afficherListe($tbPegis, "lstPegis", "1", $jeuVideo->idPegi);
								?>
							</td>
							<td>
								<?php
									afficherListe($tbGenres, "lstGenres", "1", $jeuVideo->idGenre);
								?>
							</td>
							<td>
								<?php
									afficherListe($tbMarques, "lstMarques", "1", $jeuVideo->idMarque);
								?>
							</td>
							<td>
								<input type="text" id="txtNom" name="txtNom" size="24" required minlength="1"  maxlength="50"  value="<?php echo $jeuVideo->nom; ?>"  />
							</td>
							<td>
								<input type="text" id="txtPrix" name="txtPrix" size="24" required minlength="1"  maxlength="5"  value="<?php echo $jeuVideo->prix; ?>"  />
							</td>
							<td>
								<input type="date" id="txtDateParution" name="txtDateParution" value="<?php echo $jeuVideo->dateP; ?>" />
							</td>
							<td>		 
								<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierJeuVideo" title="Enregistrer"><i class="fa fa-save"></i></button>
								<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>				
								<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierJeuVideo" title="Annuler"><i class="fa fa-undo"></i></button>
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
    </section><!-- fin section jeux_videos-->
</div><!--fin div "col-12">

