let form = document.querySelector(".formAddFood");
let button = document.querySelector('.btnAddFood');
let continueBtn = document.querySelector('.fbtnOk');
errorText = document.querySelector(".food-error-text");

button.onclick = function() {
    form.classList.toggle("d-none");
}

form.onsubmit =(e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest()
    xhr.open("POST", "../../controller/insertfood.php");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                errorText.textContent = data;
                errorText.classList.add("alert");
                errorText.classList.add("alert-danger");
                data = document.getElementsByClassName("food-error-text")[0].innerText;
                if(data == "Food insert Successfully"){
                    location.reload();
                }else{
                    
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}