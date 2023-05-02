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

const generateOTP = () => {
    return Math.floor(Math.random() * 900000) + 999999;
};
