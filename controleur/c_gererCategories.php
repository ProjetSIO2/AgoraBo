	<?php
	// si le paramètre action n'est pas positionné alors
	//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les categories
	//		sinon l'action est celle indiquée par le bouton

	if (!isset($_POST['cmdAction'])){
		 $action = 'afficherCategories';
	}
	else {
		// par défaut
		$action = $_POST['cmdAction'];
	}

	$idCategorieModif = -1;		// positionné si demande de modification
	$notification = 'rien';	// pour notifier la mise à jour dans la vue

	// selon l'action demandée on réalise l'action 
	switch($action){

		case 'ajouterNouvelleCategorie':{
			if (!empty($_POST['txtLibCategorie'])) {
				$idCategorieNotif = $db->ajouterCategorie($_POST['txtLibCategorie']);
				// $idCategorieNotif est l'idCategorie de la categorie ajoutée
				$notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
			}
		  break;
		}

		case 'demanderModifierCategorie':{
				$idCategorieModif = $_POST['txtIdCategorie']; // sert à créer un formulaire de modification pour cette categorie
			break;
		}
			
		case 'validerModifierCategorie':{
			$db->modifierCategorie($_POST['txtIdCategorie'], $_POST['txtLibCategorie']);
			$idCategorieNotif = $_POST['txtIdCategorie']; // $idCategorieNotif est l'idMarque de la categorie modifiée
			$notification = 'Modifié';  // sert à afficher la modification réalisée dans la vue
			break;
		}

		case 'supprimerCategorie':{
			$idCategorie = $_POST['txtIdCategorie'];
			$db->supprimerCategorie($idCategorie);
			$idCategorieNotif = $idCategorie;
			$notification = 'Supprimé';  // sert à afficher la suppression réalisée dans la vue
			break;
		}
	}
		
	// l'affichage des categories se fait dans tous les cas
	$tbCategories  = $db->getLesCategories();
	require 'vue/v_lesCategories.php';

	?>
