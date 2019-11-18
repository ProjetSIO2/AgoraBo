	<?php
	// si le paramètre action n'est pas positionné alors
	//		si aucun bouton "action" n'a été envoyé alors par défaut on affiche les personnes
	//		sinon l'action est celle indiquée par le bouton

	if (!isset($_POST['cmdAction'])){
		 $action = 'afficherPersonnes';
	}
	else {
		// par défaut
		$action = $_POST['cmdAction'];
	}

	$idPersonneModif = -1;		// positionné si demande de modification
	$notification = 'rien';	// pour notifier la mise à jour dans la vue

	// selon l'action demandée on réalise l'action 
	switch($action){

		case 'ajouterNouvellePersonne':{
			if ((!empty($_POST['txtNomPersonne']))&&(!empty($_POST['txtPrenomPersonne']))&&(!empty($_POST['txtMailPersonne']))
				&&(!empty($_POST['txtTelPersonne'])) &&(!empty($_POST['txtRuePersonne'])) &&(!empty($_POST['txtVillePersonne']))
				&&(!empty($_POST['txtCPPersonne']))) {
				$idPersonneNotif = $db->ajouterPersonne($_POST['txtNomPersonne'], $_POST['txtPrenomPersonne'], $_POST['txtMailPersonne'],
					$_POST['txtTelPersonne'], $_POST['txtRuePersonne'], $_POST['txtVillePersonne'], $_POST['txtCPPersonne']);
				// $idPersonneNotif est l'idPersonne de la personne ajoutée
				$notification = 'Ajouté';	// sert à afficher l'ajout réalisé dans la vue
			}
		  break;
		}

		case 'demanderModifierPersonne':{
				$idPersonneModif = $_POST['txtIdPersonne']; // sert à créer un formulaire de modification pour ce genre
			break;
		}
			
		case 'validerModifierPersonne':{
			$db->modifierPersonne($_POST['txtIdPersonne'], $_POST['txtNomPersonne'], $_POST['txtPrenomPersonne'], $_POST['txtMailPersonne'],
				$_POST['txtTelPersonne'], $_POST['txtRuePersonne'], $_POST['txtVillePersonne'], $_POST['txtCPPersonne']);
			$idPersonneNotif = $_POST['txtIdPersonne']; // $idPersonneNotif est l'idPersonne de la personne modifiée
			$notification = 'Modifié';  // sert à afficher la modification réalisée dans la vue
			break;
		}

		case 'supprimerPersonne':{
			$idPersonne = $_POST['txtIdPersonne'];
			$db->supprimerPersonne($idPersonne);
			$idPersonneNotif = $idPersonne;
			$notification = 'Supprimé';  // sert à afficher la suppression réalisée dans la vue
			break;
		}
	}
		
	// l' affichage des personnes se fait dans tous les cas
	$tbPersonnes = $db->getLesPersonnes();
	require 'vue/v_lesPersonnes.php';

	?>
