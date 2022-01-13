function init() {
    let uid = getCookie("user_id");
    console.log("hi");
    if (uid) {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText) {
                    let cartElements = JSON.parse(this.responseText);
                    console.log(cartElements);
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

init();