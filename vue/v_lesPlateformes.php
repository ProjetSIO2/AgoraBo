<!-- page start-->
<div class="col-sm-6">
	<section class="panel">
		<div class="chat-room-head">
			<h3><i class="fa fa-angle-right"></i> Gérer les plateformes</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-advance table-hover">
			<thead>
			  <tr class="tableau-entete">
				<th><i class="fa fa-bullhorn"></i> Identifiant</th>
				<th><i class="fa fa-bookmark"></i> Libellé</th>
                <th><i class="fa fa-bookmark"></i> Nombre disponible</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			<!-- formulaire pour ajouter une nouvelle plateforme-->
			<tr>
			<form action="index.php?uc=gererPlateformes" method="post">
				<td>Nouveau</td>
				<td>
					<input type="text" id="txtLibPlateforme" name="txtLibPlateforme" size="24" required minlength="4"  maxlength="24"  placeholder="Libellé" title="De 4 à 24 caractères"  />
				</td>
                <td>
                    <input type="text" id="txtNbPlateformesDispo" name="txtNbPlateformesDispo" size="3" required minlength="1"  maxlength="3"  placeholder="Nb" title="De 1 à 3 caractères"  />
                </td>
				<td> 
					<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="ajouterNouvellePlateforme" title="Enregistrer nouvelle plateforme"><i class="fa fa-save"></i></button>
					<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>	
				</td>
			</form>
			</tr>
				
			<?php
			foreach ($tbPlateformes as $plateforme) { 
			?>
			  <tr>
			  
				<!-- formulaire pour modifier et supprimer les plateformes-->
				<form action="index.php?uc=gererPlateformes" method="post">
				<td><?php echo $plateforme->identifiant; ?><input type="hidden"  name="txtIdPlateforme" value="<?php echo $plateforme->identifiant; ?>" /></td>
				<td><?php 
					if ($plateforme->identifiant != $idPlateformeModif) {
						echo $plateforme->libelle;
						?>
						</td>
                        <td><?php echo $plateforme->nombreDispo; ?></td>
                        <td>
							<?php if ($notification != 'rien' && $plateforme->identifiant == $idPlateformeNotif) {  
								echo '<button class="btn btn-success btn-xs"><i class="fa fa-check"></i>'.$notification.'</button>'; 
							
							} ?>
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="demanderModifierPlateforme" title="Modifier"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-danger btn-xs" type="submit" name="cmdAction" value="supprimerPlateforme" title="Supprimer" onclick="return confirm('Voulez-vous vraiment supprimer cette plateforme ?');"><i class="fa fa-trash-o "></i></button>
						</td>
					<?php
					}
					else {
						?><input type="text" id="txtLibPlateforme" name="txtLibPlateforme" size="24" required minlength="4"  maxlength="24"   value="<?php echo $plateforme->libelle; ?>" />     
						</td>
                        <td><input type="text" id="txtNbPlateformesDispo" name="txtNbPlateformesDispo" size="3" required minlength="1"  maxlength="3"   value="<?php echo $plateforme->nombreDispo; ?>" />
                        </td>
						<td>		 
							<button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="validerModifierPlateforme" title="Enregistrer"><i class="fa fa-save"></i></button>
							<button class="btn btn-info btn-xs" type="reset" title="Effacer la saisie"><i class="fa fa-eraser"></i></button>				
							<button class="btn btn-warning btn-xs" type="submit" name="cmdAction" value="annulerModifierPlateforme" title="Annuler"><i class="fa fa-undo"></i></button>
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
    </section><!-- fin section plateformes-->
</div><!--fin div col-sm-6-->

	<section class="panel task-panel tasks-widget">
	  <div class="panel-heading">
		<div class="pull-left">
		  <h5><i class="fa fa-tasks"></i> Todo Liste</h5>
		</div>
		<br>
	  </div>
	  <div class="panel-body">
		<div class="task-content">
		  <ul class="task-list">
			<li>
			  <div class="task-checkbox">
				  <span class="list-child">&nbsp;</span>
			  </div>
			  <div class="task-title">
				<span class="task-title-sp">Préparer le tournoi du jeu vidéo The legend of Zelda</span>
				<span class="badge bg-theme">Done</span>
				<div class="pull-right hidden-phone">
				  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
				  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
				</div>
			  </div>
			</li>
			<li>
			  <div class="task-checkbox">
				<span class="list-child">&nbsp;</span>
			  </div>
			  <div class="task-title">
				<span class="task-title-sp">Définir le contenu de la soirée familiale d'avril</span>
				<span class="badge bg-warning">Cool</span>
				<div class="pull-right hidden-phone">
				  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
				  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
				</div>
			  </div>
			</li>
			<li>
			  <div class="task-checkbox">
				  <span class="list-child">&nbsp;</span>
			  </div>
			  <div class="task-title">
				<span class="task-title-sp">Embaucher un nouvel intervenant pour la gym douce</span>
				<span class="badge bg-success">2 Days</span>
				<div class="pull-right hidden-phone">
				  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
				  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
				</div>
			  </div>
			</li>
			<li>
			  <div class="task-checkbox">
				 <span class="list-child">&nbsp;</span>
			  </div>
			  <div class="task-title">
				<span class="task-title-sp">Mettre à jour le site pour promouvoir les nouvelles activités</span>
				<span class="badge bg-info">Tomorrow</span>
				<div class="pull-right hidden-phone">
				  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
				  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
				</div>
			  </div>
			</li>
			<li>
			  <div class="task-checkbox">
				<span class="list-child">&nbsp;</span>
			  </div>
			  <div class="task-title">
				<span class="task-title-sp">Mettre à jour les informations sur les jeux vidéos</span>
				<span class="badge bg-important">Now</span>
				<div class="pull-right">
				  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
				  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
				</div>
			  </div>
			</li>
		  </ul>
		</div>
		<div class=" add-task-row">
		  <a class="btn btn-success btn-sm pull-left" href="todo_list.html#">Ajouter nouvelle tâche</a>
		  <a class="btn btn-default btn-sm pull-right" href="todo_list.html#">Voir toutes les tâches</a>
		</div>
	  </div>
	</section><!-- fin section todo list-->
 

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
