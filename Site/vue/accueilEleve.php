<?php
session_start();
if (!(isset($_SESSION['id_etudiant']))){
    header('Location: ../index.php');
}
require_once '../src/bdd/BDD.php';
require_once '../src/modele/Php_Table.php';
require_once '../src/modele/compte/Compte.php';
require_once '../src/modele/compte/Etudiant.php';
require_once '../src/modele/compte/Professeur.php';
require_once '../src/modele/Cours.php';
require_once '../src/modele/Classe.php';
require_once '../src/modele/Matiere.php';
require_once '../src/modele/Devoir.php';
$bdd = new BDD;
$etudiant = new Etudiant(array(
        "id_etudiant"=>$_SESSION['id_etudiant']
));
$etudiant = $etudiant->afficherById($bdd);
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
        <?php
        $cours = new Cours(array(
            "ref_classe"=>$etudiant['ref_classe']
        ));
        foreach ($cours->afficherSpecific($bdd) as $courss){
            $classe = new Classe(array(
                "id_Classe"=>$courss['ref_classe']
            ));
            $classe = $classe->afficherById($bdd);
            $matiere = new Matiere(array(
                "id_Matiere"=>$courss['ref_matiere']
            ));
            $matiere = $matiere->afficherById($bdd);
            echo "<div heure_debut='".date("Hi", strtotime($courss['heure_debut']))."' heure_fin='".date("Hi", strtotime($courss['heure_fin']))."'>";
            echo $courss['date']." - de ".$courss['heure_debut']." à ".$courss['heure_fin']." - Matière : ".$matiere['nom']." Classe : ".$classe['nom']."<br>";
            echo "</div>";
        }
        ?>
        <div class="emploi">
            <div class="cours" id="cours">

            </div>
        </div>
    </div>
    <div class="section droite">
        <?php
            $devoir = new Devoir(array(
                    "ref_classe"=>$etudiant['ref_classe']
            ));
        foreach ($devoir->afficherSpecific($bdd) as $devoirs){
            echo $devoirs['description'];
        }
        ?>
    </div>
</div>
<?php
$cours = new Cours(array(
    "ref_classe"=>$etudiant['ref_classe']
));
foreach ($cours->afficherSpecific($bdd) as $courss){
    $classe = new Classe(array(
        "id_Classe"=>$courss['ref_classe']
    ));
    $classe = $classe->afficherById($bdd);
    $matiere = new Matiere(array(
        "id_Matiere"=>$courss['ref_matiere']
    ));
    $matiere = $matiere->afficherById($bdd);
    echo date("Hi", strtotime($courss['heure_debut']));
    echo " ";
    echo date("Hi", strtotime($courss['heure_fin']));
    echo "<br>";
    echo $courss['date']." - de ".$courss['heure_debut']." à ".$courss['heure_fin']." - Matière : ".$matiere['nom']." Classe : ".$classe['nom']."<br>";
}
?>
<script>
    var heure_debut = 1000/2400*100;
    var heure_fin = (1200-1000)/2400*100
    var cours = document.getElementById('cours')
    cours.style.cssText = 'top: ' + heure_debut + '%; height: ' + heure_fin + '%;'
</script>
</body>
</html>
