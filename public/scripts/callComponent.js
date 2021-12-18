cpu_button = document.getElementById("list-cpu");
cpu_list = document.getElementById("listed-cpu");

cpu_button.addEventListener("click", showCPU);

function showCPU() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState==4 && this.status==200) {
            console.log(this.responseText);
            var arrayObject = JSON.parse(this.responseText);

            for (let key in arrayObject) {
                
                item = arrayObject[key];
                for (let property in arrayObject[key]){
                    cpu_list.innerHTML += `${property} : ${arrayObject[key][property]}<br>`;
                }

                cpu_list.innerHTML += "<br>";
            }
            
        }
    }

    xmlhttp.open("GET", "./src/componentRequestHandler.php?q=CPU", true);
    xmlhttp.send();
}