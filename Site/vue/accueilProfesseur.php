<?php
session_start();
if (!(isset($_SESSION['id_professeur']))){
    //header('Location: ../index.php');
}
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
<div class="vue">
    <div class="section gauche">
    </div>
    <div class="section droite">
    </div>
</div>

</body>
</html>
