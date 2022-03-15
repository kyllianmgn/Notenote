document.addEventListener('DOMContentLoaded', function () {
    const boutonEtudiant = document.getElementById('button-etudiant');
    const boutonProfesseur = document.getElementById('button-professeur');
    const boutonDirection = document.getElementById('button-direction');
    const divEtudiant = document.getElementById('etudiant');
    const divProfesseur = document.getElementById('professeur');
    const divDirection = document.getElementById('direction');

    boutonEtudiant.addEventListener('click',function () {
        divEtudiant.hidden = false;
    });
    boutonProfesseur.addEventListener('click',function () {
        divProfesseur.hidden = false;
    });
    boutonDirection.addEventListener('click',function () {
        divDirection.hidden = false;
    });

    var boutonHide = document.getElementsByClassName('hide')
    for(let i=0;i<boutonHide.length;i++){
        boutonHide[i].addEventListener('click',function () {
            this.parentElement.hidden = true;
        })
    }
});