let editValue = true;
let resourceData = {};

let loading = true; // ! for loading purposes


let topicOrder = [];
setTopicOrder();
// console.log(topicOrder);

const resourceContainer = document.getElementById('resourceContainer');


loadingRender();    // ! loading screen

// ? initial rendering of the page
fetch(`${BASEURL}st_public_resources/getResourcesTopics`)
    .then(response => response.json())
    .then(data => {
        resourceData = data;
        resourceContainer.innerHTML = renderContent();
        loading = false;
        console.log(resourceData);
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
                            <div class="rc-org-topic">
                                <h3>${topicName}</h3>
                            </div>
                        </div>
                        <div class="rc-org-row-btns">
                            
                        </div>
                    </div>
                    <hr class="rc-topic-line">
        `;
}

// ? Render normal resource under a topic
function renderResource(item){
    return `
            <div class="rc-org-row">
                        <img src="${BASEURL}public/assets/icons/${resourceTypeImage(item.type)}.png" alt="">
                        <div class="rc-org-col">
                            ${item.rsrc_id}
                        </div>
                        <div class="rc-org-col"></div>
                        <div class="rc-org-col"></div>
                        <div class="rc-org-row-btns">
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
            link = `${BASEURL}st_public_resources/Preview/video/${$id}`;
            break;
        case 'pdf':
            link = `${BASEURL}st_public_resources/Preview/document/${$id}`;
            break;
        case 'paper':
            link = `${BASEURL}st_public_resources/Preview/pastpaper/${$id}`;
            break;
        case 'other':
            link = `${BASEURL}st_public_resources/Preview/other/${$id}`;
            break;
        case 'quiz':
            link = `${BASEURL}st_public_resources/st_quizzes_do/${$id}`;
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

