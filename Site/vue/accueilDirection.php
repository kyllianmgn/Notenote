<?php
session_start();
if (!(isset($_SESSION['id_direction']))){
    //header('Location: ../index.php');
}
require_once '../src/bdd/BDD.php';
require_once '../src/modele/Php_Table.php';
require_once '../src/modele/compte/Compte.php';
require_once '../src/modele/compte/Etudiant.php';
$bdd = new BDD();
$etudiant = new Etudiant(array());
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Notenote - Accueil</title>
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#listeEleve').DataTable();
        });
    </script>
</head>
<body>
<nav>
    <h3>Notenote</h3>
</nav>
<div class="vue">
    <div class="section gauche">
        <div class="wrapper">
            <table id="listeEtudiant" class="display">
                <tr>
                    <td>Id Etudiant</td>
                    <td>Prenom</td>
                    <td>Nom</td>
                    <td>Classe</td>
                </tr>
                <tr>
                <?php
                    foreach ($etudiant->afficher($bdd) as $etudiants) {
                        echo "<td>" . $etudiants['id_etudiant'] . "</td>
                        <td>" . $etudiants['date_depart'] . "</td>
                        <td>" . $etudiants['heure_depart'] . "</td>
                        <td>" . $etudiants['heure_arrivee'] . "</td>";
                    }
                ?>
                </tr>
            </table>
        </div>
    </div>
    <div class="section droite">
    </div>
</div>
</body>
</html>
