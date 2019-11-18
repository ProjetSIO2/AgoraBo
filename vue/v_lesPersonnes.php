<!-- page start-->
<div class="col-12">
	<section class="panel">
		<div class="chat-room-head">
			<h3><i class="fa fa-angle-right"></i> Gérer les personnes</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-advance table-hover">
			<thead>
			  <tr class="tableau-entete">
                  <th><i class="fa fa-bullhorn"></i> Identifiant</th>
                  <th><i class="fa fa-bookmark"></i> Nom</th>
                  <th><i class="fa fa-bookmark"></i> Prénom</th>
                  <th><i class="fa fa-bookmark"></i> Adresse mail</th>
                  <th><i class="fa fa-bookmark"></i> Téléphone</th>
                  <th><i class="fa fa-bookmark"></i> Rue</th>
                  <th><i class="fa fa-bookmark"></i> Ville</th>
                  <th><i class="fa fa-bookmark"></i> Code postal</th>
                  <th></th>
			  </tr>
			</thead>
			<tbody>
			<!-- formulaire pour ajouter une nouvelle personne-->
			<tr>
			<form action="index.php?uc=gererPersonnes" method="post">
				<td>Nouveau</td>
				<td>
					<input type="text" id="txtNomPersonne" name="txtNomPersonne" size="20" required minlength="3"  maxlength="32"  placeholder="Nom" title="De 3 à 32 caractères"  />
				</td>
				<td>
                    <input type="text" id="txtPrenomPersonne" name="txtPrenomPersonne" size="20" required minlength="3"  maxlength="20"  placeholder="Prénom" title="De 3 à 20 caractères"  />
                </td>
                <td>
                    <input type="text" id="txtMailPersonne" name="txtMailPersonne" size="30" required minlength="11"  maxlength="50"  placeholder="Mail" title="exemple@domaine.exe"  />
                </td>
                <td>
                    <input type="text" id="txtTelPersonne" name="txtTelPersonne" size="10" required minlength="10"  maxlength="10"  placeholder="Tel" title="De 6 caractères"  />
                </td>
                <td>
                    <input type="text" id="txtRuePersonne" name="txtRuePersonne" size="25" required minlength="9"  maxlength="36"  placeholder="Rue" title="De 9 à 36 caractères"  />
                </td>
                <td>
                    <input type="text" id="txtVillePersonne" name="txtVillePersonne" size="20" required minlength="3"  maxlength="30"  placeholder="Ville" title="De 9 à 36 caractères"  />
                </td>
                <td>
                    <input type="text" id="txtCPPersonne" name="txtCPPersonne" size="5" required minlength="5"  maxlength="5"  placeholder="CP" title="De 5 caractères"  />
                </td>
				<td> 
					<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouvellePersonne" title="Enregistrer nouvelle personne"><i class="fa fa-save"></i></button>
					<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>	
				</td>
			</form>
			</tr>
				
			<?php
			foreach ($tbPersonnes as $personne) {
			?>
			  <tr>
			  
				<!-- formulaire pour modifier et supprimer les personnes-->
				<form action="index.php?uc=gererPersonnes" method="post">
				<td><?php echo $personne->identifiant; ?><input type="hidden"  name="txtIdPersonne" value="<?php echo $personne->identifiant; ?>" /></td>
				<td><?php 
					if ($personne->identifiant != $idPersonneModif) {
						echo $personne->nom; ?>
						</td>
						<td><?php echo $personne->prenom; ?></td>
						<td><?php echo $personne->mail; ?></td>
                        <td><?php echo $personne->tel; ?></td>
                        <td><?php echo $personne->rue; ?></td>
                        <td><?php echo $personne->ville; ?></td>
                        <td><?php echo $personne->CP; ?></td>
						<td>
							<?php if ($notification != 'rien' && $personne->identifiant == $idPersonneNotif) {
								echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'</button>'; 
							
							} ?>
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierPersonne" title="Modifier"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-xs" type="submit" name="cmdAction" value="supprimerPersonne" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer cette personne?');"><i class="fa fa-trash-o "></i></button>
						</td>
					<?php
					}
					else {
						?><input type="text" id="txtNomPersonne" name="txtNomPersonne" size="20" required minlength="3"  maxlength="32"  value="<?php echo $personne->nom; ?>" />
						</td>
                        <td>
                            <input type="text" id="txtPrenomPersonne" name="txtPrenomPersonne" size="20" required minlength="3"  maxlength="20"  value="<?php echo $personne->prenom; ?>" />
                        </td>
                        <td>
                            <input type="text" id="txtMailPersonne" name="txtMailPersonne" size="30" required minlength="11"  maxlength="50"  value="<?php echo $personne->mail; ?>" />
                        </td>
                        <td>
                            <input type="text" id="txtTelPersonne" name="txtTelPersonne" size="11" required minlength="10"  maxlength="10"  value="<?php echo $personne->tel; ?>" />
                        </td>
                        <td>
                            <input type="text" id="txtRuePersonne" name="txtRuePersonne" size="25" required minlength="9"  maxlength="36"  value="<?php echo $personne->rue; ?>" />
                        </td>
                        <td>
                            <input type="text" id="txtVillePersonne" name="txtVillePersonne" size="20" required minlength="3"  maxlength="30"  value="<?php echo $personne->ville; ?>" />
                        </td>
                        <td>
                            <input type="text" id="txtCPPersonne" name="txtCPPersonne" size="6" required minlength="5"  maxlength="5"  value="<?php echo $personne->CP; ?>" />
                        </td>
						<td>		 
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierPersonne" title="Enregistrer"><i class="fa fa-save"></i></button>
							<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>				
							<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierPersonne" title="Annuler"><i class="fa fa-undo"></i></button>
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
    </section><!-- fin section personnes-->
</div><!--fin div col-sm-12-->

 

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
