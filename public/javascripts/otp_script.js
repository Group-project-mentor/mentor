const getElement = (id) => document.getElementById(id);

// Email validation
let email = getElement("email");
let send_btn = getElement("send_btn");

let otp_pattern = /[0-9]{6}/;

let otp = getElement("otp");
let icon2 = getElement("icon2");

otp.addEventListener("keyup", () => {
    // console.log(icon2.src);
    if (otp_pattern.test(otp.value)) {
        icon2.src = "../assets/icons/verified.png";
        otp.classList.remove("invalid-inp");
        otp.classList.add("valid-inp");
    } else {
        icon2.src = "../assets/icons/cross.png";
        otp.classList.remove("valid-inp");
        otp.classList.add("invalid-inp");
    }
});


// // OTP validation
// send_btn.addEventListener("click", () => {
//     const OTP = generateOTP();
//     let message = "This is OTP : " + OTP;
//     Email.send({
//         SecureToken: "9bb64158-5ce1-40c1-9eb2-1a4e6f20206d",
//         To: email.value.trim(),
//         From: "kavisulakshana2000@gmail.com",
//         Subject: "otp",
//         Body: message,
//     })
//         .then((message) => {
//             alert(message);
//         })
//         .catch(() => {
//             alert("wada na");
//         });
// });

const generateOTP = () => {
    return Math.floor(Math.random() * 900000) + 999999;
};
