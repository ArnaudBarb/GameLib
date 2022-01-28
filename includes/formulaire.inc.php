<?php

if (isset($_POST['frm'])) {
  echo "Formulaire déjà rempli, recommencer?";
} else{
  echo "Merci de remplir le formulaire";
}

include 'frmFormulaire.php';