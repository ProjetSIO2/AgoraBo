<?php
/// C TROP BIEN MY HERO ACADEMIA
/**
 * Page d'accueil de l'application AgoraBo

 * Point d'entrée unique de l'application
 * @author MD
 * @package default
 */

// démarrer la session  !!!!!!!!  A FAIRE AVANT TOUT CODE HTML   !!!!!!!!
session_start();

//require 'vue/v_header.php';	// entête des pages HTML
require 'vue/v_headerTwig.html';   // balise <head> et styles

// inclure les bibliothèques de fonctions
require_once 'app/_config.inc.php';
require_once 'modele/class.PdoJeux.inc.php';
//require_once 'vue/_forms.inc.php'; // on va gérer l'affichage avec Twig


// *** pour twig ***
// la directive "require 'vendor/autoload.php';" est ajoutée au début de l'application
// elle permet de charger le script  "autoload.php".
// Ce script a été crée par composer et permet de charger les dépendances une à une dans le projet
require_once 'vendor/autoload.php';

// la classe FileSystemLoader permet de charger des fichiers contenus dans le dossier indiqué en paramètre
$loader = new \Twig\Loader\FilesystemLoader('vue');

// la classe Environment permet de stocker la configuration de l'environnement
//  en phase de développement (debug) nous n'utilisons pas le cache
$twig = new \Twig\Environment($loader, array(
	'cache' => TWIG_CACHE,
	'debug' => TWIG_DEBUG
));
// pour que twig connaisse la variable globale de session
$twig->addGlobal('session', $_SESSION);
// *** twig ***


// Connexion au serveur et à la base (A)
$db = PdoJeux::getPdoJeux();

// Si aucun utilisateur connecté, on considère que la page demandée est la page de connexion
// $_SESSION['idUtilisateur']  est crée lorsqu'un utilisateur autorisé se connecte (dans c_connexion.php)
if (!isset($_SESSION['idUtilisateur'])){
	require 'controleur/c_connexion.php';
}
else {

	// Récupère l'identifiant de la page passé via l'URL
	// Si non défini, on considère que la page demandée est la page d'accueil
	if (!isset($_GET['uc'])) {
		$_GET['uc'] = 'index';
	}
	$uc = $_GET['uc'];

	// selon la valeur du use case demandé(uc) on inclut le contrôleur secondaire
	switch ($uc) {
		case 'index' :
		{
			//$menuActif = '';
			//require 'vue/v_menu.php';
			//require 'vue/v_accueil.php';
			echo $twig->render('accueil.html.twig');
			break;
		}
		case 'gererGenres' :
		{
			//$menuActif = 'Jeux';    // pour garder le menu correspondant ouvert
			//require 'vue/v_menu.php';
			require 'controleur/c_gererGenres.php'; // inclure le contrôleur secondaire
			break;
		}
		case 'gererMarques' :
		{
			//$menuActif = 'Jeux';    // pour garder le menu correspondant ouvert
			//require 'vue/v_menu.php';
			require 'controleur/c_gererMarques.php'; // inclure le contrôleur secondaire
			break;
		}
		case 'gererPlateformes' :
		{
			//$menuActif = 'Jeux';    // pour garder le menu correspondant ouvert
			//require 'vue/v_menu.php';
			require 'controleur/c_gererPlateformes.php'; // inclure le contrôleur secondaire
			break;
		}
		case 'gererPegis' :
		{
			//$menuActif = 'Jeux';    // pour garder le menu correspondant ouvert
			//require 'vue/v_menu.php';
			require 'controleur/c_gererPegis.php'; // inclure le contrôleur secondaire
			break;
		}
		case 'gererJeuxVideo' :
		{
			//$menuActif = 'Jeux';    // pour garder le menu correspondant ouvert
			//require 'vue/v_menu.php';
			require 'controleur/c_gererJeuxVideo.php'; // inclure le contrôleur secondaire
			break;
		}
		case 'gererPersonnes' :
		{
			//$menuActif = 'Jeux';    // pour garder le menu correspondant ouvert
			//require 'vue/v_menu.php';
			require 'controleur/c_gererPersonnes.php'; // inclure le contrôleur secondaire
			break;
		}
		case 'gererEquipements' :
		{
			//$menuActif = 'Jeux';    // pour garder le menu correspondant ouvert
			//require 'vue/v_menu.php';
			require 'controleur/c_gererEquipements.php'; // inclure le contrôleur secondaire
			break;
		}
		case 'gererFormats' :
		{
			//$menuActif = 'Jeux';    // pour garder le menu correspondant ouvert
			//require 'vue/v_menu.php';
			require 'controleur/c_gererFormats.php'; // inclure le contrôleur secondaire
			break;
		}
		case 'gererCategories' :
		{
			//$menuActif = 'Jeux';    // pour garder le menu correspondant ouvert
			//require 'vue/v_menu.php';
			require 'controleur/c_gererCategories.php'; // inclure le contrôleur secondaire
			break;
		}
		case 'gererTournois':
		{
			//$menuActif = "Jeux";
			//require 'vue/v_menu.php';
			require 'controleur/c_gererTournois.php'; // inclure le contrôleur secondaire
			break;
		}
		case 'deconnexion':
		{
			require 'controleur/c_deconnexion.php';
			break;
		}
	}
}

// Fermeture de la connexion (C)
$db = null;	

//// pied de page
//require("vue/v_footer.html") ;
?>

