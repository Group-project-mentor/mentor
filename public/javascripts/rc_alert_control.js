let delConfMsg = document.getElementById("delConfMsg");
let cancelDel = document.getElementById("cancelDel");
let delBtn = document.getElementById("delBtn");

const BaseUrl = "http://localhost/mentor-interim/";

function delConfirm (id, no){
    let type = '';
    switch (no) {
        case 1:
            type = "video";
            break;
        case 2:
            type = "quiz";
            break;
        case 3:
            type = "pastpaper";
            break;
        case 4:
            type = "document";
            break;
        case 5:
            type = "other";
            break;
    }
    delBtn.href = `${BaseUrl}delete/${type}/${id}`;
    delConfMsg.classList.remove("hidden");
    delConfMsg.classList.add("message-area");
    console.log(delBtn.href);

}

cancelDel.addEventListener('click',()=>{
    delConfMsg.classList.remove("message-area");
    delConfMsg.classList.add("hidden");
});
