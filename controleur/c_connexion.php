<?php
if (!isset($_POST['cmdAction'])){
	$action = 'demanderConnexion';
}
else {
	// par défaut
	$action = $_POST['cmdAction'];
}

switch ($action) {
	case 'demanderConnexion': {
		//require 'vue/v_connexion.php';
        echo $twig->render('connexion.html.twig');
		break;
	}
    case 'validerConnexion': {
    	// vérifier si l'utilisateur existe avec ce mot de passe
		$utilisateur = $db->getUnePersonne($_POST['txtLogin'], $_POST['hdMdp']);
        // si l'utilisateur n'existe pas
		if ($utilisateur == null) {
			// positionner le message d'erreur
			$erreur =  "Nom d'utilisateur et/ou le mot de passe incorrect(s)";
			//// inclure la vue correspondant au formulaire d'authentification
			//require 'vue/v_connexion.php';
            echo $twig->render('connexion.html.twig', array('erreur' => $erreur));
		}
		else {
			// créer trois variables de session pour id utilisateur, nom et prénom
			$_SESSION['idUtilisateur'] = $utilisateur->idPersonne;
            $_SESSION['nomUtilisateur'] = $utilisateur->nomPersonne;
            $_SESSION['prenomUtilisateur'] = $utilisateur->prenomPersonne;
			// redirection du navigateur vers la page d'accueil
			header('Location: index.php');
			exit;
		}
		break;
	}

} ?>