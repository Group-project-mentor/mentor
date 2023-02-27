const refactorFileName = (fileName, n=10) => {
    let nameParts = fileName.split('.');
    let firstPart = nameParts[0];
    if(nameParts[0].length > n){
        firstPart = nameParts[0].substring(0,n);
    }
    return `${firstPart}...${nameParts[nameParts.length - 1]}`;
}

const converter = (val) => {
    if(val < 1000)
        return Math.round(inputBtn.files[0].size)+" B";
    else if(val/1024 < 1000)
        return Math.round((inputBtn.files[0].size)/1024)+" KB";
    else if(val/(1024*1024) < 1000)
        return Math.round((inputBtn.files[0].size)/(1024*1024))+" MB";
}