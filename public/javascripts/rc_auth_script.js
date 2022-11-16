const getElement = (id) => document.getElementById(id);

let email = getElement("email");
let icon = getElement("icon");

email.addEventListener('keyup',()=>{
    pattern = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]/
    console.log(icon.src);
    if(pattern.test(email.value)){
        icon.src = "../assets/verified.png";
    }else{
        icon.src = "../assets/cross.png";
    }
});