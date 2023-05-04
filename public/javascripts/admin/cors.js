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

function addGrade() {
    let gradePhoto = document.getElementById('grade-photo').value;
    let gradeName = document.getElementById('grade-name').value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            console.log(response);
            location.reload();

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/addNewGrade", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("grade-photo="+gradePhoto+"&grade-name="+gradeName);
}

function addResourceToTaskManager(rID,uID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            console.log(response);
            location.reload();

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/verify", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("rID="+rID+"&uID="+uID);
}

function addComplaintToTaskManager(cID,uID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            window.location.replace("http://localhost/mentor/admins/complaints")

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/complaint/"+cID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("cID="+cID+"&uID="+uID);
}

