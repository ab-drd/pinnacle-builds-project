cpu_button = document.getElementById("list-cpu");
cpu_list = document.getElementById("listed-cpu");

cpu_button.addEventListener("click", showCPU);

function showCPU() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        cpu_list.innerHTML = this.responseText;
    }
    xmlhttp.open("GET", "requestHandler.php?q=CPU"), true;
    xmlhttp.send();
}