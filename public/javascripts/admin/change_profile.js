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

// submit.addEventListener("click", () => {
//     if (image != "") {
//         const formData = new FormData();
//         formData.append("image", image);
//         $.ajax({
//             type: 'POST',
//             url: 'http://localhost/mentor/admins/changeImage',
//             data: formData,
//             processData: false,
//             contentType: false,
//             success: (response) => {
//                 window.location.replace("http://localhost/mentor/admins/profile");
//                 // console.log(response);
//                 // if (response == "success") {
//                 //     // alertMsg.textContent = response;
                    
//                 // } else {
//                 //     alertMsg.textContent = response;
//                 // }
//             }
//         });
//     }
// });

submit.addEventListener("click", () => {
    if (image != "") {
        const formData = new FormData();
        let http = new XMLHttpRequest();
        formData.append("image", image);
        http.open("POST", `${BASEURL}admins/updateImage`, true);
        http.send(formData);

        http.onload = () => {
            if (http.status === 200) {
                if (http.response.trim() == "success") {
                    makeSuccess("Successfully updated !");
                } else if (http.response.trim() == "type_error") {
                    makeError("Incorrect file type !");
                } else {
                    console.log(http.response);
                    makeError("Error Occured !");
                }
                setTimeout(() => {
                    // location.reload();
                }, 2000);
            } else {
                console.log(http.response);
                makeError("Error Occured !");
            }
        };
    }
});