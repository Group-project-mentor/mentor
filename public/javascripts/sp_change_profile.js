let fileChooser = document.getElementById("fileChooser");
let submit = document.getElementById("sub-btn");
let alertMsg = document.getElementById("msg");
let image = "";

fileChooser.addEventListener("change", () => {
    f = fileChooser.files[0];
    if (f) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(f);
        fileReader.addEventListener("load", () => {
            image = fileReader.result;
            document.getElementById("profImg").src = image;
        });
    }
});

submit.addEventListener("click", () => {
    if (image != "") {
        const formData = new FormData();
        let http = new XMLHttpRequest();
        formData.append("image", image);
        http.open(
            "POST",
            "http://localhost/mentor/sponsor/changeImage",
            true
        );
        http.send(formData);

        http.onload = () => {
            if (http.status === 200) {
                alertMsg.textContent = "Successfully updated !";
            }
            alertMsg.textContent = http.response;
        };
    }
});
