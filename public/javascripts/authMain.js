const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const image = document.querySelector('#loginPic');
const container = document.querySelector(".container");
const regPic = document.getElementById('regPic');
const tRegAlert = document.getElementById('tRegAlert');

const signUpStudent = document.getElementById("sign-up-student");
const signUpTeacher = document.getElementById("sign-up-teacher");

const teacherSwitch = document.getElementById("teacherSwitch");
const studentSwitch = document.getElementById("studentSwitch");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
    //  image.classList.add("sign-up-mode");
    //  regPic.classList.remove("sign-up-mode");

});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
    // image.classList.remove("sign-up-mode");
    // regPic . classList . add("sign-up-mode");
});

teacherSwitch.addEventListener("click", ()=>{
    signUpStudent.style.display = "none";
    signUpTeacher.style.display = "flex";
})

studentSwitch.addEventListener("click", ()=>{
    signUpTeacher.style.display = "none";
    signUpStudent.style.display = "flex";
})

signUpTeacher.addEventListener('submit',(e)=>{
    e.preventDefault();

    const formData = new FormData(signUpTeacher);

    fetch(`${BASEURL}register/verify_register_teacher`, {
        method: 'post',
        body: formData
    }).then(response => {
        return response.json();
    }).then(data => {
        if(data.message === "successful"){
            document.getElementById("tRegAlert").textContent = "";
            container.classList.remove("sign-up-mode");
            makeSuccess("Successfully Registered !");
            document.getElementById("tname").value = "";
            document.getElementById("temail").value = "";
            document.getElementById("tpasswd").value = "";
            document.getElementById("tpasswd_conf").value = "";
        }else if(data.message === "unsuccessful"){
            document.getElementById("tRegAlert").textContent = data.message.toUpperCase();
            makeError("Registration Failed !");
        }else {
            document.getElementById("tRegAlert").textContent = "Fill All Data";
            makeError("Please Fill All Data !");
        }
        // console.log(data.message);
    }).catch(error => {
        console.log(error);
    });
});

// ! not completed
signUpStudent.addEventListener('submit',(e)=>{
    e.preventDefault();

    const formData = new FormData(signUpStudent);

    fetch(`${BASEURL}register/verify_register_student`, {
        method: 'post',
        body: formData
    }).then(response => {
        return response.json();
    }).then(data => {
        document.getElementById("sRegAlert").textContent = data.message;
        console.log(data.message);
    }).catch(error => {
        console.log(error);
    });

});


