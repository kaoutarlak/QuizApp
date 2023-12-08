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
                            inputRadio.required = true;
                            divOptions.appendChild(inputRadio);

                            let labelRadio = document.createElement('label');
                            labelRadio.setAttribute('for', options[j].id);
                            labelRadio.innerHTML = options[j].texte;
                            divOptions.appendChild(labelRadio);

                            let br = document.createElement('br');
                            divOptions.appendChild(br);
                        }
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
});

/***********************************************************
 *
 * RETOUR A LA PAGE D'ACCUEIL
 *
 ***********************************************************/

function cancelPassQuiz() {
    document.location.href = "../../../Travail Pratique/QuizApp/index.html";
}

/***********************************************************
 *
 * SOUMETTRE UN QUIZ
 *
 ***********************************************************/

function soumettreQuiz() {

    const tabRadios = document.querySelectorAll('input[type="radio"]');

    for (const radio of tabRadios) {
        if (radio.checked) {
            console.log(radio.id);
            if (radio.checked) {
                let service = 'http://localhost:8080/QuizServices_war_exploded/api/QuizApi/Quiz/' + idQuiz + '/Option/' + radio.id;
                let optionsFetch = {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                };
                fetch(service, optionsFetch)
                    .catch(error => {
                        console.log(error.toString());
                    });
            }
        }
    }
    document.location.href = '../../../Travail Pratique/QuizApp/index.html';

}