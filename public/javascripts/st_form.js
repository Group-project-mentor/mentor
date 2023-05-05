
let otherInput = document.getElementById("other-input");
let otherInputCheck = document.getElementById("other-input-check");
let form = document.getElementById("rc-form");
let confCheck = document.getElementById("confcheck");


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
        fetch(`${BASEURL}st_profile/applyCreatorForm`, {
            method: "post",
            body: formData,
        })
            .then((res) => res.json())
            .then((data) => {
                if(data.status == "success"){
                    makeSuccess("Successfully sent the form !");
                    setTimeout(() => {
                        window.location.href = `${BASEURL}st_profile`;
                    }, 1000);
                }else{
                    makeError("Can't send the form !");
                }
                console.log(data);
                //document.getElementById('abc').innerHTML = data ;
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