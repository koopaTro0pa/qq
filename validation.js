let xmlHttpReq = new XMLHttpRequest();
//let queue = new Array();

function validate(){
    let args = "name=" + document.getElementById("name").value;
    let inputs = document.getElementsByTagName("input");
    for (let i=1; i<inputs.length; i++){
        args += ("&" + inputs[i].id + "=" + inputs[i].value);
    }
    try{
        xmlHttpReq.open("POST", "validation_ajax.php", true);
        xmlHttpReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttpReq.onreadystatechange = formResponseHandler;
        xmlHttpReq.send(args);
    } catch (exc){
        alert("Не удалось подключиться к серверу");
    }
}

function formResponseHandler(){
    try{
        if (xmlHttpReq.readyState == 4){
            if (xmlHttpReq.status != 200) throw new Exception();
            let response = JSON.parse(xmlHttpReq.responseText);
            if (response["response"]["false"].length > 0){
                response["response"]["false"].forEach(field => {document.getElementById(field[0] + "_failed").innerHTML = field[1];
                                                                let elem = document.getElementById(field[0]);
                                                                if (elem.classList.contains("is-valid")) elem.classList.remove("is-valid");
                                                                elem.classList.add("is-invalid");});
                response["response"]["true"].forEach(field => {document.getElementById(field + "_failed").innerHTML = "";
                                                               let elem = document.getElementById(field);
                                                               if (elem.classList.contains("is-invalid")) elem.classList.remove("is-invalid");
                                                               elem.classList.add("is-valid");});
            } else {
                document.getElementsByTagName("form")[0].style = "display: none";
                document.getElementById("success_message").style = "display: block";
            }
        }
    } catch (exp){
        alert("Не удается получить ответ от сервера");
    }
}