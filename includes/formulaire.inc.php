<?php
//traitement pour le remplissage du fomulaire
if (isset($_POST['frm'])) {
  //Appel des variables pour remplir le fomrulaire; trim pour enlever les espaces dans le formulaire
  $nom = trim($_POST['nom']) ?? '';
  $prenom = trim($_POST['prenom']) ?? '';
  $email = trim($_POST['email']) ?? '';
  $motDePasse = $_POST['motDePasse'] ?? '';
  $confirmerMotDePasse = $_POST['confirmerMotDePasse'] ?? '';

//création d'un tableau vide afin de récupérer les données du formulaire, sert à traiter les occurences vides
  $erreur = array();
//Condition pour vérifier le remplissage des champs; insertion d'un message d'erreur pour les champs vides
    if(strlen($nom) === 0)
      array_push($erreur, "Veuillez saisir votre nom");

    elseif(!ctype_alpha($nom))
      array_push($erreur, "Veuillez saisir des caractères alphabétiques");

    if(strlen($prenom) === 0)
      array_push($erreur, "Veuillez saisir votre prenom");

    elseif(!ctype_alpha($prenom))
      array_push($erreur, "Veuillez saisir des caractères alphabétiques");

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
      array_push($erreur, "Veuillez saisir un e-mail valide");

    if(strlen($motDePasse) === 0)
      array_push($erreur, "Veuillez saisir un mot de passe");

    if(strlen($confirmerMotDePasse) === 0)
      array_push($erreur, "Veuillez confirmer votre mot de passe");

    elseif($confirmerMotDePasse !== $motDePasse)
      array_push($erreur, "Confirmation inexacte, veuillez recommencer svp");
  
    if(count($erreur) === 0){
      echo "traitement du formulaire";
    }
//else= affichage du message d'erreur sous forme de liste dans le cas d'un champ vide
    else{
      //création d'une variable rendant son contenu sous forme de liste
      $messageErreur = "<ul>";
      //création d'une variable pour cibler une erreur précise ("index tableau")
      $i = 0;
      do {
        $messageErreur .= "<li>";
        $messageErreur .= $erreur[$i];
        $messageErreur .= "</li>";
        $i++;
      }

      while($i < count($erreur));

      $messageErreur .="</ul>";
      echo $messageErreur;

      echo password_hash($motDePasse, PASSWORD_BCRYPT);
    }

} else{
  echo "Merci de remplir le formulaire";
  $nom = $prenom = $email = '';
}

include 'frmFormulaire.php';