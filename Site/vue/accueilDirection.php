<?php
session_start();
if (!(isset($_SESSION['id_direction']))){
    //header('Location: ../index.php');
}
require_once '../src/bdd/BDD.php';
require_once '../src/modele/Php_Table.php';
require_once '../src/modele/compte/Compte.php';
require_once '../src/modele/compte/Etudiant.php';
require_once '../src/modele/compte/Professeur.php';
require_once '../src/modele/Cours.php';
require_once '../src/modele/Classe.php';
require_once '../src/modele/Matiere.php';
$bdd = new BDD();
$etudiant = new Etudiant(array());
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Notenote - Accueil</title>
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
    <script src="../vendor/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="../vendor/datatables.min.css">
    <script type="text/javascript" charset="utf8" src="../vendor/datatables.min.js"></script>
    <link href="../vendor/select2-4.0.13/dist/css/select2.min.css" rel="stylesheet">
    <script type="text/javascript" charset="utf8" src="../vendor/select2-4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#listeEtudiant').DataTable();
        });
    </script>
</head>
<body>
<nav>
    <h3 class="title"><a href="../index.php">Notenote</a></h3>
</nav>
<div class="vue">
    <div class="section gauche">
        <div class="wrapper">
            <table id="listeEtudiant" class="display">
                <thead>
                    <tr>
                        <td>Id Etudiant</td>
                        <td>Prenom</td>
                        <td>Nom</td>
                        <td>Classe</td>
                    </tr>
                </thead>
                <tr>
                <?php
                    foreach ($etudiant->afficher($bdd) as $etudiants) {
                        echo "<tr>";
                        $classe = new Classe(array(
                                "id_Classe"=>$etudiants['ref_classe']
                        ));
                        $classe = $classe->rechercher($bdd);
                        echo "<td>" . $etudiants['id_etudiant'] . "</td>
                        <td>" . $etudiants['nom'] . "</td>
                        <td>" . $etudiants['prenom'] . "</td>
                        <td>" . $etudiants['mail'] . "</td>
                        <td>" . $classe['nom'] . "</td>";
                        echo "</tr>";
                    }
                ?>

            </table>
        </div>
    </div>
    <div class="section droite">
        <form method="post" action="../src/traitrement/dirige/ajout.php">
            <select id="selectProfesseur" name="ref_professeur">
                <?php
                    $professeur = new Professeur(array());
                    foreach ($professeur->afficher($bdd) as $professeurs){
                        echo "<option value='".$professeurs['id_professeur']."'>".$professeurs['prenom']." ".$professeurs['nom']."</option>";
                    }
                ?>
            </select>
            <select id="selectCours" name="ref_cours">
                <?php
                $cours = new Cours(array());
                foreach ($cours->afficher($bdd) as $courss){
                    $classe = new Classe(array(
                        "id_Classe"=>$courss['ref_classe']
                    ));
                    $classe = $classe->rechercher($bdd);
                    $matiere = new Matiere(array(
                        "id_Matiere"=>$courss['ref_matiere']
                    ));
                    $matiere = $matiere->rechercher($bdd);
                    echo "<option value='".$courss['id_cours']."'>".$courss['date']." - de ".$courss['heure_debut']." à ".$courss['heure_fin']." - Matière : ".$matiere['nom']." Classe : ".$classe['nom']."</option>";
                }
                ?>
            </select>
            <input type="submit" value="Assimiler ce prof à ce cours">
        </form>
    </div>
</div>
<section>
    <div>
        <form method="post" action="../src/traitrement/etudiant/ajout.php">
            Ajout Etudiant :
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="prenom" placeholder="Prenom">
            <input type="text" name="mail" placeholder="Mail">
            <input type="text" name="mdp" placeholder="Mot De Passe">
            <select name="ref_classe">
                <?php
                    $classe = new Classe(array());
                    foreach ($classe->afficher($bdd) as $classes){
                        echo "<option value='".$classes['id_classe']."'>".$classes['nom']."</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Ajouter Etudiant">
        </form>
    </div>
    <div>
        <form method="post" action="../src/traitrement/professeur/ajout.php">
            Ajout Professeur :
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="prenom" placeholder="Prenom">
            <input type="text" name="mail" placeholder="Mail">
            <input type="text" name="mdp" placeholder="Mot De Passe">
            <input type="submit" value="Ajouter Professeur">
        </form>
    </div>
    <div>
        <form method="post" action="../src/traitrement/direction/ajout.php">
            Ajout Direction :
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="prenom" placeholder="Prenom">
            <input type="text" name="mail" placeholder="Mail">
            <input type="text" name="mdp" placeholder="Mot De Passe">
            <input type="submit" value="Ajouter Direction">
        </form>
    </div>
    <div>
        <form method="post" action="../src/traitrement/classe/ajout.php">
            Ajout Classe :
            <input type="text" name="nom" placeholder="Nom">
            <input type="submit" value="Ajouter Classe">
        </form>
    </div>
    <div>
        <form method="post" action="../src/traitrement/matiere/ajout.php">
            Ajout Matière :
            <input type="text" name="nom" placeholder="Nom">
            <input type="submit" value="Ajouter Matière">
        </form>
    </div>
    <div>
        <form method="post" action="../src/traitrement/cours/ajout.php">
            Ajout Cours :
            <input type="date" name="date">
            <label>Heure de debut
                <input type="time" name="heure_debut">
            </label>
            <label>Heure de fin
                <input type="time" name="heure_fin">
            </label>
            <select name="ref_classe">
                <?php
                $classe = new Classe(array());
                foreach ($classe->afficher($bdd) as $classes){
                    echo "<option value='".$classes['id_classe']."'>".$classes['nom']."</option>";
                }
                ?>
            </select>
            <select name="ref_matiere">
                <?php
                $matiere = new Matiere(array());
                foreach ($matiere->afficher($bdd) as $matieres){
                    echo "<option value='".$matieres['id_matiere']."'>".$matieres['nom']."</option>";
                }
                ?>
            </select>
            <input type="submit" value="Ajouter Cours">
        </form>
    </div>
</section>
</body>
</html>
