const refactorFileName = (fileName, n=10) => {
    let nameParts = fileName.split('.');
    let firstPart = nameParts[0];
    if(nameParts[0].length > n){
        firstPart = nameParts[0].substring(0,n);
        return `${firstPart}...${nameParts[nameParts.length - 1]}`;
    }else{
        return fileName;
    }
}

const converter = (val) => {
    if(val < 1000)
        return Math.round(inputBtn.files[0].size)+" B";
    else if(val/1024 < 1000)
        return Math.round((inputBtn.files[0].size)/1024)+" KB";
    else if(val/(1024*1024) < 1000)
        return Math.round((inputBtn.files[0].size)/(1024*1024))+" MB";
}

// MD5 Hashing functions
const hexStringFromBuffer = buffer => {
    let hexCodes = [];
    let view = new DataView(buffer);
    for (let i = 0; i < view.byteLength; i += 4) {
        let value = view.getUint32(i);
        let stringValue = value.toString(16);
        let padding = "00000000";
        let paddedValue = (padding + stringValue).slice(-padding.length);
        hexCodes.push(paddedValue);
    }
    return hexCodes.join("");
}

const md5 = message => {
    let messageBuffer = new TextEncoder("utf-8").encode(message);
    let hashBuffer = crypto.subtle.digest("MD5", messageBuffer);
    return hexStringFromBuffer(hashBuffer);
}

const genPayHash = (orderId, amount, currency, merchId, merchSecr) => {
    return md5(
        merchId +
            orderId +
            amount.toFixed(2) +
            currency +
            md5(merchSecr).toUpperCase()
    ).toUpperCase();
}
