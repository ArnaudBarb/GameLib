<?php
date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, "");

// sert à appeler automatiquement des classes php (objets)
spl_autoload_register(function ($className){
    include './classes/' .$className. 'php';
});

require_once './functions/autoLoadFunction.php';
require_once './includes/head.php';
require_once './includes/main.php';
require_once './includes/footer.php';
