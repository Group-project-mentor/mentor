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

            let alert = document.getElementById("alert");
            alert.classList.remove("hideme");
            alert.classList.add("showme");
            // location.reload();

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/verify", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("rID="+rID+"&uID="+uID);
}

function deleteResourceFromTaskManager(rID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            let alert = document.getElementById("alert");
            alert.classList.remove("hideme");
            alert.classList.add("showme");  

            

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/deleteResouceTM/"+rID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function addComplaintToTaskManager(cID,uID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            let alert = document.getElementById("alert");
            alert.classList.remove("hideme");
            alert.classList.add("showme");  

            

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/complaint/"+cID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("cID="+cID+"&uID="+uID);
}

function deleteComplaintFromTaskManager(cID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            let alert = document.getElementById("alert");
            alert.classList.remove("hideme");
            alert.classList.add("showme");  

            

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/deleteComplaintTM/"+cID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}



function addRCToTaskManager(rcID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            let alert = document.getElementById("alert");
            alert.classList.remove("hideme");
            alert.classList.add("showme");  

            

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/resourceCreatorView/"+rcID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function deleteRCFromTaskManager(rcID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            let alert = document.getElementById("alert");
            alert.classList.remove("hideme");
            alert.classList.add("showme");  

            

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/deleteResouceCreatorTM/"+rcID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function view(type,rID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            window.location.replace("http://localhost/mentor/admins/complaints")

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/resourceview/"+type+cID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("type="+type+"&rID="+rID);
}



function tookaction(cID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText.trim();

            let alert = document.getElementById("alert");
            alert.classList.remove("hideme");
            alert.classList.add("showme");

            // if(response === "Successful") {
            //      window.location.replace("http://localhost/mentor/admins/taskmanager");
                
                
            // }             

            

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/task/"+cID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function approve(rID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText.trim();

            if(response === "Successful") {
                // window.location.replace("http://localhost/mentor/admins/taskmanager");
                         
                let alert = document.getElementById("alert");
                alert.classList.remove("hideme");
                alert.classList.add("showme");
                document.getElementById("msg").innerHTML = "Resource Approved";
                document.getElementById("img").src = "http://localhost/mentor/public/assets/admin/resource_approved.png";

            }

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/resource/approve/"+rID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function decline(rID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText.trim();

            if(response === "Successful") {
                // window.location.replace("http://localhost/mentor/admins/taskmanager");
                         

                let alert = document.getElementById("alert");
                alert.classList.remove("hideme");
                alert.classList.add("showme");
                document.getElementById("msg").innerHTML = "Resource\ Declined";
                document.getElementById("img").src = "http://localhost/mentor/public/assets/admin/resource_decline.png";

            }

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/resource/decline/"+rID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function approveRC(rID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText.trim();

            // console.log(JSON.parse(response));
            console.log(response);

            if(response === "Successful") {
                // window.location.replace("http://localhost/mentor/admins/taskmanager");
                         
                let alert = document.getElementById("alert");
                alert.classList.remove("hideme");
                alert.classList.add("showme");
                document.getElementById("msg").innerHTML = "Resource Creator Approved";
                document.getElementById("img").src = "http://localhost/mentor/public/assets/admin/resource_creator_approved.png";

            }

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/resourceCreatorReview/approve/"+rID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function declineRC(rID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText.trim();

            if(response === "Successful") {
                // window.location.replace("http://localhost/mentor/admins/taskmanager");
                         

                let alert = document.getElementById("alert");
                alert.classList.remove("hideme");
                alert.classList.add("showme");
                document.getElementById("msg").innerHTML = "Resource Creator Declined";
                document.getElementById("img").src = "http://localhost/mentor/public/assets/admin/resource_decline.png";

            }

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/resourceCreatorReview/decline/"+rID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function addScholToTaskManager(schlID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            let alert = document.getElementById("alert");
            alert.classList.remove("hideme");
            alert.classList.add("showme");  

            

        }
    };

    xhttp.open("POST", "http://localhost/mentor/admins/scholorshipview/"+schlID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function deleteScholToTaskManager(stID){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {
            var response = this.responseText;

            let alert = document.getElementById("alert");
            alert.classList.remove("hideme");
            alert.classList.add("showme");  

            

        }
    };
    xhttp.open("POST", "http://localhost/mentor/admins/deleteResouceCreatorTM/"+stID, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

