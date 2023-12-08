/***************************************************************************
 *
 * CHARGEMENT LA LISTE DES QUIZ NON ENCORE PASSÉS
 *
 */
window.addEventListener('load', function (event) {

    fetch('http://localhost:8080/QuizServices_war_exploded/api/QuizApi/listQuizPasser')
        .then((resp) => {
            return resp.json()
        })
        .then((data) => {

            let tabQuiz = document.getElementById('listOldQuiz');
            for (let i = 0; i < data.length; i++) {
                let ligne = document.createElement('tr');

                let TDLigne = document.createElement('td');

                let lienQuiz = document.createElement('a');
                lienQuiz.setAttribute('class', 'btn btn-light w-100 align-middle');
                lienQuiz.setAttribute('onclick', 'afficherQuiz(' + data[i].id + ")");
                lienQuiz.innerHTML = data[i].titre;
                TDLigne.appendChild(lienQuiz);

                ligne.appendChild(TDLigne);

                tabQuiz.appendChild(ligne);
            }
        })
        .catch((error) => {
            console.log(error.toString())
        });
});

/***************************************************************************
 *
 * FUNCTION PASSERQUIZ(ID)
 * CHRGHER UNE PAGE AVEC LES QUESTIONS DU QUIZ SELECTIONNER AVEC SES OPTIONS
 *
 */
function afficherQuiz(idQuiz) {
    window.location.href = "../../../Travail Pratique/QuizApp/reviserQuiz.html#" + idQuiz;
}