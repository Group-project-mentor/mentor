let questionNo = document.getElementById('question-number');
let questionName = document.getElementById('question-name');
let questionImg = document.getElementById('question-img');
let answerSet = document.getElementById('answer-set');
let nextBtn = document.getElementById('next-btn');
let quizProgress = document.getElementById('quiz-progress');
let qcorrect = document.getElementById('currect-question');
let qmarks = document.getElementById('current-marks');

let currentQuestion = 0;
let questions = 0;
let user_score = 0;


fetch(`${baseURL}st_quizPreview/getQuestion/${quizId}`)
    .then(response => {

        if (!response.ok) {
            throw new Error(response.statusText); // Throw error with status text
        }
        return response.json(); // Return response data if everything is fine
    })
    .then(data => {
        if (data.end === 1) {
            console.log("end");
            window.location.href = `${baseURL}st_public_resources/st_quizzes_do_end`;
        } else {
            console.log(data);
            qcorrect.innerHTML = data.current_q + 1;
            qmarks.innerHTML = data.total;
            user_score = data.total;
            currentQuestion = data.current_q;
            render(data);
            console.log(user_score, currentQuestion);
        }


        // currenQuestion & 
    })
    .catch(err => console.error('Error:', err)); // Log the error message to console




const render = (data) => {
    answerSet.innerHTML = '';
    questions = data.noOfQsts;

    let ansCount = 0;

    console.log(currentQuestion);
    questionNo.textContent = `Question ${currentQuestion + 1}`;



    if (data.question[4] === '') questionImg.style.display = 'none';
    else {
        questionImg.style.display = 'inline';
        questionImg.src = data.question[4];
    }
    questionName.textContent = data.question[2];

    let option;


    data.Answers.forEach(answer => {
        ansCount++;

        option = `<div class='option' data-answer=${answer[3]}>${answer[2]}</div>`
        answerSet.innerHTML += option;
    });

    let options = answerSet.querySelectorAll('.option');

    for (let i = 0; i < options.length; i++) {
        options[i].setAttribute('onclick', 'optionSelected(this)');
    }

    quizProgress.value = currentQuestion / questions;
    btnActiveFunction();
}


window.optionSelected = function (answer) {
    let correct = answer.getAttribute('data-answer');

    let all_options = answerSet.children.length;
    if (correct == 1) {
        answer.style.background = 'green';
        user_score++;
        console.log(user_score);
    } else {
        answer.style.background = 'red';
        for (let i = 0; i < all_options; i++) {
            if (answerSet.children[i].getAttribute('data-answer') == 1) {
                answerSet.children[i].style.background = 'green';
            }
        }
    }
}

nextBtn.addEventListener('click', () => {
    if (currentQuestion < questions) {
        currentQuestion++;
        fetch(`${baseURL}st_quizPreview/getNextQuestion/${quizId}/${currentQuestion - 1}/${user_score}`)
            .then(response => response.json())
            .then(data => {
                if (data.end === 1) {
                    console.log("end");
                    window.location.href = `${baseURL}st_public_resources/st_quizzes_do_end_preview`;
                } else {
                    console.log(data)
                    qcorrect.innerHTML = data.current_q + 1;
                    qmarks.innerHTML = data.total;
                    user_score = data.total;
                    currentQuestion = data.current_q;
                    ;
                    render(data);
                }

            })
        // .catch(err => console.log(err));
        btnActiveFunction();
    }
    else {

    }
})


const btnActiveFunction = () => {
    // backBtn.disabled = currentQuestion === 1;
    nextBtn.disabled = currentQuestion === questions;
}

const progressBarAnimation = () => {
    let previous = quizProgress.value;
    for (let i = previous / questions; i < currentQuestion / questions; i = i + 0.01) {
        setTimeout(() => { }, 1000);
        quizProgress.value = i;
    }
}

