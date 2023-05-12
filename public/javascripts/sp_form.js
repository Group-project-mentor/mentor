
let form = document.getElementById("rc-form");
let confCheck = document.getElementById("conf-check");
let rangeInput = document.getElementById("range-input");
let maxAmount = document.getElementById("max-amount");

let amount = 5000;

form.onsubmit = (e) => {
    e.preventDefault();
    let formData = new FormData(form);
    formData.append("maxAmount", amount);
    if(!confCheck.checked){
        makeError("Please confirm the form !");
    }
    else{
        fetch(`${BASEURL}landing/applySponsorForm`, {
            method: "post",
            body: formData,
        })
            .then((res) => {
                return  res.text();
            })
            .then((data) => {
                data = JSON.parse(data.slice(0, -21));
                if (data.status == "success") {
                    makeSuccess("Successfully sent the form !");
                    setTimeout(() => {
                        window.location.href = `${BASEURL}`;
                    }, 1000);
                } else {
                    console.log(data);
                    makeError("Can't send the form !");
                }
            })
            .catch((err) => {
                console.log(err);
                makeError("Can't send the form !");
            });
    }
}

function updateBar(){
    if(rangeInput.value < 5000){
        amount = 5000;
        rangeInput.value = 5000;
        maxAmount.innerHTML = `5000 LKR`;
    }else if (rangeInput.value >= 5000 && rangeInput.value <= 50000) {
        amount = roundToThousand(rangeInput.value);
        maxAmount.innerHTML = `${amount} LKR`;
        rangeInput.value = amount;
    }else{
        amount = 50000;
        rangeInput.value = 50000;
        maxAmount.innerHTML = `50000 LKR`;
    }
}

function roundToThousand(number) {
    return Math.round(number / 1000) * 1000;
}