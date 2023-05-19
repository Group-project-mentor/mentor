const converter = (val, btn) => {
    if(val < 1000)
        return Math.round(btn.files[0].size)+" B";
    else if(val/1024 < 1000)
        return Math.round((btn.files[0].size)/1024)+" KB";
    else if(val/(1024*1024) < 1000)
        return Math.round((btn.files[0].size)/(1024*1024))+" MB";
}



let tab = document.getElementsByClassName('tp-tab');
let tabCont = document.getElementsByClassName('tab-container');

// ? Tab - containers handler
for (let j = 1; j < tabCont.length; j++) {
    tabCont[j].style.display = 'none';
    tab[j].classList.remove('active');
}

for (let i = 0; i < tab.length; i++){
    tab[i].onclick = () => {
        for (let j = 0; j < tabCont.length; j++) {
            if (i!==j) {
                tabCont[j].style.display = 'none';
                tab[j].classList.remove('active');
            }
        }
        tabCont[i].style.display = 'flex';
        tab[i].classList.add('active');
    }
}

