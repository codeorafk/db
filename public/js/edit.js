// errorText = document.querySelector(".error-text");

function buttonEdit(e){
    var a = "." + e;
    let tr = document.querySelector(a);
    tr.classList.toggle("d-none");
}

$('.form-edit').each(function () {
    let form = this;
    let continueBtn = this.querySelector('.btn-edit');

    form.onsubmit =(e)=>{
        e.preventDefault();
    }

    continueBtn.onclick = ()=>{
        let xhr = new XMLHttpRequest()
        xhr.open("POST", "../../controller/edit.php");
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    // errorText.textContent = data;
                    // errorText.classList.add("alert");
                    // errorText.classList.add("alert-danger");
                    // data = document.getElementsByClassName("error-text")[0].innerText;
                    // if(data == "success"){
                    //     location.reload();
                    // }else{
                        
                    // }
                    location.reload();
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }
})
$('.form-edit-food').each(function () {
    let form = this;
    let continueBtn = this.querySelector('.btn-edit-food');

    form.onsubmit =(e)=>{
        e.preventDefault();
    }

    continueBtn.onclick = ()=>{
        let xhr = new XMLHttpRequest()
        xhr.open("POST", "../../controller/editfood.php");
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    // errorText.textContent = data;
                    // errorText.classList.add("alert");
                    // errorText.classList.add("alert-danger");
                    // data = document.getElementsByClassName("error-text")[0].innerText;
                    // if(data == "success"){
                    //     location.reload();
                    // }else{
                        
                    // }
                    location.reload();
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }
})