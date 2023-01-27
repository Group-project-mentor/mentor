let msgMain = document.getElementById("message-main");
let messageContent = document.getElementById("message-content");
let closeBtn = document.getElementById("close-btn");

closeBtn.addEventListener("click", () => {
    messageContent.classList.add("message-hide");
});
