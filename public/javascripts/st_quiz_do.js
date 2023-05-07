let questionNo = document.getElementById('question-number');
let questionName = document.getElementById('question-name');
let questionImg = document.getElementById('question-img');
let answerSet = document.getElementById('answer-set');
// let backBtn = document.getElementById('back-btn');
let nextBtn = document.getElementById('next-btn');
let quizProgress = document.getElementById('quiz-progress');

let currentQuestion =0 ;
let questions = 0 ;
let user_score = 0 ;

//result table ekata quizid , userid ekai dila record count > 0 ;

//record count > 0 ----->  current_question = 0
// status ---> 0 --- partialy ----->  currect question,total 
//status ---> 1 ----> Now allowed  --> display a div of back



fetch(`${baseURL}st_quizPreview/getQuestion/${quizId}`)
    .then(response => {
        if (!response.ok) {
            throw new Error(response.statusText); // Throw error with status text
        }
        return response.json(); // Return response data if everything is fine
    })
    .then(data => {
        if(data.end === 1) {
            console.log("end");
            window.location.href = `${baseURL}st_courses`;
        }else {
            console.log(data);
            user_score = data.total;
            currentQuestion = data.current_q;
            render(data);
            console.log(user_score,currentQuestion);
        }

        
        // currenQuestion & 
    })
    .catch(err => console.error('Error:', err)); // Log the error message to console




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

    let option;


    data.Answers.forEach(answer => {
        ansCount++;

        option = `<div class='option' data-answer=${answer[3]}>${answer[2]}</div>`
        answerSet.innerHTML += option;
    });

    let options = answerSet.querySelectorAll('.option');

    for(let i=0; i < options.length ; i++){
        options[i].setAttribute('onclick','optionSelected(this)');
    }

    quizProgress.value = currentQuestion/questions;
    btnActiveFunction();
}


window.optionSelected = function(answer){
    let  correct = answer.getAttribute('data-answer');

    let all_options = answerSet.children.length;
    if(correct == 1){
        answer.style.background = 'green';
        user_score ++;
        console.log(user_score);
    }else{
        answer.style.background = 'red';
        for (let i = 0 ; i < all_options ; i++){
            if(answerSet.children[i].getAttribute('data-answer')==1){
                answerSet.children[i].style.background = 'green';
            }
        }
    }
}

// User Answers , Total , An

// const generateAnswer = (answer,ansCount) => {
//     let ans = '';

//     if(answer[3]) ans = `<div class="quiz-preview-answer quiz-preview-answer-correct">`
//     else ans = `<div class="quiz-preview-answer">`;

//     ans += `${ansCount}. ${answer[2]}`;

//     if (answer[4]==='') ans += `</div>`;
//     else ans += `<img src='${answer[4]}' alt=""></div>`;

//     return ans;
// }

nextBtn.addEventListener('click',()=>{
    if(currentQuestion<questions){
        currentQuestion++;
        fetch(`${baseURL}st_quizPreview/getNextQuestion/${quizId}/${currentQuestion-1}/${user_score}`)
            .then(response => response.json())
            .then(data => {
                if(data.end === 1){
                    console.log("end");
                    window.location.href = `${baseURL}st_courses`;
                }else{
                    console.log(data)
                    user_score = data.total;
                    currentQuestion = data.current_q;
                    render(data);
                }

            })
            // .catch(err => console.log(err));
        btnActiveFunction();
    }
    else {

    }
})

// backBtn.addEventListener('click',()=>{
//     if(currentQuestion>1){
//         currentQuestion--;
//         fetch(`${baseURL}quizPreview/getQuestion/${quizId}/${currentQuestion-1}`)
//             .then(response => response.json())
//             .then(data => {
//                 render(data);
//             })
//             .catch(err => console.log(err));
//         btnActiveFunction();
//     }
//     else {
//
//     }
// });

const btnActiveFunction = () => {
    // backBtn.disabled = currentQuestion === 1;
    nextBtn.disabled = currentQuestion === questions;
}

const progressBarAnimation = () => {
    let previous = quizProgress.value;
    for (let i = previous/questions; i < currentQuestion/questions; i=i+0.01) {
        setTimeout(()=>{},1000);
        quizProgress.value = i;
    }
}

