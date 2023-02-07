let delConfMsg = document.getElementById("delConfMsg");
let cancelDel = document.getElementById("cancelDel");
let delBtn = document.getElementById("delBtn");

const BaseUrl = "http://localhost/mentor/";

function delConfirm (id, no){
    let type = '';
    switch (no) {
        case 1:
            type = "video";  
            break;
        case 2:
            type = "quiz"; // todo 
            break;
        case 3:
            type = "pastpaper"; // todo
            break;
        case 4:
            type = "document";
            break;
        case 5:
            type = "other";
            break;
    }
    delBtn.href = `${BaseUrl}rcDelete/${type}/${id}`;
    delConfMsg.classList.remove("hidden");
    delConfMsg.classList.add("message-area");
    console.log(delBtn.href);

}

cancelDel.addEventListener('click',()=>{
    delConfMsg.classList.remove("message-area");
    delConfMsg.classList.add("hidden");
});
