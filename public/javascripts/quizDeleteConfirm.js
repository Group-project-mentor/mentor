let delConfMsg = document.getElementById("delConfMsg");
let cancelDel = document.getElementById("cancelDel");
let delBtn = document.getElementById("delBtn");

//! BASEURL
const BaseUrl = "http://localhost/mentor/";

function delConfirm (quiz_id, question_num, no){
    let type = '';
    switch (no) {
        case 1:
            type = "delQuestion";
            break;
        case 2:
            type = "delAnswer"; // todo
            break;
    }
    delBtn.href = `${BaseUrl}quiz/${type}/${quiz_id}/${question_num}`;
    delConfMsg.classList.remove("hidden");
    delConfMsg.classList.add("message-area");
    console.log(delBtn.href);

}

cancelDel.addEventListener('click',()=>{
    delConfMsg.classList.remove("message-area");
    delConfMsg.classList.add("hidden");
});
