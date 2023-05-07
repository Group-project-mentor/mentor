let questionNo = document.getElementById('question-number');
let questionName = document.getElementById('question-name');
let questionImg = document.getElementById('question-img');
let answerSet = document.getElementById('answer-set');
let backBtn = document.getElementById('back-btn');
let nextBtn = document.getElementById('next-btn');
let quizProgress = document.getElementById('quiz-progress');

let currentQuestion = 1;
let questions = 0;

fetch(`${baseURL}quizPreview/getQuestion/${quizId}/0`)
    .then(response => response.json())
    .then(data => {
        render(data);
        // console.log(data);
    })
    .catch(err => console.log(err));



const render = (data) => {
    answerSet.innerHTML = '';
    questions = data.noOfQsts;
    let ansCount = 0;

    questionNo.textContent = `Question ${currentQuestion}`;
    if (data.question[4] === '') questionImg.style.display = 'none';
    else {
        questionImg.style.display = 'inline';
        questionImg.src = data.question[4];
    }
    questionName.textContent = data.question[2];
    data.Answers.forEach(answer => {
        ansCount++;
        let ans = generateAnswer(answer, ansCount);
        answerSet.innerHTML += ans;
    });
    quizProgress.value = currentQuestion/questions;
    // progressBarAnimation();
    btnActiveFunction();
}

const generateAnswer = (answer,ansCount) => {
    let ans = '';

    if(answer[3]) ans = `<div class="quiz-preview-answer quiz-preview-answer-correct">`
    else ans = `<div class="quiz-preview-answer">`;

    ans += `${ansCount}. ${answer[2]}`;

    if (answer[4]==='') ans += `</div>`;
    else ans += `<img src='${baseURL}public_resources/quizzes/answers/${gid}/${sid}/${answer[4]}' alt=""></div>`;

    return ans;
}

nextBtn.addEventListener('click',()=>{
    if(currentQuestion<questions){
        currentQuestion++;
        fetch(`${baseURL}quizPreview/getQuestion/${quizId}/${currentQuestion-1}`)
            .then(response => response.json())
            .then(data => {
                render(data);
            })
            .catch(err => console.log(err));
        btnActiveFunction();
    }
    else {

    }
})

backBtn.addEventListener('click',()=>{
    if(currentQuestion>1){
        currentQuestion--;
        fetch(`${baseURL}quizPreview/getQuestion/${quizId}/${currentQuestion-1}`)
            .then(response => response.json())
            .then(data => {
                render(data);
            })
            .catch(err => console.log(err));
        btnActiveFunction();
    }
    else {

    }
});

const btnActiveFunction = () => {
    backBtn.disabled = currentQuestion === 1;
    nextBtn.disabled = currentQuestion === questions;
}

const progressBarAnimation = () => {
    let previous = quizProgress.value;
    for (let i = previous/questions; i < currentQuestion/questions; i=i+0.01) {
        setTimeout(()=>{},1000);
        quizProgress.value = i;
    }
}

