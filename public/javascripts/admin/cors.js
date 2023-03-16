function addAdmin() {
    let adminName = document.getElementById('admin-name').value;
    let adminMail = document.getElementById('admin-mail').value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            let alert = document.getElementById("alert");
            alert.classList.remove("hideme");
            alert.classList.add("showme");

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/addAdmin", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("admin-name="+adminName+"&admin-mail="+adminMail);
}

