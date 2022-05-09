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
    <h2>Mot de passe oublié</h2>
    <form method="post" action="src/traitrement/professeur/mdpoublie.php">
        <input class="forgotPsw" type="text" name="mail" placeholder="Rentrer votre adresse mail">
        <br>
        <input type="submit" value="Je veux recevoir un mail pour changer mon mot de passe">
    </form>
</div>
</body>
</html>
