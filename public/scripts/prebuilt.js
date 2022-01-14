const compClassDict = {
    1 : "CPU",
    2 : "CPU Cooler",
    3 : "RAM",
    4 : "Motherboard",
    5 : "PSU",
    6 : "SSD",
    7 : "HDD",
    8 : "GPU",
    9 : "Case"
}

function init() {
    let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText) {
                    let prebuiltArray = JSON.parse(this.responseText);
                    console.log(prebuiltArray);
                    renderPrebuilt(prebuiltArray);
                }
            }
        }
        xmlhttp.open("GET", `./src/prebuiltRequestHandler.php?action=load`, true);
        xmlhttp.send();
}

function renderPrebuilt(prebuiltArray) {
    for (let key in prebuiltArray) {
        console.log("hi");
        let prebuilt = prebuiltArray[key];
        let componentList = document.createElement('ul');
        componentList.id = "componentList";
        let compName = prebuilt[0];
        for (let i = 1; i < prebuilt.length; i++) {
            componentList.innerHTML += `<li class="compElem">
                                            <h2>${compClassDict[i]}</h2>
                                            <p>${prebuilt[i]}</p>
                                        </li>`;
        }

        let prebuiltEl = document.createElement('li');
        prebuiltEl.classList.add("cartTemplate");
        prebuiltEl.innerHTML = `  <div class="box-nav">
                                    <h1>${compName}</h1>
                                    <span class="itemRemove">&times;</span>
                                </div>
                                <img class="cart-img" src="./images/dbpic/pc_case/${prebuilt[9]}.jpg" height="200px" width="200px">
                                ${componentList.innerHTML}
                              `;

        console.log(prebuiltEl);
        document.getElementById("prebuilt-list").appendChild(prebuiltEl);
    }
}

init();