<?php
session_start();
if (!(isset($_SESSION['id_etudiant']))){
    header('Location: ../index.php');
}
var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Notenote - Accueil</title>
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<nav>
    <h3>Notenote</h3>
</nav>
</body>
</html>
