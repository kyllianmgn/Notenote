<?php
session_start();
if (!(isset($_SESSION['id_professeur']))){
    header('Location: ../index.php');
}
require_once '../src/bdd/BDD.php';
require_once '../src/modele/Php_Table.php';
require_once '../src/modele/compte/Compte.php';
require_once '../src/modele/compte/Professeur.php';
require_once '../src/modele/Cours.php';
require_once '../src/modele/Classe.php';
require_once '../src/modele/Matiere.php';
require_once '../src/modele/Dirige.php';
$bdd = new BDD();
$professeur = new Professeur(array(
    "id_professeur"=>$_SESSION['id_professeur']
));
$professeur = $professeur->afficherById($bdd);
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
            $dirige = new Dirige(array(
                    "ref_Professeur"=>$professeur['id_professeur']
            ));
            $dirige = $dirige->afficherByProfesseur($bdd);
            foreach ($dirige as $diriges) {
                $cours = new Cours(array(
                    "id_cours" => $diriges['ref_cours']
                ));
                $cours = $cours->rechercher($bdd);
                $matiere = new Matiere(array(
                    "id_Matiere" => $cours['ref_matiere']
                ));
                $matiere = $matiere->rechercher($bdd);
                $classe = new Classe(array(
                    "id_Classe" => $cours['ref_classe']
                ));
                $classe = $classe->rechercher($bdd);
                $monCours["jour"] = date('w', strtotime($cours['date']));
                $monCours["heure_debut"] = date("Hi", strtotime($cours['heure_debut']));
                $monCours["heure_fin"] = date("Hi", strtotime($cours['heure_fin']));
                $monCours["date"] = $cours['date'];
                $monCours['matiere'] = $matiere['nom'];
                $monCours['classe'] = $classe['nom'];
                array_push($mesCours, $monCours);
            }
            ?>
            <div class="jour-wrapper">
                <p>Lundi</p>
            <div class="lundi jour">
                <?php
                foreach ($mesCours as $monCours){
                    if ($monCours['jour']=='1'){
                        echo "<div class='cours' heure_debut='".$monCours['heure_debut']."' heure_fin='".$monCours['heure_fin']."' jour='".$monCours['date']."'>"."Matière : ".$monCours['matiere']." Classe : ".$monCours['classe']." Début : ".$monCours['heure_debut']." Fin : ".$monCours['heure_fin']."</div>";
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
                    if ($monCours['jour']=='2'){

                        echo "<div class='cours' heure_debut='".$monCours['heure_debut']."' heure_fin='".$monCours['heure_fin']."' jour='".$monCours['date']."'>"."Matière : ".$monCours['matiere']." Classe : ".$monCours['classe']." Début : ".$monCours['heure_debut']." Fin : ".$monCours['heure_fin']."</div>";
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
                    if ($monCours['jour']=='3'){
                        echo "<div class='cours' heure_debut='".$monCours['heure_debut']."' heure_fin='".$monCours['heure_fin']."' jour='".$monCours['date']."'>"."Matière : ".$monCours['matiere']." Classe : ".$monCours['classe']." Début : ".$monCours['heure_debut']." Fin : ".$monCours['heure_fin']."</div>";
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
                    if ($monCours['jour']=='4'){
                        echo "<div class='cours' heure_debut='".$monCours['heure_debut']."' heure_fin='".$monCours['heure_fin']."' jour='".$monCours['date']."'>"."Matière : ".$monCours['matiere']." Classe : ".$monCours['classe']." Début : ".$monCours['heure_debut']." Fin : ".$monCours['heure_fin']."</div>";
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
                    if ($monCours['jour']=='5'){
                        echo "<div class='cours' heure_debut='".$monCours['heure_debut']."' heure_fin='".$monCours['heure_fin']."' jour='".$monCours['date']."'>"."Matière : ".$monCours['matiere']." Classe : ".$monCours['classe']." Début : ".$monCours['heure_debut']." Fin : ".$monCours['heure_fin']."</div>";
                    }
                }
                ?>
            </div>
            </div>
        </div>
    </div>
    <div class="section droite">
        <h2>Ajouter devoir</h2>
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
