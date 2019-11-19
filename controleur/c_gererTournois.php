<?php
    if (!isset($_POST['cmdAction'])){
        $action = 'afficherTournois';
    }
    else {
        // par défaut
        $action = $_POST['cmdAction'];
    }

    $affichage = null;

    switch ($action) {
        case 'afficherInfoTournoi':{
            $annee = $_POST["txtAnneeTournoi"];
            $num = $_POST["txtNumTournoi"];
            $objTournoi = $db->getLeTournoi($annee, $num);
            $affichage = "infoTournoi";
            break;
        }
        case 'modifierTournoi':{
            $annee = $_POST["txtAnneeTournoi"];
            $num = $_POST["txtNumTournoi"];
            $objTournoi = $db->getLeTournoi($annee, $num);
            $affichage = "modifierTournoi";
            break;
        }
        case 'creerTournoi':{
            $affichage = "creerTournoi";
            break;
        }
        case 'validerModif':{
            //Si les journées existes on les ajoute au tableau de journées
            $tbJournees = array();
            for($i = 1; $i < 6; $i++) {
                $date = "dateTournoi".$i;
                $heureD = "heureDebutTournoi".$i;
                $heureF = "heureFinTournoi".$i;

                if ((!empty($_POST[$date])) && (!empty($_POST[$heureD])) && (!empty($_POST[$heureF]))) {
                    $journee = (object)['dateJ' => $_POST[$date], 'heureD' => $_POST[$heureD], 'heureF' => $_POST[$heureF]];
                    array_push($tbJournees, $journee);
                }
            }

            //On modifie les données du tournoi
            $objTournoi = (object)[
                'Annee' => $_POST['anneeTournoi'],
                'Numero' => $_POST['numTournoi'],
                'NomTournoi' => $_POST['txtNomTournoi'],
                'Jeu' => $_POST['lstJeux'],
                'Gain' => $_POST['txtGainTournoi'],
                'Format' => $_POST['lstFormats'],
                'Juge' => $_POST['lstJuges'],
                'Animateurs' => $_POST['lstAnimateurs'],
                'Journees' => $tbJournees,
                'Equipements' => $_POST['lstEquipements'],
                'NbParticipants' => $_POST['nbrParticipants'],
            ];
            $db->modifierTournoi($objTournoi);
            break;
        }
        case 'validerCreation':{
            //Si les journées existes on les ajoute au tableau de journées
            $tbJournees = array();
            for($i = 1; $i < 6; $i++) {
                $date = "dateTournoi".$i;
                $heureD = "heureDebutTournoi".$i;
                $heureF = "heureFinTournoi".$i;

                if ((!empty($_POST[$date])) && (!empty($_POST[$heureD])) && (!empty($_POST[$heureF]))) {
                    $journee = (object)['dateJ' => $_POST[$date], 'heureD' => $_POST[$heureD], 'heureF' => $_POST[$heureF]];
                    array_push($tbJournees, $journee);
                }
            }

            //Si aucune donnée ne manque on créé le tournoi
            if ((!empty($_POST['anneeTournoi'])) && (!empty($_POST['numTournoi'])) && (!empty($_POST['txtNomTournoi'])) && (!empty($_POST['lstJeux']))
                && (!empty($_POST['txtGainTournoi'])) && (!empty($_POST['lstFormats'])) && (!empty($_POST['lstJuges']))
                && (!empty($_POST['lstAnimateurs'])) && (!empty($tbJournees)) && (!empty($_POST['lstEquipements'])) && (!empty($_POST['nbrParticipants']))) {

                $objTournoi = (object)[
                    'Annee' => $_POST['anneeTournoi'],
                    'Numero' => $_POST['numTournoi'],
                    'NomTournoi' => $_POST['txtNomTournoi'],
                    'Jeu' => $_POST['lstJeux'],
                    'Gain' => $_POST['txtGainTournoi'],
                    'Format' => $_POST['lstFormats'],
                    'Juge' => $_POST['lstJuges'],
                    'Animateurs' => $_POST['lstAnimateurs'],
                    'Journees' => $tbJournees,
                    'Equipements' => $_POST['lstEquipements'],
                    'NbParticipants' => $_POST['nbrParticipants'],
                ];
                $db->ajouterTournoi($objTournoi);
            }
            break;
        }
        case 'supprimerTournoi':{
            $annee = $_POST['txtAnneeTournoi'];
            $numTournoi = $_POST['txtNumTournoi'];
            $db->supprimerTournoi($annee, $numTournoi);
            break;
        }
    }

   $tbEquipements = $db->getLesEquipements();
   $tbJeux = $db->getLesJeux_LA();
   $tbPersonnes = $db->getLesPersonnes_LA();
   $tbFormats = $db->getLesFormats();
   $tbTournois = $db->getLesTournois();
   //require "vue/v_lesTournois.php";
    echo $twig->render('lesTournois.html.twig', array(
        'menuActif' => 'Jeux',
        'tbEquipements' => $tbEquipements,
        'tbJeux' => $tbJeux,
        'tbPersonnes' => $tbPersonnes,
        'tbFormats' => $tbFormats,
        'tbTournois' => $tbTournois,
        'objTournoi' => $objTournoi,
        'affichage' => $affichage
    ));
?>