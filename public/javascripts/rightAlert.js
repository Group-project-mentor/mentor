let msgMain = document.getElementById("message-main");
let messageContent = document.getElementById("message-content");
let closeBtn = document.getElementById("close-btn");
let AlertTxt = document.getElementById("right-alert-text");
let a;

msgMain.style.zIndex = "-1";

// ? close button event listener
closeBtn.addEventListener("click", () => {
    messageContent.classList.add("message-hide");
    clearInterval(a);
});

// ? message visible for 5 seconds
const activeMsg = () => {
    messageContent. classList . remove('message-hide');
    msgMain.style.zIndex = "30";
    if(a)  clearInterval(a);
    a = setInterval(()=>{
        messageContent. classList . add('message-hide');
        msgMain.style.zIndex = "-1";
    },5000)
}

// ? showing msg is a success
const makeSuccess = (text) => {
    msgMain.style.zIndex = "30";
    messageContent.classList.remove('message-error');
    messageContent.classList.add('message-ok');
    AlertTxt.classList.remove('message-red');
    AlertTxt.textContent = text;
    AlertTxt.classList.add('message-green');
    if(a)  clearInterval(a);
    activeMsg();
}

// ? showing msg is an error
const makeError = (text) => {
    msgMain.style.zIndex = "30";
    messageContent.classList.remove('message-ok');
    messageContent.classList.add('message-error');
    AlertTxt.classList.remove('message-green');
    AlertTxt.textContent = text;
    AlertTxt.classList.add('message-red');
    if(a)  clearInterval(a);
    activeMsg();
}
