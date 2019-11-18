	<?php
	// si le paramètre action n'est pas positionné alors
	//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les plateformes
	//		sinon l'action est celle indiquée par le bouton

	if (!isset($_POST['cmdAction'])){
		 $action = 'afficherJeuxVideo';
	}
	else {
		// par défaut
		$action = $_POST['cmdAction'];
	}

	$refJeuModif = -1;		// positionné si demande de modification
	$notification = 'rien';	// pour notifier la mise à jour dans la vue

	// selon l'action demandée on réalise l'action 
	switch($action){

		case 'ajouterNouveauJeuVideo':{		
			if ((!empty($_POST['txtRefJeu'])) && (!empty($_POST['lstPlateformes'])) && (!empty($_POST['lstPegis'])) && (!empty($_POST['lstGenres'])) && (!empty($_POST['lstMarques'])) && (!empty($_POST['txtNom'])) && (!empty($_POST['txtPrix'])) && (!empty($_POST['txtDateParution']))) {
				$refJeuNotif = $db->ajouterJeuVideo($_POST['txtRefJeu'], $_POST['lstPlateformes'], $_POST['lstPegis'], $_POST['lstGenres'], $_POST['lstMarques'], $_POST['txtNom'], $_POST['txtPrix'], $_POST['txtDateParution']) ;
				// $refJeuNotif est la refJeu du jeu vidéo ajouté
				$notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
			}
		  break;
		}

		case 'demanderModifierJeuVideo':{
				$refJeuModif = $_POST['txtRefJeu']; // sert à créer un formulaire de modification pour ce jeu vidéo
			break;
		}
			
		case 'validerModifierJeuVideo':{
			$db->modifierJeuVideo($_POST['txtRefJeu'], $_POST['lstPlateformes'], $_POST['lstPegis'], $_POST['lstGenres'], $_POST['lstMarques'], $_POST['txtNom'], $_POST['txtPrix'], $_POST['txtDateParution']); 
			$refJeuNotif = $_POST['txtRefJeu']; // $refJeuNotif est la refJeu du jeu vidéo modifié
			$notification = 'Modifié';  // sert à afficher la modification réalisée dans la vue
			break;
		}

		case 'supprimerJeuVideo':{
			$refJeu = $_POST['txtRefJeu'];
			$db->supprimerJeuVideo($refJeu);
			$refJeuNotif = $refJeu;
			$notification = 'Supprimé';  // sert à afficher la suppression réalisée dans la vue
			break;
		}
	}
		
	// l' affichage des jeux vidéo se fait dans tous les cas	
	$tbJeuxVideo  = $db->getLesJeuxVideo();
	$tbGenres  = $db->getLesGenres();
	$tbPlateformes  = $db->getLesPlateformes();
	$tbPegis  = $db->getLesPegis();
	$tbMarques  = $db->getLesMarques();
	require 'vue/v_lesJeuxVideo.php';

	?>
