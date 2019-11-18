<?php	
	// ----------------------------------------------------------------------------- 
	/**  
	* Affiche une liste de choix à partir d'un    
	*        tableau d'objets ayant les attributs (identifiant, libelle)  
	* @param string $tbObjets : le tableau d'objets  
	* @param string $name : les attributs name et id de la liste déroulante  
	* @param int $size : l'attribut size de la liste déroulante  
	* @param string $idSelect : l'identifiant de l'élément à présélectionner dans la liste  
	*/  
	function afficherListe($tbObjets, $name, $size, $idSelect) {     
		// si $tbObjets est non vide et $idSelect est non vide     
		if (count($tbObjets) && (empty($idSelect))) {         
			$idSelect = $tbObjets[0]->identifiant;    
			// alors $idSelect est l'identifiant du premier objet du tableau     
		}
		echo '<select name='.$name.' id='.$name.' size='.$size.' >';

		foreach ($tbObjets as $objet) {         
			// l'élément en paramètre est présélectionné         
			if ($objet->identifiant != $idSelect) { 
				// si l'identifiant de l'objet n'est pas l'identifiant présélectionné             
				echo '<option value='.$objet->identifiant.'>'.$objet->libelle.'</option>';
			}          
			else {             
				echo '<option selected value='.$idSelect.'>'.$objet->libelle.'</option>';
			}
		}
		echo '</select>';
		return ($idSelect);  
	}

	function afficherListeMultiple($tbObjets, $name, $size, $idSelect) {     
		// si $tbObjets est non vide et $idSelect est non vide     
		if (count($tbObjets) && (empty($idSelect))) {         
			$idSelect = $tbObjets[0]->identifiant;    
			// alors $idSelect est l'identifiant du premier objet du tableau     
		}
		echo '<select name="'.$name.'[]" id="'.$name.'[]" size='.$size.' multiple>';

		foreach ($tbObjets as $objet) {         
			// l'élément en paramètre est présélectionné         
			if ($objet->identifiant != $idSelect) { 
				// si l'identifiant de l'objet n'est pas l'identifiant présélectionné             
				echo '<option value='.$objet->identifiant.'>'.$objet->libelle.'</option>';
			}          
			else {             
				echo '<option selected value='.$idSelect.'>'.$objet->libelle.'</option>';
			}
		}
		echo '</select>';
		return ($idSelect);  
	}
?>