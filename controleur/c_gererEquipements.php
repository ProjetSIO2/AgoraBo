	<?php
	// si le paramètre action n'est pas positionné alors
	//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les equipements
	//		sinon l'action est celle indiquée par le bouton

	if (!isset($_POST['cmdAction'])){
		 $action = 'afficherEquipements';
	}
	else {
		// par défaut
		$action = $_POST['cmdAction'];
	}

	$idEquipementModif = -1;		// positionné si demande de modification
	$notification = 'rien';	// pour notifier la mise à jour dans la vue
	$idEquipementNotif = -1; // positionné si mise à jour dans la vue

	// selon l'action demandée on réalise l'action 
	switch($action){

		case 'ajouterNouvelEquipement':{
			if (!empty($_POST['txtLibEquipement']) && !empty($_POST['txtIdEquipement'])) {
				$idEquipementNotif = $db->ajouterEquipement($_POST['txtIdEquipement'], $_POST['txtLibEquipement']);
				// $idEquipementNotif est l'idEquipement de l'equipement ajouté
				$notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
			}
		  break;
		}

		case 'demanderModifierEquipement':{
				$idEquipementModif = $_POST['txtIdEquipement']; // sert à créer un formulaire de modification pour cet equipement
			break;
		}
			
		case 'validerModifierEquipement':{
			$db->modifierEquipement($_POST['txtIdEquipement'], $_POST['txtLibEquipement']);
			$idEquipementNotif = $_POST['txtIdEquipement']; // $idEquipementNotif est l'idEquipement de l'equipement modifié
			$notification = 'Modifié';  // sert à afficher la modification réalisée dans la vue
			break;
		}

		case 'supprimerEquipement':{
			$idEquipement = $_POST['txtIdEquipement'];
			$db->supprimerEquipement($idEquipement);
			$idEquipementNotif = $idEquipement;
			$notification = 'Supprimé';  // sert à afficher la suppression réalisée dans la vue
			break;
		}
	}
		
	// l'affichage des equipements se fait dans tous les cas
	$tbEquipements  = $db->getLesEquipements();
	//require 'vue/v_lesEquipements.php';
	echo $twig->render('lesEquipements.html.twig', array(
		'menuActif' => 'Jeux',
		'tbEquipements' => $tbEquipements,
		'idEquipementModif' => $idEquipementModif,
		'idEquipementNotif' => $idEquipementNotif,
		'notification' => $notification
	));

	?>
