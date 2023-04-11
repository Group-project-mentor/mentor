let msgMain = document.getElementById("message-main");
let messageContent = document.getElementById("message-content");
let closeBtn = document.getElementById("close-btn");
let AlertTxt = document.getElementById("right-alert-text");
let a;
closeBtn.addEventListener("click", () => {
    messageContent.classList.add("message-hide");
    clearInterval(a);
});

const activeMsg = () => {
    messageContent. classList . remove('message-hide');
    if(a)  clearInterval(a);
    a = setInterval(()=>{
        messageContent. classList . add('message-hide');
    },5000)
}

const makeSuccess = (text) => {
    messageContent.classList.remove('message-error');
    messageContent.classList.add('message-ok');
    AlertTxt.classList.remove('message-red');
    AlertTxt.textContent = text;
    AlertTxt.classList.add('message-green');
    if(a)  clearInterval(a);
    activeMsg();
}

const makeError = (text) => {
    messageContent.classList.remove('message-ok');
    messageContent.classList.add('message-error');
    AlertTxt.classList.remove('message-green');
    AlertTxt.textContent = text;
    AlertTxt.classList.add('message-red');
    if(a)  clearInterval(a);
    activeMsg();
}
