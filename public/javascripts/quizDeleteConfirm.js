let delConfMsg = document.getElementById("delConfMsg");
let cancelDel = document.getElementById("cancelDel");
let delBtn = document.getElementById("delBtn");

//! BASEURL
const BaseUrl = "http://localhost/mentor/";

function delConfirm (quiz_id, question_num, no, ans_id = 0){
    let type = '';
    switch (no) {
        case 1:
            type = "delQuestion";
            delBtn.href = `${BaseUrl}quiz/${type}/${quiz_id}/${question_num}`;
            break;
        case 2:
            type = "delAnswer"; // todo
            delBtn.href = `${BaseUrl}quiz/${type}/${quiz_id}/${question_num}/${ans_id}`;
            break;
    }
    delConfMsg.classList.remove("hidden");
    delConfMsg.classList.add("message-area");
    console.log(delBtn.href);

}

cancelDel.addEventListener('click',()=>{
    delConfMsg.classList.remove("message-area");
    delConfMsg.classList.add("hidden");
});
