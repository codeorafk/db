let form = document.querySelector(".formAddNew");
let button = document.querySelector('.btnAddNew');
let continueBtn = document.querySelector('.btnOk');
errorText = document.querySelector(".error-text");

button.onclick = function() {
    form.classList.toggle("d-none");
}

form.onsubmit =(e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest()
    xhr.open("POST", "../../controller/insert.php");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                errorText.textContent = data;
                errorText.classList.add("alert");
                errorText.classList.add("alert-danger");
                data = document.getElementsByClassName("error-text")[0].innerText;
                if(data == "Category insert Successfully"){
                    location.reload();
                }else{
                    
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}