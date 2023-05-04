const converter = (val, btn) => {
    if(val < 1000)
        return Math.round(btn.files[0].size)+" B";
    else if(val/1024 < 1000)
        return Math.round((btn.files[0].size)/1024)+" KB";
    else if(val/(1024*1024) < 1000)
        return Math.round((btn.files[0].size)/(1024*1024))+" MB";
}



let inputBtn = document.getElementById('inputBtn');
let tab = document.getElementsByClassName('tp-tab');
let tabCont = document.getElementsByClassName('tab-container');
let answerInput = document.getElementById('answerInput');

document.getElementById('fileName').textContent = (document.getElementById('fileName').textContent) ? document.getElementById('fileName').textContent.slice(0,20)+"..." : 'no files selected';
document.getElementById('fileSize').textContent = (document.getElementById('fileName').textContent) ? converter(document.getElementById('fileName').textContent) : ' ';

inputBtn.addEventListener('change',()=>{
    document.getElementById('fileName').textContent = (inputBtn.files[0].name) ? inputBtn.files[0].name.slice(0,20)+"..." : 'no files selected';
    document.getElementById('fileSize').textContent = (inputBtn.files[0].size) ? converter(inputBtn.files[0].size,inputBtn) : ' ';
});

answerInput.addEventListener('change',()=>{
    document.getElementById('fileNameA').textContent = (answerInput.files[0].name) ? answerInput.files[0].name.slice(0,20)+"..." : 'no files selected';
    document.getElementById('fileSizeA').textContent = (answerInput.files[0].size) ? converter(answerInput.files[0].size,answerInput) : ' ';
});

// ? Tab - containers handler
for (let j = 1; j < tabCont.length; j++) {
    tabCont[j].style.display = 'none';
    tab[j].classList.remove('active');
}

for (let i = 0; i < tab.length; i++){
    tab[i].onclick = () => {
        for (let j = 0; j < tabCont.length; j++) {
            if (i!==j) {
                tabCont[j].style.display = 'none';
                tab[j].classList.remove('active');
            }
        }
        tabCont[i].style.display = 'flex';
        tab[i].classList.add('active');
    }
}

// ? Quiz change form of change quiz button
let quizChangeBtn = document.getElementById("quizChangeBtn");
let quizChangeForm = document.getElementById("quiz-change-form");

quizChangeBtn.onclick = (e) =>{
    e.preventDefault();
    document.getElementById('quizChooser').innerHTML = "";

    fetch(`${BASEURL}rcEdit/getQuizListInfo`)
        .then(response => response.json())
        .then(data => {
            data.forEach(row => {
                document.getElementById('quizChooser').innerHTML +=
                    `<option value="${row[0]}">${row[0]} - ${row[1]}</option>`;
            });
        })
        .catch(err => console.log(err));

    quizChangeForm.style.display = "block";
    quizChangeBtn.style.display = "none";
    document.getElementById("quizEditBtn").style.display = "none";
    document.getElementById("quizUnlinkBtn").style.display = "none";
}

document.getElementById("quizChangeCloseBtn").onclick = (e) =>{
    e.preventDefault();
    quizChangeForm.style.display = "none";
    quizChangeBtn.style.display = "inline";
    document.getElementById("quizEditBtn").style.display = "inline";
    document.getElementById("quizUnlinkBtn").style.display = "inline";
}

document.getElementById('quiz-change-form').onsubmit = (e) =>{
    e.preventDefault();
    let form_data = new FormData(document.getElementById('quiz-change-form'));
    fetch(`${BASEURL}rcEdit/changePPQuiz/${paperId}`,{
        method:'post',
        body:form_data
    })
        .then(result => result.text())
        .then(data => {
            if((data.replace(/\s/g, ''))==="Done"){
                getQuizData(form_data.get('quiz_id'));
            }else{
                console.log(data);
            }
        })
        .catch(err => console.log(err));
}



// ? Quiz Link form in 'no linked' place

let quizChangeForm2 = document.getElementById("quiz-change-form-2");

document.getElementById('newQuizLink').onclick = (e) => {
    e.preventDefault();
    document.getElementById('quizChooser2').innerHTML = "";

    fetch(`${BASEURL}rcEdit/getQuizListInfo`)
        .then(response => response.json())
        .then(data => {
            data.forEach(row => {
                document.getElementById('quizChooser2').innerHTML +=
                    `<option value="${row[0]}">${row[0]} - ${row[1]}</option>`;
            });
        })
        .catch(err => console.log(err));

    quizChangeForm2.style.display = "block";
    document.getElementById('newQuizLink').style.display = "none";
}

document.getElementById("quizChangeCloseBtn2").onclick = (e) =>{
    e.preventDefault();
    quizChangeForm2.style.display = "none";
    document.getElementById('newQuizLink').style.display = "inline";
}

document.getElementById('quiz-change-form-2').onsubmit = (e) =>{
    e.preventDefault();
    let form_data = new FormData(document.getElementById('quiz-change-form-2'));
    fetch(`${BASEURL}rcEdit/changePPQuiz/${paperId}`,{
        method:'post',
        body:form_data
    })
        .then(result => result.text())
        .then(data => {
            if((data.replace(/\s/g, ''))==="Done"){
                location.reload();
            }else{
                console.log(data);
            }
        })
        .catch(err => console.log(err));
}

// ? display the quiz data in linked part
const getQuizData = (qid) => {
    let labels = document.getElementsByClassName('special-label');
    fetch(`${BASEURL}rcEdit/getSpecificQuizInfo/${qid}`)
        .then(response => response.json())
        .then(data => {
            labels[0].textContent = 'Quiz id: ' + data.id;
            labels[1].textContent = 'Name : ' + data.name;
            labels[2].textContent = 'Marks : ' + data.marks;
            quizId = data.id;
        })
        .catch(err => console.log(err));
}
quizId && getQuizData(quizId);

