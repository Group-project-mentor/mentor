const getElement = (id) => document.getElementById(id);

// Email validation
let email = getElement("email");
let icon1 = getElement("icon1");

let email_pattern = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]/;

email.addEventListener("keyup", () => {
    // console.log(icon1.src);
    if (email_pattern.test(email.value)) {
        icon1.src = "http://localhost/mentor-interim/assets/icons/verified.png";
        email.classList.remove("invalid-inp");
        email.classList.add("valid-inp");
    } else {
        icon1.src = "http://localhost/mentor-interim/assets/icons/cross.png";
        email.classList.add("invalid-inp");
        email.classList.remove("valid-inp");
    }
});
