<?php
session_start();
if (!(isset($_SESSION['id_professeur']))){
    header('Location: ../index.php');
}
require_once '../src/bdd/BDD.php';
require_once '../src/modele/Php_Table.php';
require_once '../src/modele/compte/Compte.php';
require_once '../src/modele/compte/Professeur.php';
require_once '../src/modele/Classe.php';
require_once '../src/modele/Matiere.php';
$bdd = new BDD();
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
        <form method="post" action="../src/traitrement/devoir/ajout.php">
            <textarea style="resize: vertical; width: 50%; margin: 0 auto;" name="description" placeholder="Description du devoir"></textarea><br>
            <select id="selectProfesseur" name="ref_classe">
                <?php
                $classe = new Classe(array());
                foreach ($classe->afficher($bdd) as $classes){
                    echo "<option value='".$classes['id_classe']."'>".$classes['nom']."</option>";
                }
                ?>
            </select>
            <select id="selectCours" name="ref_matiere">
                <?php
                $matiere = new Matiere(array());
                foreach ($matiere->afficher($bdd) as $matieres){
                    echo "<option value='".$matieres['id_matiere']."'>".$matieres['nom']."</option>";
                }
                ?>
            </select>
            <input type="submit" value="Donner ce devoirs à cette classe">
        </form>
    </div>
</div>

</body>
</html>
