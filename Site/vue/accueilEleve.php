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
require_once '../src/modele/Dirige.php';
$bdd = new BDD;
$etudiant = new Etudiant(array(
        "id_etudiant"=>$_SESSION['id_etudiant']
));
$etudiant = $etudiant->rechercher($bdd);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Notenote - Accueil</title>
    <link type="text/css" rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<nav>
    <h3><a href="../index.php">Notenote</a></h3>
</nav>
<div class="vue">
    <div class="section gauche">
        <div class="emploi-du-temps">
            <?php
            $mesCours = array();
            $monCours = array();
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

                $dirige = new Dirige(array(
                    "ref_Cours"=>$courss['id_cours']
                ));
                $dirige = $dirige->afficherByCours($bdd);

                if ($dirige){
                    $professeur = new Professeur(array(
                        "id_professeur"=>$dirige['ref_professeur']
                    ));
                    $professeur = $professeur->afficherById($bdd);
                }else{
                    $professeur = null;
                }

                $monCours["jour"] = date('w', strtotime($courss['date']));
                $monCours["heure_debut"] = date("Hi", strtotime($courss['heure_debut']));
                $monCours["heure_fin"] = date("Hi", strtotime($courss['heure_fin']));
                $monCours["date"] = $courss['date'];
                $monCours['matiere'] = $matiere['nom'];
                if ($dirige){
                    $monCours['professeur'] = $professeur['nom'];
                }else{
                    $monCours['professeur'] = null;
                }
                $check = false;

                array_push($mesCours,$monCours);
            }
            ?>
            <div class="jour-wrapper">
                <p>Lundi</p>
            <div class="lundi jour">
                <?php
                    foreach ($mesCours as $monCours){
                        if ($monCours['jour']=='1' && $monCours['professeur']!=null){
                            echo "<div class='cours' heure_debut='".$monCours['heure_debut']."' heure_fin='".$monCours['heure_fin']."' jour='".$monCours['date']."'>"."Matière : ".$monCours['matiere']."<br> Professeur : ".$monCours['professeur']."<br> Début : ".$monCours['heure_debut']." Fin : ".$monCours['heure_fin']."</div>";
                        }
                    }
                ?>
            </div>
            </div>
            <div class="jour-wrapper">
                <p>Mardi</p>
            <div class="mardi jour">
                <?php
                foreach ($mesCours as $monCours){
                    if ($monCours['jour']=='2' && $monCours['professeur']!=null){

                        echo "<div class='cours' heure_debut='".$monCours['heure_debut']."' heure_fin='".$monCours['heure_fin']."' jour='".$monCours['date']."'>"."Matière : ".$monCours['matiere']."<br> Professeur : ".$monCours['professeur']."<br> Début : ".$monCours['heure_debut']." Fin : ".$monCours['heure_fin']."</div>";
                    }
                }
                ?>
            </div>
            </div>
            <div class="jour-wrapper">
                <p>Mercredi</p>
            <div class="mercredi jour">
                <?php
                foreach ($mesCours as $monCours){
                    if ($monCours['jour']=='3' && $monCours['professeur']!=null){
                        echo "<div class='cours' heure_debut='".$monCours['heure_debut']."' heure_fin='".$monCours['heure_fin']."' jour='".$monCours['date']."'>"."Matière : ".$monCours['matiere']."<br> Professeur : ".$monCours['professeur']."<br> Début : ".$monCours['heure_debut']." Fin : ".$monCours['heure_fin']."</div>";
                    }
                }
                ?>
            </div>
            </div>
            <div class="jour-wrapper">
                <p>Jeudi</p>
                <div class="jeudi jour">
                    <?php
                    foreach ($mesCours as $monCours){
                        if ($monCours['jour']=='4' && $monCours['professeur']!=null){
                            echo "<div class='cours' heure_debut='".$monCours['heure_debut']."' heure_fin='".$monCours['heure_fin']."' jour='".$monCours['date']."'>"."Matière : ".$monCours['matiere']."<br> Professeur : ".$monCours['professeur']."<br> Début : ".$monCours['heure_debut']." Fin : ".$monCours['heure_fin']."</div>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="jour-wrapper">
                <p>Vendredi</p>
                <div class="vendredi jour">
                    <?php
                    foreach ($mesCours as $monCours){
                        if ($monCours['jour']=='5' && $monCours['professeur']!=null){
                            echo "<div class='cours' heure_debut='".$monCours['heure_debut']."' heure_fin='".$monCours['heure_fin']."' jour='".$monCours['date']."'>"."Matière : ".$monCours['matiere']."<br> Professeur : ".$monCours['professeur']."<br> Début : ".$monCours['heure_debut']." Fin : ".$monCours['heure_fin']."</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="section droite">
        <?php
            $devoir = new Devoir(array(
                    "ref_classe"=>$etudiant['ref_classe']
            ));
        foreach ($devoir->afficherSpecific($bdd) as $devoirs){
            $professeur = new Professeur(array(
                "id_professeur"=>$devoirs['ref_professeur']
            ));
            $professeur = $professeur->afficherById($bdd);
            $matiere = new Matiere(array(
                "id_matiere"=>$devoirs['ref_matiere']
            ));
            $matiere = $matiere->afficherById($bdd);
            echo "'".$devoirs['description']."' donnée par ".$professeur['nom']." pour la matière ".$matiere['nom'];
        }
        ?>
    </div>
</div>
<script>

    var cours = document.getElementsByClassName('cours')
    for(var i = 0; i < cours.length; i++){
        var bloc = cours[i];
        var debut = bloc.getAttribute('heure_debut');
        var fin = bloc.getAttribute('heure_fin');
        var heure_debut = debut/2400*100;
        var heure_fin = (fin-debut)/2400*100
        console.log(heure_debut, heure_fin)
        bloc.style.cssText = 'top: ' + heure_debut + '%; height: ' + heure_fin + '%;'
    }
</script>
</body>
</html>
