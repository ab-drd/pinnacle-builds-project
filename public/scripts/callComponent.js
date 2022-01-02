document.getElementById("cpu-button").addEventListener("click", fetchCPU);
document.getElementById("mobo-button").addEventListener("click", fetchMOBO);
document.getElementById("ram-button").addEventListener("click", fetchRAM);
document.getElementById("cool-button").addEventListener("click", fetchCool);
document.getElementById("gpu-button").addEventListener("click", fetchGPU);
document.getElementById("ssd-button").addEventListener("click", fetchSSD);
document.getElementById("hdd-button").addEventListener("click", fetchHDD);
document.getElementById("psu-button").addEventListener("click", fetchPSU);
document.getElementById("case-button").addEventListener("click", fetchCase);

let tdp = document.getElementById("TDPText");
let price = document.getElementById("priceText");

function fetchCPU() {
    fetchComponents("cpu");
    replacePickName("Choose CPU:");
}

function fetchMOBO() {
    fetchComponents("motherboard");
    replacePickName("Choose motherboard:");
}

function fetchRAM() {
    fetchComponents("ram");
    replacePickName("Choose RAM:");
}

function fetchCool() {
    fetchComponents("cpu_fan");
    replacePickName("Choose CPU cooler:");
}

function fetchGPU() {
    fetchComponents("gpu");
    replacePickName("Choose GPU:");
}

function fetchSSD() {
    fetchComponents("ssd");
    replacePickName("Choose SSD:");
}

function fetchHDD() {
    fetchComponents("hdd");
    replacePickName("Choose HDD:");
}

function fetchPSU() {
    fetchComponents("psu");
    replacePickName("Choose PSU:");
}

function fetchCase() {
    fetchComponents("pc_case");
    replacePickName("Choose PC Case:");
}

fetchCPU();

//ask backend if you want to edit this function
function fetchComponents(component) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            try {
                list = JSON.parse(this.responseText);
            }
            catch(err) {
                cpu_list.innerHTML += err;
                list = "";
            }
            finally {
                componentCallBack(list, component);
            }
        }
    }

    xmlhttp.open("GET", "./src/componentRequestHandler.php?component=" + component, true);
    xmlhttp.send();
}

// simple render function
function renderComponents(component_array, component) {
    for (let key in component_array) {
        item = component_array[key];

        var child = document.createElement('li');
        child.setAttribute('class', 'component');
        child.innerHTML = document.getElementById('template').innerHTML;

        child.innerHTML = child.innerHTML.replace(/{IMG_SRC}/g, `./images/dbpic/${item["model"]}.jpg`);
        child.innerHTML = child.innerHTML.replace(/{COMP_NAME}/g, item["model"]);

        let infoButton = child.getElementsByClassName("infoButt")[0];
        infoButton.addEventListener("click", renderInfo);
        let pickButton = child.getElementsByClassName("pickButt")[0]
        pickButton.addEventListener("click", addComponent);

        infoButton.setAttribute('class', `infoButt`);
        pickButton.setAttribute('class', `pickButt ${component}`);

        document.getElementById('list').appendChild(child);
        /* addEventListener("click", addComponent);
        addEventListener("click", renderInfo); */
    }
}

function clearComponents() {
    document.getElementById('list').innerHTML = '';
}

function componentCallBack(list, component) {
    // must use callback to use data recieved from the server
    clearComponents();
    renderComponents(list, component);
}

function replacePickName(parameter) {
    document.getElementById('pickerName').textContent = parameter;
}

function addComponent(e) {
    let button = e.target;
    let item = button.parentElement.parentElement.getElementsByClassName('iconName')[0];
    let compType = button.classList[1];
    document.getElementById('pickerName').textContent = item;

    document.getElementById(`comp-${compType}`);


}

function renderInfo(e) {
    document.getElementById('pickerName').textContent = "render";
}