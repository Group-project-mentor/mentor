const typeChooser = document.getElementById("typeChooser");
const resourceChooser = document.getElementById("resourceChooser");
const resourceChooserContainer = document.getElementById(
    "resourceChooserContainer"
);
const resourceInfoContainer = document.getElementById("resourceInfoContainer");

let choosenType = "";
let resourceID = 0;

// console.log(resourcesByType);

typeChooser.addEventListener("change", (e) => {
    const selectedValue = e.target.value;
    switch (selectedValue) {
        case "0":
            resourceChooserContainer.style.display = "none";
            resourceInfoContainer.style.display = "none";
            break;
        case "1":
            choosenType = "videos";
            break;
        case "2":
            choosenType = "pdfs";
            break;
        case "3":
            choosenType = "papers";
            break;
        case "4":
            choosenType = "quizzes";
            break;
        case "5":
            choosenType = "others";
            break;
        default:
            choosenType = "";
            break;
    }
    resourceChooser.innerHTML = resourceChooserChange(choosenType);
});

resourceChooser.addEventListener("change", (e) => {
    const selectedValue = e.target.value;
    resourceID = selectedValue;
    // console.log(resourceID);
    infoLoader(choosenType, selectedValue);
});

function resourceChooserChange(type) {
    resourceChooserContainer.style.display = "flex";
    resourceInfoContainer.style.display = "none";
    let htmlTxt = "";
    if (
        resourcesByType[type] == undefined ||
        resourcesByType[type].length === 0
    ) {
        htmlTxt = `<option value="0">No Resources</option>`;
    } else {
        htmlTxt += `<option value="0">Choose Resource</option>`;
        resourcesByType[type].forEach((resource) => {
            htmlTxt += `<option value="${resource.id}">${resource.name}</option>`;
        });
    }
    return htmlTxt;
}

function infoLoader(type, selectedValue) {
    if (selectedValue === "0") {
        resourceInfoContainer.style.display = "none";
    } else {
        const resource = resourcesByType[type].find(
            (r) => r.id == selectedValue
        );
        document.getElementById("resID").innerHTML = resource.id;
        document.getElementById("resName").innerHTML = resource.name;
        resourceInfoContainer.style.display = "block";
    }
}

document.getElementById("addBtn").addEventListener("click", (e) => {
    e.preventDefault();
    if (resourceID != 0) {
        let formData = new FormData();
        formData.append("resource", resourceID);
        formData.append("topic", topicID);

        fetch(`${BASEURL}rcAdd/connectToTopic`, {
            method: "POST",
            body: formData,
        })
            .then((res) => res.json())
            .then((data) => {
                if (data.status === "success") {
                    makeSuccess("Resource Added Successfully");
                    // console.log(data);
                    setTimeout(() => {
                        window.location.href = `${BASEURL}rcResources/organized/${gradeID}/${subjectID}`;
                    }, 1000);
                } else {
                    makeError("Resource Adding Failed");
                }
            })
            .catch((err) => {
                makeError("Something Went Wrong");
            });
    } else {
        makeError("Please Select a Resource");
    }
});
