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
let years = document.getElementsByClassName('chk-years');
let months = document.getElementsByClassName('chk-months');
let ids = document.getElementsByClassName('chk-ids');
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

function monthToNumber(monthName) {
    const months = {
        "January": 1,
        "February": 2,
        "March": 3,
        "April": 4,
        "May": 5,
        "June": 6,
        "July": 7,
        "August": 8,
        "September": 9,
        "October": 10,
        "November": 11,
        "December": 12
    };

    const formattedMonthName = monthName.charAt(0).toUpperCase() + monthName.slice(1).toLowerCase();
    return months[formattedMonthName];
}