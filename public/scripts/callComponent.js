// you're free to delete this stuff, I only added it for testing purposes
cpu_button = document.getElementById("list-cpu");
cpu_list = document.getElementById("listed-cpu");

cpu_button.addEventListener("click", fetchCPU);

function fetchCPU() {
    fetchComponents("pc_case");
}

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

        for (let property in item){
            console.log(`${property}: ${item[property]}`);
            cpu_list.innerHTML += `${property}: ${item[property]}<br>`;
        }

        cpu_list.innerHTML += "<br>";
    }
}

function componentCallBack(list, component) {
    // must use callback to use data recieved from the server
    if (component == "cpu") {
        // do something with the component list
    }
    else if (component == "cpu_fan") {
        // do something else
    }  
    else {
        
    }
}