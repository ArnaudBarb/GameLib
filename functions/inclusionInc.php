<?php

function inclusionInc(string $value) : void
{
    $files = glob('./includes/*.inc.php');
    $page = $_GET['page'] ?? $value;

    $pageTest = './includes/' .$page. '.inc.php';

    if (!in_array($pageTest, $files)){
        require_once './includes/' .$value. '.inc.php';
    }
    else{
        require_once $pageTest;
    }
}