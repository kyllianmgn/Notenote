<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Notenote - Connexion</title>
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<nav>
    <h3><a href="../index.php">Notenote</a></h3>
</nav>
<div class="bloc-mdp">
    <h2>Changer le mot de passe</h2>
    <form method="post" action="src/traitrement/direction/">
        <input class="code" type="text" name="code" placeholder="Rentrez le code reçu par mail">
        <input class="forgotPsw" type="text" name="password" placeholder="Rentrer votre nouveau mot de passe">
        <br>
        <input type="submit" value="Changer mon mot de passe">
    </form>
</div>
</body>
</html>
