let chkAll = document.getElementById('chkAll');
let totalSum = 0;

let nfoptions = {
    style: "currency",
    currency: "LKR",
    minimumFractionDigits: 2
};

document.getElementById('totalPrice').textContent = totalSum.toLocaleString('en-US',nfoptions);

chkAll.addEventListener('change',()=>{
    let checkBtns = document.getElementsByClassName('save-info-check');
    if (chkAll.checked){
        for (const checkBtn of checkBtns) {
            checkBtn.checked = true;
        }
    }else{
        for (const checkBtn of checkBtns) {
            checkBtn.checked = false;
        }
    }
    renderTotal();
});

let chkList = document.getElementsByClassName('save-info-check');
let amounts = document.getElementsByClassName('chk-amount');
for (let i =0; i < chkList.length;i++){
    chkList[i].addEventListener('change',() => {
        if (chkList[i].checked){
            totalSum += parseFloat((amounts[i].textContent).trim());
        }else {
            totalSum -= parseFloat((amounts[i].textContent).trim());
        }
        document.getElementById('totalPrice').textContent = totalSum.toLocaleString('en-US',nfoptions);
        // console.log(parseFloat((amounts[i].textContent).trim()));
    });
}

function renderTotal(){
    totalSum = 0;
    for (let i =0; i < amounts.length;i++){
        if (chkList[i].checked){
            totalSum += parseFloat((amounts[i].textContent).trim());
        }else {
            totalSum = 0;
        }
        document.getElementById('totalPrice').textContent = totalSum.toLocaleString('en-US',nfoptions);
    }
}