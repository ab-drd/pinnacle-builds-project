document.getElementById("cpu-button").addEventListener("click", fetchCPU);
document.getElementById("mobo-button").addEventListener("click", fetchMOBO);
document.getElementById("ram-button").addEventListener("click", fetchRAM);
document.getElementById("cool-button").addEventListener("click", fetchCool);
document.getElementById("gpu-button").addEventListener("click", fetchGPU);
document.getElementById("ssd-button").addEventListener("click", fetchSSD);
document.getElementById("hdd-button").addEventListener("click", fetchHDD);
document.getElementById("psu-button").addEventListener("click", fetchPSU);
document.getElementById("case-button").addEventListener("click", fetchCase);

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

fetchComponents("cpu");

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
function renderComponents(component_array) {
    for (let key in component_array) {

        item = component_array[key];

        var child = document.createElement('li');
        child.setAttribute('class', 'component');
        child.innerHTML = document.getElementById('template').innerHTML;

        child.innerHTML = child.innerHTML.replace(/{IMG_SRC}/g, `./images/dbpic/${item["model"]}.jpg`);
        child.innerHTML = child.innerHTML
            .replace(/{COMP_NAME}/g, item["model"]);

        document.getElementById('list').appendChild(child);
    }
}

function clearComponents() {
    document.getElementById('list').innerHTML = '';
}

function componentCallBack(list, component) {
    // must use callback to use data recieved from the server
    clearComponents();
    renderComponents(list);
}

function replacePickName(parameter) {
    document.getElementById('pickerName').textContent = parameter;
}