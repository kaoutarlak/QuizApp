const idQuiz = window.location.hash.substring(1);

/***********************************************************
 *
 * CHARGEMENT LES QUESTIONS DU QUIZ
 *
 ***********************************************************/

window.addEventListener('load', function (event) {

    let service1 = 'http://localhost:8080/QuizServices_war_exploded/api/QuizApi/Quiz/' + idQuiz + '/Questions';

    fetch(service1,)
        .then((resp) => {
            return resp.json();
        })
        .then((questions) => {

            let divQuiz = document.getElementById('quiz');

            for (let i = 0; i < questions.length; i++) {

                let question = document.createElement('h5');
                question.innerHTML = questions[i].enonce;
                question.setAttribute('id', questions[i].id);
                divQuiz.appendChild(question);

                let idQuestion = questions[i].id;
                let service2 = 'http://localhost:8080/QuizServices_war_exploded/api/QuizApi/Questions/' + idQuestion + '/Options';
                let divOptions = document.createElement('div');
                divOptions.setAttribute('class', 'border border-primary');

                fetch(service2,)
                    .then((resp) => {
                        return resp.json();
                    })
                    .then((options) => {
                        for (let j = 0; j < options.length; j++) {
                            let inputRadio = document.createElement('input');
                            inputRadio.setAttribute('type', 'radio');
                            inputRadio.setAttribute('name', questions[i].id);
                            inputRadio.setAttribute('id', options[j].id);

                            divOptions.appendChild(inputRadio);

                            let labelRadio = document.createElement('label');
                            labelRadio.setAttribute('for', options[j].id);
                            labelRadio.innerHTML = options[j].texte;
                            divOptions.appendChild(labelRadio);

                            let br = document.createElement('br');
                            divOptions.appendChild(br);
                        }
                        getReponses();
                        getBonnesReponse();

                    })
                    .catch((error) => {
                        console.log(error.toString());
                    });
                let br = document.createElement('br');
                divQuiz.appendChild(divOptions);
                divQuiz.appendChild(br);
            }

        })
        .catch((error) => {
            console.log(error.toString());
        });

})

/***********************************************************
 *
 * CHARGEMENT LES REPONSES D'UN QUIZ
 *
 ***********************************************************/
function getReponses() {

    let reponses = {
        idOption: [],
        estVrai: []
    };
    let tabOptions = document.querySelectorAll('input[type="radio"]');

    fetch('http://localhost:8080/QuizServices_war_exploded/api/QuizApi/quiz/' + idQuiz + '/reponses')
        .then((resp) => {
            return resp.json();
        })
        .then((data) => {

            for (let i = 0; i < data.length; i++) {
                reponses.idOption.push(data[i].options.id);
                reponses.estVrai.push(data[i].options.estVrai);
            }
            let tailleIDOption = Object.keys(reponses.idOption).length;
            for (let i = 0; i < tailleIDOption; i++) {
                tabOptions.forEach(option => {
                    option.disabled = true;
                    if (reponses.idOption[i] == option.id) {
                        option.checked = true;
                        let idlabelFor = option.id;
                        let label = document.querySelector(`label[for="${idlabelFor}"]`);
                        if (reponses.estVrai[i] == 1) {
                            label.style.color = 'green';
                        } else {
                            label.style.color = 'red';
                        }
                    }
                });
            }

        })
        .catch((error) => {
            console.log(error.toString())
        });

}

/***********************************************************
 *
 * CHARGEMENT LES BONNES REPONSES D'UN QUIZ
 *
 ***********************************************************/
function getBonnesReponse() {

    let tabQuestions = document.querySelectorAll('h5');
    let tabOptions = document.querySelectorAll('input[type="radio"]');
    tabQuestions.forEach(question => {
        let idQuestion = question.id;
        fetch('http://localhost:8080/QuizServices_war_exploded/api/QuizApi/question/' + idQuestion + '/reponse')
            .then((resp) => {
                return resp.json();
            })
            .then((data) => {
                tabOptions.forEach(option => {
                    if (option.id == data.id) {
                        let idlabelFor = option.id;
                        let label = document.querySelector(`label[for="${idlabelFor}"]`);
                        label.style.color = 'green';
                    }
                });
            })
            .catch((error) => {
                console.log(error.toString())
            });
    });

}

/***********************************************************
 *
 * RETOUR A LA PAGE D'ACCUEIL
 *
 ***********************************************************/

function cancelReviserQuiz() {
    document.location.href = "../../../Travail Pratique/QuizApp/index.html";
}


// window.onload = function() {
//     let tabQuestions = document.querySelectorAll('h5');
//     let tabOptions = document.querySelectorAll('input[type="radio"]');
//     let nbQuestion = tabQuestions.length;
//     let nbBonneReponses = 0;
//     tabOptions.forEach(option => {
//         if (option.id == data.id) {
//             let idlabelFor = option.id;
//             let label = document.querySelector(`label[for="${idlabelFor}"]`);
//             if (label.style.color == 'green') {
//                 nbBonneReponses++;
//             }
//         }
//     });
//     document.getElementById('note').innerHTML = 'Note : ' + nbBonneReponses + '/' + nbQuestion;
// };