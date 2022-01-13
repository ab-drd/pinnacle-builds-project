const compClassDict = {
    0 : "CPU",
    1 : "CPU Cooler",
    2 : "RAM",
    3 : "Motherboard",
    4 : "PSU",
    5 : "SSD",
    6 : "HDD",
    7 : "GPU",
    8 : "Case"
}

function init() {
    let uid = getCookie("user_id");
    if (uid) {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText) {
                    let cartArray = JSON.parse(this.responseText);
                    console.log(cartArray);
                    renderCart(cartArray);
                }
            }
        }
        xmlhttp.open("GET", `./src/cartHandler.php?action=load&user_id=${encodeURIComponent(uid)}`, true);
        xmlhttp.send();
    }
}

function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return false;
}

function renderCart(cartArray) {
    for (let key in cartArray) {
        console.log("hi");
        let cartObj = cartArray[key];
        let componentList = document.createElement('ul');
        componentList.id = "componentList";
        for (let i = 0; i < cartObj.length; i++) {
            componentList.innerHTML += `<li class="compElem">
                                            <h2>${compClassDict[i]}</h2>
                                            <p>${cartObj[i]}</p>
                                        </li>`;
        }

        let cartElem = document.createElement('li');
        cartElem.classList.add("cartTemplate");
        cartElem.innerHTML = `  <div class="box-nav">
                                    <h1>Build ID: ${key}</h1>
                                    <span class="itemRemove">&times;</span>
                                </div>
                                <img class="cart-img" src="./images/dbpic/pc_case/${cartObj[8]}.jpg" height="200px" width="200px">
                                ${componentList.innerHTML}
                              `;

        console.log(cartElem);
        document.getElementsByClassName("cart")[0].appendChild(cartElem);
    }
}

init();