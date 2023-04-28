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
            console.log(image);
        });
    }
});

submit.addEventListener("click", () => {
    if (image != "") {
        const formData = new FormData();
        formData.append("image", image);

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var response = this.responseText;

                if (response == "Successful") {
                    alertMsg.textContent = "Successfully updated !";
                } else {
                    alertMsg.textContent = "Not updated !";
                }
            }

        };
        xhttp.open("POST", "http://localhost/mentor/admins/changeImage",true);
        // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(formData);
    }
});
