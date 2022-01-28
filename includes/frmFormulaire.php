<form action="index.php?page=formulaire" method="post">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" value="<?php echo $nom;?>" /> <br />

    <label for="prenom">Prenom :</label>
    <input type="text" name="prenom" id="prenom" value="<?php echo $prenom;?>" /><br />

    <label for="email">e-mail :</label>
    <input type="text" name="email" id="email" value="<?php echo $email;?>" /><br />

    <label for="password">Mot de Passe</label>
    <input type="password" name="motDePasse" id="motDePasse" /><br />

    <label for="password">Confirmer mot de Passe :</label>
    <input type="password" name="confirmerMotDePasse" id="confirmerMotDePasse" /><br />

    <input type="reset" value="Effacer"> 
    <input type="submit" value="Valider le formulaire">
    <input type="hidden" name="frm" />
</form>


