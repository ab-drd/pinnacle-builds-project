let dictSName = {
    "quantity" : "In stock:",
    "unit_price" : "Price:",
    "socket" : "Socket:",
    "cores" : "Cores:",
    "threads" : "Threads:",
    "clock_speed" : "CPU clock speed:",
    "boost_clock_speed" : "CPU boost clock speed:",
    "stock_included" : "CPU fan included?",
    "tdp" : "TDP:",
    "form" : "Form factor:",
    "chipset" : "Chipset:",
    "safe_cpu_tdp" : "Recommended safe tdp of cpu:",
    "ddr" : "Memory type:",
    "memory_size" : "Memory capacity:",
    "frequency" : "Memory frequency:",
    "length" : "Length:",
    "boost_clock" : "GPU boost clock speed:",
    "memory_capacity" : "Memory capacity:",
    "memory_type" : "Memory type:",
    "format" : "Drive format:",
    "interface" : "SSD interface:",
    "seq_write_speed" : "Sequiential write speed:",
    "seq_read_speed" : "Sequiential read speed:",
    "capacity" : "Storage space:",
    "rotation_speed" : "HDD rotation speed:",
    "power" : "Power delivery:",
    "isfullymodular" : "Fully modular?",
    "fan" : "PSU fan size:",
    "certificate" : "PSU efficency rating:",
    "height" : "Height:",
    "width" : "Width:",
    "weight" : "Weight:",
    "gpu_length" : "Maximum GPU length:",
    "cooler_height" : "Maximum CPU cooler heigth:"
}

let dictSInfo = {
    "quantity" : "",
    "unit_price" : " Kn",
    "socket" : "",
    "cores" : "",
    "threads" : "",
    "clock_speed" : "GHz",
    "boost_clock_speed" : "GHz",
    "stock_included" : "",
    "tdp" : "W",
    "form" : "",
    "chipset" : "",
    "safe_cpu_tdp" : "W",
    "ddr" : "",
    "memory_size" : "GB",
    "frequency" : "MHz",
    "length" : "mm",
    "boost_clock" : "MHz",
    "memory_capacity" : "GB",
    "memory_type" : "",
    "format" : "",
    "interface" : "",
    "seq_write_speed" : "Mbps",
    "seq_read_speed" : "Mbps",
    "capacity" : "GB",
    "rotation_speed" : "RPM",
    "power" : "W",
    "isfullymodular" : "",
    "fan" : "mm",
    "certificate" : "",
    "height" : "mm",
    "width" : "mm",
    "weight" : "kg",
    "gpu_length" : "mm",
    "cooler_height" : "mm"
}


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
let infoTemplate = document.getElementById('modal');

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
                console.log(this.responseText);
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

        child.innerHTML = child.innerHTML.replace(/{IMG_SRC}/g, `./images/dbpic/${component}/${item["model"]}.jpg`);
        child.innerHTML = child.innerHTML.replace(/{COMP_NAME}/g, item["model"]);

        let infoButton = child.getElementsByClassName("infoButt")[0];
        infoButton.addEventListener("click", fetchInfo);
        let pickButton = child.getElementsByClassName("pickButt")[0]
        pickButton.addEventListener("click", addComponent);

        infoButton.setAttribute('class', `infoButt`);
        pickButton.setAttribute('class', `pickButt ${component}`);

        document.getElementById('list').appendChild(child);
        /*addEventListener("click", addComponent);
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

    let componentButton = document.getElementById(`comp-${compType}`);

    componentButton.querySelector("h2").textContent = item.querySelector("h1").textContent;
    componentButton.querySelector("img").src = item.querySelector("img").src;
}

function fetchInfo(e) {
    let fetchButton = e.target;
    let item = fetchButton.parentElement.parentElement;

    let model = item.querySelector("h1").textContent;
    let component = item.getElementsByClassName("pickButt")[0].classList[1];

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("got answer");
            console.log(this.responseText);
            if (this.responseText) {
                list = JSON.parse(this.responseText);
                infoCallback(list, component);
            }
        }
    }

    console.log(encodeURIComponent(model));
    xmlhttp.open("GET", `./src/infoRequestHandler.php?model=${encodeURIComponent(model)}
                            &component=${encodeURIComponent(component)}`, true);
    xmlhttp.send();
}

function infoCallback(list, component) {
    clearInfo();
    renderInfo(list, component);
}

function renderInfo(list, component) {
    infoTemplate.style.display = "block";

    infoTemplate.querySelector("img").src = `./images/dbpic/${component}/${list["model"].trim()}.jpg`;
    infoTemplate.querySelector("h1").innerHTML = list["model"].trim();

    for (key in list) {
        if (key != "model" && key != "id") {
            let attribute = list[key];

            let specChild = document.createElement('li');
            specChild.setAttribute('class', 'specElem');
            specChild.innerHTML = document.getElementById('specTemplate').innerHTML;
            
            specChild.innerHTML = specChild.innerHTML.replace(/{SPEC_NAME}/g, dictSName[key]);
            specChild.innerHTML = specChild.innerHTML.replace(/{SPEC_INFO}/g, attribute+dictSInfo[key]);

            document.getElementById('specList').appendChild(specChild);
        }
    }
}

function clearInfo() {
    document.getElementById('specList').innerHTML = "";
}

document.getElementsByClassName("infoClose")[0].addEventListener("click", function() {
    infoTemplate.style.display = "none";
});