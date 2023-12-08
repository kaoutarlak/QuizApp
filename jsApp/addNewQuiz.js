/***********************************************************
 *
 *
 * AJOUTER UN NOUVEAU QUIZ AVEC DES QUESTIONS ALEATOIREMENT
 *
 */

function addQuizWithQuestions() {

    let intNBQuestionFacile = document.getElementById("nbQuestionsFacile").value;
    let intNBQuestionMoyen = document.getElementById("nbQuestionsMoyen").value;
    let intNBQuestionDifficile = document.getElementById("nbQuestionsDifficile").value;
    let strTitre = document.getElementById("titreQuiz").value;

    let service1 = "http://localhost:8080/QuizServices_war_exploded/api/QuizApi/addNewQuiz/" + strTitre;

    const optionsFetch = {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
    };


    if (strTitre != "" && intNBQuestionFacile != "" && intNBQuestionMoyen != "" && intNBQuestionDifficile != "") {
        fetch(service1, optionsFetch)
            .then(resp => {
                return resp.json();
            })
            .then(data => {
                let intQuizID = data.id;
                let service2 = "http://localhost:8080/QuizServices_war_exploded/api/QuizApi/quiz/" + intQuizID + "/addQuestions/Facile/" + intNBQuestionFacile;
                let service3 = "http://localhost:8080/QuizServices_war_exploded/api/QuizApi/quiz/" + intQuizID + "/addQuestions/Moyen/" + intNBQuestionMoyen;
                let service4 = "http://localhost:8080/QuizServices_war_exploded/api/QuizApi/quiz/" + intQuizID + "/addQuestions/Difficile/" + intNBQuestionDifficile;
                Promise.all([fetch(service2, optionsFetch), fetch(service3, optionsFetch), fetch(service4, optionsFetch)])
                    .then(responses => {
                        alert("Un quiz est bien généré avec " + intNBQuestionFacile + " question facile, " + intNBQuestionMoyen + " question moyenne et " + intNBQuestionDifficile + " question difficile.");
                        window.location.reload();
                    })
                    .catch(error => {
                        console.log(error.toString());
                    });
            })
            .catch(error => {
                console.log(error.toString());
            });


    } else {
        alert("Attention !! Vous devez remplir tout les champs.");
    }

}

function addCancel() {
    document.location.href = "../../../Travail Pratique/QuizApp/index.html";
}