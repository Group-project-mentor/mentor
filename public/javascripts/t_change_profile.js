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
        formData.append("image", fileChooser.files[0]);
        http.open("POST", `${BASEURL}TProfile/updateImage`, true);
        http.send(formData);

        http.onload = () => {
            if (http.status === 200) {
                if (http.response.trim() == "success") {
                    makeSuccess("Successfully updated !");
                } else if (http.response.trim() == "type_error") {
                    makeError("Incorrect file type !");
                } else {
                    makeError("Error Occured !");
                }
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }else{
                makeError("Error Occured !");
            }
        };
    }
});
