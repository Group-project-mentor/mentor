let editValue = true;
let resourceData = {};

let loading = true; // ! for loading purposes


let topicOrder = [];
setTopicOrder();
// console.log(topicOrder);

let editToggle = document.getElementById('editToggle');
const upShiftBtns = document.getElementsByClassName('upShift');
const downShiftBtns = document.getElementsByClassName('downShift');
const resourceContainer = document.getElementById('resourceContainer');

// ? save button of topic order changings
document.getElementById('saveButton').addEventListener('click', () => {
    saveOrder();
});

// ? up down button toggler
editToggle.addEventListener('click', () => {
    editValue = !editValue;
    if (editValue) {
        for (let i = 0; i < upShiftBtns.length; i++) {
            upShiftBtns[i].style.display = 'block';
        }
        for (let i = 0; i < downShiftBtns.length; i++) {
            downShiftBtns[i].style.display = 'block';
        }
        document.getElementById('editToggleImg').src = `${BASEURL}public/assets/icons/icon_move.png`;
    } else {
        for (let i = 0; i < upShiftBtns.length; i++) {
            upShiftBtns[i].style.display = 'none';
        }
        for (let i = 0; i < downShiftBtns.length; i++) {
            downShiftBtns[i].style.display = 'none';
        }
        document.getElementById('editToggleImg').src = `${BASEURL}public/assets/icons/icon_not_move.png`;

    }
});

loadingRender();    // ! loading screen

// ? initial rendering of the page
fetch(`${BASEURL}rcResources/getResourcesTopics`)
    .then(response => response.json())
    .then(data => {
        resourceData = data;
        resourceContainer.innerHTML = renderContent();
        makeShiftButtons();
        loading = false;
        // console.log(resourceData);
        // console.log(topicData);
    })
    .catch(error => console.log(error));


// ? render all the topics and resources
function renderContent(){
    let htmlContent = '';
    if(topicOrder.length == 0){
        htmlContent += `<div class="rc-org-info-row">No organized topics for this subject</div>`;
    }else{
        for (let i = 0; i < topicOrder.length; i++) {
            let topicName = topicData[topicOrder[i]].name;
            let description = topicData[topicOrder[i]].description;
            htmlContent += renderTopic(topicOrder[i],topicName, description);
            if(resourceData[topicOrder[i]] == undefined || resourceData[topicOrder[i]].length == 0){
                htmlContent += `<div class="rc-org-info-row">No resources for this topic</div>`;
            }else{
                for(let item of resourceData[topicOrder[i]]){
                    htmlContent += renderResource(item);
                }
            }
            htmlContent += `<div class="rc-org-padding"></div>`;

        }
    }
    return htmlContent;
}

// ? Generate the topic order array
function setTopicOrder(){
    if(topicOrderStr != ''){
        let stringArray = topicOrderStr.split(',');
        topicOrder = stringArray.map(no => parseInt(no, 10));
    }else{
        topicOrder = [];
    }
    // for(let key in topicData){
    //     topicOrder.push(key);
    // }
}

// ? Render all the topics of the resources
function renderTopic(id, topicName, description){
    return `
            <div class="rc-org-topic-row">
                        <div class="rc-org-row-btns">
                            <button class="upShift" type="button">
                                <img src="${BASEURL}public/assets/icons/up_arrow_green.png" alt="up" >
                            </button>
                            <button class="downShift" type="button">
                                <img src="${BASEURL}public/assets/icons/down_arrow_green.png" alt="down" >
                            </button>
                            <div class="rc-org-topic">
                                <h3>${topicName}</h3>
                            </div>
                        </div>
                        <div class="rc-org-row-btns">
                            <a href="${BASEURL}rcDelete/removeTopic/${id}">
                                <img src="${BASEURL}public/assets/icons/icon_delete.png" alt="delete">
                            </a>
                            <a href="${BASEURL}rcEdit/topic/${id}">
                                <img src="${BASEURL}public/assets/icons/icon_edit.png" alt="edit">
                            </a>
                            <a href="${BASEURL}rcAdd/toTopic/${id}">
                                <img src="${BASEURL}public/assets/icons/icon-add-green.png" alt="add" class="add-rsrc">
                            </a>
                        </div>
                    </div>
                    <hr class="rc-topic-line">
        `;
}

// ? Render normal resource under a topic
function renderResource(item){
    return `
            <div class="rc-org-row">
                        <img src="${BASEURL}public/assets/icons/${resourceTypeImage(item.type)}.png" alt="delete">
                        <div class="rc-org-col">
                            ${item.name}
                        </div>
                        <div class="rc-org-col"></div>
                        <div class="rc-org-col"></div>
                        <div class="rc-org-row-btns">
                            <a href="${BASEURL}rcDelete/removeReference/${item.rsrc_id}">
                                <img src="${BASEURL}public/assets/icons/icon_delete.png" alt="delete">
                            </a>
                            <a href="${previewLink(item.type,item.rsrc_id)}">
                                <img src="${BASEURL}public/assets/icons/icon_eye.png" alt="edit">
                            </a>
                        </div>
                    </div>
        `;
}

// ? Generating the image file name for each resource type
function resourceTypeImage(type){
    let name = 'icon_default_org';
    switch (type) {
        case 'video':
            name = "icon_video_org";
            break;
        case 'pdf':
            name = "icon_pdf_org";
            break;
        case 'paper':
            name = "icon_paper_org";
            break;
        case 'other':
            name = "icon_other_org";
            break;
        case 'quiz':
            name = "icon_quiz_org";
            break;
    }
    return name;
}

// ? Preview links generating for each of resource type
function previewLink(type, $id){
    let link = '';
    switch (type) {
        case 'video':
            link = `${BASEURL}rcResources/Preview/video/${$id}`;
            break;
        case 'pdf':
            link = `${BASEURL}rcResources/Preview/document/${$id}`;
            break;
        case 'paper':
            link = `${BASEURL}rcResources/Preview/pastpaper/${$id}`;
            break;
        case 'other':
            link = `${BASEURL}rcResources/Preview/other/${$id}`;
            break;
        case 'quiz':
            link = `${BASEURL}quizPreview/instructions/${$id}`;
            break;
    }
    return link;
}

// ? Small progress circle
function loadingRender(){
    if(loading){
        resourceContainer.innerHTML = `<img style="width:50px;align-self:center;" src="${BASEURL}public/assets/icons/icon_loading.gif">`;
    }
}

// ? Saving function of order changing
function saveOrder(){
    let newOrder = topicOrder.join(',');
    // console.log(newOrder);
    let formData = new FormData();
    formData.append('order', newOrder);
    fetch(`${BASEURL}rcResources/saveTopicOrder`,{
        method: 'POST',
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            if(data.status == 'success'){
                makeSuccess('Topic order saved successfully');
                // setTimeout(() => {
                //         location . reload();
                //     }, 2000);
            }else{
                makeError('Error saving topic order');
            }
        })
        .catch(error => {
            makeError('Error saving topic order');
        });
}

// ? up arrows and down arrows come alive with this function
function makeShiftButtons(){
    let upShifts = document.querySelectorAll('.upShift');
    let downShifts = document.querySelectorAll('.downShift');
    for(let i = 0; i < upShifts.length; i++){
        upShifts[i].addEventListener('click',function(){
            if(i > 0){
                let temp = topicOrder[i];
                topicOrder[i] = topicOrder[i-1];
                topicOrder[i-1] = temp;
                resourceContainer.innerHTML =  renderContent();
                makeShiftButtons();
                // console.log(topicOrder);
            }
        });
    }
    for(let i = 0; i < downShifts.length; i++){
        downShifts[i].addEventListener('click',function(){
            if(i < downShifts.length - 1){
                let temp = topicOrder[i];
                topicOrder[i] = topicOrder[i+1];
                topicOrder[i+1] = temp;
                resourceContainer.innerHTML=  renderContent();
                makeShiftButtons();
                // console.log(topicOrder);
            }
        });
    }
}