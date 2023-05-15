
let otherInput = document.getElementById("other-input");
let otherInputCheck = document.getElementById("other-input-check");
let form = document.getElementById("rc-form");
let confCheck = document.getElementById("conf-check");

otherInputCheck.onchange = () => {
    if(!otherInputCheck.checked){
        otherInput.style.display = "none";
    }else {
        otherInput.style.display = "inline";
    }
}

form.onsubmit = (e) => {
    e.preventDefault();
    let formData = new FormData(form);
    if(!checkSubjectPattern(formData.get("subjects"))){
        makeError("Format of subject list is wrong");
    }
    else if(!confCheck.checked){
        makeError("Please confirm the form !");
    }
    else{
        fetch(`${BASEURL}landing/applyCreatorForm`, {
            method: "post",
            body: formData,
        })
            .then((res) => res.text())
            .then((data) => {
                console.log(data);
                data = JSON.parse(data.slice(0, -21));
                if(data.status == "success"){
                    makeSuccess("Successfully sent the form !");
                    setTimeout(() => {
                        window.location.href = `${BASEURL}`;
                    }, 1000);
                }else{
                    makeError(data.message);
                }
            })
            .catch((err) => {
                console.log(err);
                makeError("Can't send the form !");
            });
    }
}

function checkSubjectPattern(str){
    const pattern = /^[a-zA-Z0-9]+(,[a-zA-Z0-9]+)*$/;
    return pattern.test(str.trim());
}