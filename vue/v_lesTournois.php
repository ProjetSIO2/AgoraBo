<div class="conteneur">
    <div class="separateur affichageTournoi">
        <div class="chat-room-head">
            <h3 class="grosTitre"><i class="fa fa-angle-right"></i> Gérer les jeux vidéo</h3>
            <form action="index.php?uc=gererTournois" method="post">
                <button type="submit" class="btnCreer" name="cmdAction" id="cmdAction" title="Créer un tournoi" value="creerTournoi"><i class="fa fa-angle-right"></i> Créer un tournoi</button>
            </form>
        </div>
        <table class="table table-striped table-advance table-hover">
            <thead>
                <tr class="tableau-entete">
                    <th scope="col"><i class="fa fa-bullhorn"></i> Année</th><th scope="col"><i class="fa fa-bullhorn"></i> Numéro</th><th scope="col"><i class="fa fa-bookmark"></i> Nom</th><th scope="col"><i class="fa fa-bookmark"></i> Jeu</th><th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($tbTournois as $tournoi){
                        ?>
                        <form action="index.php?uc=gererTournois" method="post">
                            <tr>
                                <td><?php echo $tournoi->anneeTournoi; ?><input type="hidden" name="txtAnneeTournoi" id="txtAnneeTournoi" value="<?php echo $tournoi->anneeTournoi; ?>"></td>
                                <td><?php echo $tournoi->numTournoi; ?><input type="hidden" name="txtNumTournoi" id="txtNumTournoi" value="<?php echo $tournoi->numTournoi; ?>"></td>
                                <td><?php echo $tournoi->nomTournoi; ?></td>
                                <td><?php echo $tournoi->nom; ?></td>
                                <td>
                                    <button class="btn btn-primary btn-xs" type="submit" name="cmdAction" value="modifierTournoi" title="Modifier"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs" type="submit" name="cmdAction" title="supprimerTournoi" value="supprimerTournoi"><i class="fa fa-trash-o"></i></button>				
                                    <button class="btn btn-info btn-xs" type="submit" name="cmdAction" value="afficherInfoTournoi" title="Afficher les informations"><i class="fas fa-info"></i></button>
                                </td>
                            </tr>
                        </form>
                        <?php
                    }
                    ?>
                    </tbody>
        </table>
    </div>
    <div class="separateur affichageGestionTournoi">
        <?php
            if($affichage == 'infoTournoi'){
                ?>
                <div>
                    <h3 class="titreAction">Affichage du tournoi</h3>
                </div>
                <div>
                    <p class="libelle">Année</p><p class="info"><?php echo $objTournoi->Tournoi[0]->anneeTournoi;?></p>
                </div>
                <div>
                   <p class="libelle">Numéro</p><p class="info"><?php echo $objTournoi->Tournoi[0]->numTournoi;?></p>
                </div>
                <div>
                   <p class="libelle">Nom</p><p class="info"><?php echo $objTournoi->Tournoi[0]->nomTournoi;?></p>
                </div>
                <div>
                    <p class="libelle">Jeu</p><p class="info"><?php echo $objTournoi->Tournoi[0]->nomJeu;?></p>
                </div>
                <div>
                    <p class="libelle">Plateforme</p><p class="info"><?php echo $objTournoi->Tournoi[0]->libPlateforme;?></p>
                </div>
                <div>
                    <p class="libelle">Gain</p><p class="info"><?php echo $objTournoi->Tournoi[0]->gain;?></p>  
                </div>
                <div>
                    <p class="libelle">Format</p><p class="info"><?php echo $objTournoi->Tournoi[0]->nomFormat;?></p>
                </div>
                <div>
                    <p class="libelle">Juge</p><p class="info"><?php echo $objTournoi->Tournoi[0]->juge;?></p>
                </div>
                <div>
                    <p class="libelle">Animateurs</p>
                    <p class="info">
                        <?php 
                            for($i = 0; $i < count($objTournoi->Animateurs); $i++) {
                                if($i == 0){
                                    echo $objTournoi->Animateurs[$i]->animateur;
                                }
                                else{
                                    echo ", ".$objTournoi->Animateurs[$i]->animateur;
                                }
                            } 
                        ?>
                    </p>
                </div>
                <div>
                    <p class="libelle">Journées</p>
                    <p class="info">
                        <?php
                            for($i = 0; $i < count($objTournoi->Journees); $i++) {
                                if($i == 0){
                                    echo 'Le '.$objTournoi->Journees[$i]->dateJournee.' de '.$objTournoi->Journees[$i]->heureDebut.' à '.$objTournoi->Journees[$i]->heureFin;
                                }
                                else{
                                    echo ", le ".$objTournoi->Journees[$i]->dateJournee.' de '.$objTournoi->Journees[$i]->heureDebut.' à '.$objTournoi->Journees[$i]->heureFin;
                                }
                            } 
                        ?>
                    </p>
                </div>
                <div>
                    <p class="libelle">Equipements</p>
                    <p class="info">
                        <?php
                            for($i = 0; $i < count($objTournoi->Equipements); $i++) {
                                if($i == 0){
                                    echo $objTournoi->Equipements[$i]->libEquipement;
                                }
                                else{
                                    echo ", ".$objTournoi->Equipements[$i]->libEquipement;
                                }
                            } 
                        ?>
                    </p>
                </div>
                <div>
                    <p class="libelle">Nombre de participants</p>
                    <p class="info"><?php echo $objTournoi->Tournoi[0]->nbParticipants;?></p>
                </div>
                <?php
            }
            elseif ($affichage == "modifierTournoi" || $affichage == "creerTournoi") {
                ?>
                <form action="index.php?uc=gererTournois" method="post">
                    <div>
                        <?php
                            if($affichage == 'creerTournoi'){
                            ?>
                                <h3 class="titreAction">Création du tournoi</h3>
                            <?php
                            }else{
                            ?>
                                <h3 class="titreAction">Modification du tournoi</h3>
                            <?php
                            }
                        ?>
                    </div>
                    <div>
                        <p class="libelle">Année</p>
                        <p class="info"><input type="number" name="anneeTournoi" id="anneeTournoi" <?php if($affichage == "modifierTournoi") { ?> value="<?php echo $objTournoi->Tournoi[0]->anneeTournoi;?>" readonly <?php } ?>></p>
                    </div>
                    <div>
                    <p class="libelle">Numéro</p>
                    <p class="info"> <input type="number" name="numTournoi" id="numTournoi" <?php if($affichage == "modifierTournoi") { ?> value="<?php echo $objTournoi->Tournoi[0]->numTournoi;?>" readonly <?php } ?>></p>
                    </div>
                    <div>
                    <p class="libelle">Nom</p>
                    <p class="info"><input type="text" name="txtNomTournoi" id="txtNomTournoi" <?php if($affichage == "modifierTournoi") { ?> value="<?php echo $objTournoi->Tournoi[0]->nomTournoi;?>" <?php } ?>></p>
                    
                    </div>
                    <div>
                        <p class="libelle">Jeu</p>
                        <p class="info"><?php if($affichage == "creerTournoi"){afficherListe($tbJeux, 'lstJeux', 1, ""); }else{ afficherListe($tbJeux, 'lstJeux', 1, $objTournoi->Tournoi[0]->refJeu);}?></p>                    
                    </div>
                    <div>
                        <p class="libelle">Gain</p>
                        <p class="info"> <input type="text" name="txtGainTournoi" id="txtGainTournoi" <?php if($affichage == "modifierTournoi") { ?> value="<?php echo $objTournoi->Tournoi[0]->gain;?> <?php } ?>"></p>
                    </div>
                    <div>
                        <p class="libelle">Format</p>
                        <p class="info"> <?php if($affichage == "creerTournoi"){afficherListe($tbFormats, 'lstFormat', 1, "");}else{afficherListe($tbFormats, 'lstFormat', 1, $objTournoi->Tournoi[0]->idFormat);} ?> </p>
                    </div>
                    <div>
                        <p class="libelle">Juge</p>
                        <p class="info"><?php if($affichage == "creerTournoi"){afficherListe($tbPersonnes, 'lstJuge', 1, "");}else{afficherListe($tbPersonnes, 'lstJuge', 1, $objTournoi->Tournoi[0]->idJuge);} ?></p>
                    </div>
                    <div>
                        <p class="libelle">Animateurs</p>
                        <p class="info"><?php afficherListeMultiple($tbPersonnes, 'lstAnimateurs', 5, ""); ?></p>
                    </div>
                    <div>
                        <p class="libelle">Journées</p>
                        <p class="info">
                            <?php
                                if($affichage == "creerTournoi") {
                                    for($i = 1; $i < 6; $i++) {
                                        $date = "dateTournoi".$i;
                                        $heureD = "heureDebutTournoi".$i;
                                        $heureF = "heureFinTournoi".$i;
                                        echo 'Journée '.$i.' : '."<input type='date' name=".$date.' id='.$date.' >';
                                        echo 'Heure début : '."<input type='time' name=".$heureD.' id='.$heureD. ' >';
                                        echo 'Heure fin : '."<input type='time' name=".$heureF.' id='.$heureF.' >';
                                        echo '<br></br>';
                                    }
                                }else{
                                    for($i = 0; $i < count($objTournoi->Journees); $i++) {
                                        $num = $i+1 ;
                                        $date = "dateTournoi".$num;
                                        $heureD = "heureDebutTournoi".$num;
                                        $heureF = "heureFinTournoi".$num;
                                        echo 'Journée '.$num.' : '."<input type='date' name=".$date.' id='.$date.' value='.$objTournoi->Journees[$i]->dateJournee.' >' ;
                                        echo 'Heure début : '."<input type='time' name=".$heureD.' id='.$heureD.' value='.$objTournoi->Journees[$i]->heureDebut.' >';
                                        echo 'Heure fin : '."<input type='time' name=".$heureF.' id='.$heureF.' value='.$objTournoi->Journees[$i]->heureFin.' >';
                                        echo '<br></br>';
                                    }
                                    for ($i = count($objTournoi->Journees); $i < 5; $i++) {
                                        $num = $i+1 ;
                                        $date = "dateTournoi".$num;
                                        $heureD = "heureDebutTournoi".$num;
                                        $heureF = "heureFinTournoi".$num;
                                        echo 'Journée '.$num.' : '."<input type='date' name=".$date.' id='.$date.' >';
                                        echo 'Heure début : '."<input type='time' name=".$heureD.' id='.$heureD. ' >';
                                        echo 'Heure fin : '."<input type='time' name=".$heureF.' id='.$heureF.' >';
                                        echo '<br></br>';
                                    }
                                }
                            ?>
                        </p>
                    </div>
                    <div>
                        <p class="libelle">Equipements</p>
                        <p class="info"><?php afficherListeMultiple($tbEquipements, 'lstEquipements', 5, ""); ?></p>
                    </div>
                    <div>
                        <p class="libelle">Nombre de participants</p>
                        <p class="info">
                            <input type="number" name="nbrParticipants" id="nbrParticipants" <?php if($affichage == "modifierTournoi") { ?> value="<?php echo $objTournoi->Tournoi[0]->nbParticipants; ?>" <?php } ?>></p>
                    </div>
                    <div>
                        <p class="libelle">
                            <?php
                                if($affichage =="creerTournoi"){
                                    ?>
                                        <button class="btnValidation" name="cmdAction" id="cmdAction" type="submit" value="validerCreation" title="Créer un tournoi">Valider la création</button>
                                    <?php
                                }
                                else{
                                    ?>
                                        <button class="btnValidation" name="cmdAction" id="cmdAction" type="submit" value="validerModif" title="Modifier un tournoi">Valider la modification</button>
                                    <?php
                                }
                            ?>
                        </p>
                    </div>
                </form>
                <?php
            }
        ?>
    </div>
</div>