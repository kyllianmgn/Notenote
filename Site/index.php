<?php
session_start();
session_destroy();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Notenote - Connexion</title>
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript" src="assets/js/connexion.js"></script>
</head>
<body>
    <nav>
        <h3>Notenote</h3>
    </nav>
    <div class="bloc-connexion">
        <h2>Connexion à Notenote</h2>
        <button id="button-etudiant">Etudiant</button>
        <button id="button-professeur">Professeur</button>
        <button id="button-direction">Direction</button>
        <div hidden class="inner-bloc" id="etudiant">
            <button class="hide">Retour</button>
            <h2>Eleve</h2>
            <form method="post" action="src/traitrement/etudiant/connexion.php">
                <input type="text" name="mail" placeholder="Mail">
                <br>
                <input type="password" name="mdp" placeholder="Mot De Passe">
                <br>
                <input type="submit" value="Se Connecter">
            </form>
        </div>
        <div hidden class="inner-bloc" id="professeur">
            <button class="hide">Retour</button>
            <h2>Professeur</h2>
            <form method="post" action="src/traitrement/professeur/connexion.php">
                <input type="text" name="mail" placeholder="Mail">
                <br>
                <input type="password" name="mdp" placeholder="Mot De Passe">
                <br>
                <input type="submit" value="Se Connecter">
            </form>
        </div>
        <div hidden class="inner-bloc" id="direction">
            <button class="hide">Retour</button>
            <h2>Direction</h2>
            <form method="post" action="src/traitrement/direction/connexion.php">
                <input type="text" name="mail" placeholder="Mail">
                <br>
                <input type="password" name="mdp" placeholder="Mot De Passe">
                <br>
                <input type="submit" value="Se Connecter">
            </form>
        </div>
    </div>
</body>
</html>
