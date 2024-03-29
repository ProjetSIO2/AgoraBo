﻿	<?php
	// si le paramètre action n'est pas positionné alors
	//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les plateformes
	//		sinon l'action est celle indiquée par le bouton

	if (!isset($_POST['cmdAction'])){
		 $action = 'afficherPlateformes';
	}
	else {
		// par défaut
		$action = $_POST['cmdAction'];
	}

	$idPlateformeModif = -1;		// positionné si demande de modification
	$notification = 'rien';	// pour notifier la mise à jour dans la vue
	$idPlateformeNotif = -1;       // positionné si mise à jour dans la vue

	// selon l'action demandée on réalise l'action 
	switch($action){

		case 'ajouterNouvellePlateforme':{		
			if (!empty($_POST['txtLibPlateforme'])) {
				$idPlateformeNotif = $db->ajouterPlateforme($_POST['txtLibPlateforme'], $_POST['txtNbPlateformesDispo']);
				// $idPlateformeNotif est l'idPlateforme de la plateforme ajouté
				$notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
			}
		  break;
		}

		case 'demanderModifierPlateforme':{
				$idPlateformeModif = $_POST['txtIdPlateforme']; // sert à créer un formulaire de modification pour cette plateforme
			break;
		}
			
		case 'validerModifierPlateforme':{
			$db->modifierPlateforme($_POST['txtIdPlateforme'], $_POST['txtLibPlateforme'], $_POST['txtNbPlateformesDispo']);
			$idPlateformeNotif = $_POST['txtIdPlateforme']; // $idPlateformeNotif est l'idMarque de la plateforme modifié
			$notification = 'Modifié';  // sert à afficher la modification réalisée dans la vue
			break;
		}

		case 'supprimerPlateforme':{
			$idPlateforme = $_POST['txtIdPlateforme'];
			$db->supprimerPlateforme($idPlateforme);
			$idPlateformeNotif = $idPlateforme;
			$notification = 'Supprimé';  // sert à afficher la suppression réalisée dans la vue
			break;
		}
	}
		
	// l' affichage des plateformes se fait dans tous les cas	
	$tbPlateformes  = $db->getLesPlateformes();		
	//require 'vue/v_lesPlateformes.php';
	echo $twig->render('lesPlateformes.html.twig', array(
		'menuActif' => 'Jeux',
		'tbPlateformes' => $tbPlateformes,
		'idPlateformeModif' => $idPlateformeModif,
		'idPlateformeNotif' => $idPlateformeNotif,
		'notification' => $notification
	));

	?>
