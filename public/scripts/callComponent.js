cpu_button = document.getElementById("list-cpu");
cpu_list = document.getElementById("listed-cpu");

cpu_button.addEventListener("click", showCPU);

function fetchComponent() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var CPUarray = JSON.parse(this.responseText);

            for (let key in CPUarray) {
                
                item = CPUarray[key];
                for (let property in CPUarray[key]){
                    cpu_list.innerHTML += `${property} : ${CPUarray[key][property]}<br>`;
                }

                cpu_list.innerHTML += "<br>";
            }
        }
    }

    xmlhttp.open("GET", "./src/componentRequestHandler.php?component=cpu", true);
    xmlhttp.send();
}