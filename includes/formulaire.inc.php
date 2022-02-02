<?php
//traitement pour le remplissage du fomulaire
if (isset($_POST['frm'])) {
  //Appel des variables pour remplir le fomrulaire; trim pour enlever les espaces dans le formulaire
  //html entities sert à éviter les injections de code (attaques )
  $nom = htmlentities(trim($_POST['nom'])) ?? '';
  $prenom = htmlentities(trim($_POST['prenom'])) ?? '';
  $email = htmlentities(trim($_POST['email'])) ?? '';
  $motDePasse = htmlentities(trim($_POST['motDePasse'])) ?? '';
  $confirmerMotDePasse = htmlentities(trim($_POST['confirmerMotDePasse'])) ?? '';

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
      $serverName = "localhost";
      $userName = "root";
      $database = "exercice";
      $userPassword = "";

      try{
        $conn = new PDO("mysql:host=$serverName;dbname=$database", $userName, $userPassword);
        echo "connexion ok";
      }
      catch(PDOException $e){
        die("Erreur : " . $e->getMessage());
      }

// sert à faire une insertion multiple
    $conn->begintransaction();
//insertion dans un buffer en vue de l'insertion dans la base de données
      $sql1 = "INSERT INTO utilisateurs(id_utilisateurs, nom, prenom, mail, mdp)
      VALUES ('', 'DURAND', 'Michel', 'michel@durand.com', '1234')";
            $conn->exec($sql1);
      $sql2 = "INSERT INTO utilisateurs(id_utilisateurs, nom, prenom, mail, mdp)
      VALUES ('', 'DUPOND', 'René', 'renedu27@gmail.com', 'bibiche')";
            $conn->exec($sql2);
//sert à insérer tous les éléments dans la bdd
    $conn->commit();
//ferme le déroulement du script si tout est ok
    $conn = null;

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

      echo password_hash($motDePasse, PASSWORD_DEFAULT);
    }

} else{
  echo "Merci de remplir le formulaire";
  $nom = $prenom = $email = '';
}

include 'frmFormulaire.php';