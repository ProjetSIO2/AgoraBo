	<?php
	// si le paramètre action n'est pas positionné alors
	//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les formats
	//		sinon l'action est celle indiquée par le bouton

	if (!isset($_POST['cmdAction'])){
		 $action = 'afficherFormats';
	}
	else {
		// par défaut
		$action = $_POST['cmdAction'];
	}

	$idFormatModif = -1;		// positionné si demande de modification
	$notification = 'rien';	// pour notifier la mise à jour dans la vue

	// selon l'action demandée on réalise l'action 
	switch($action){

		case 'ajouterNouveauFormat':{
			if (!empty($_POST['txtLibFormat'])) {
				$idFormatNotif = $db->ajouterFormat($_POST['txtLibFormat'], $_POST['txtDescFormat']);
				// $idFormatNotif est l'idFormat du format ajouté
				$notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
			}
		  break;
		}

		case 'demanderModifierFormat':{
				$idFormatModif = $_POST['txtIdFormat']; // sert à créer un formulaire de modification pour ce format
			break;
		}
			
		case 'validerModifierFormat':{
			$db->modifierFormat($_POST['txtIdFormat'], $_POST['txtLibFormat'], $_POST['txtDescFormat']);
			$idFormatNotif = $_POST['txtIdFormat']; // $idFormatNotif est l'idFormat du format modifié
			$notification = 'Modifié';  // sert à afficher la modification réalisée dans la vue
			break;
		}

		case 'supprimerFormat':{
			$idFormat = $_POST['txtIdFormat'];
			$db->supprimerFormat($idFormat);
			$idFormatNotif = $idFormat;
			$notification = 'Supprimé';  // sert à afficher la suppression réalisée dans la vue
			break;
		}
	}
		
	// l'affichage des formats se fait dans tous les cas
	$tbFormats  = $db->getLesFormats();
	require 'vue/v_lesFormats.php';

	?>
