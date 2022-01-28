<?php
require_once'./includes/nav.php'
?>

<h1>GameLib</h1>

<?php

$files = glob('./includes/*.inc.php');
$page = $_GET['page'] ?? 'home';

$pageTest = './includes/' .$page. '.inc.php';

if (!in_array($pageTest, $files)){
  require_once './includes/home.inc.php';
}
else{
  require_once $pageTest;
}




