$('.form-delete').each(function () {
    let form = this;
    let continueBtn = this.querySelector('.btn');

    form.onsubmit =(e)=>{
        e.preventDefault();
    }

    continueBtn.onclick = ()=>{
        let xhr = new XMLHttpRequest()
        xhr.open("POST", "../../controller/delete.php");
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    location.reload();
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }
})
$('.form-delete-food').each(function () {
    let form = this;
    let continueBtn = this.querySelector('.btn-food');

    form.onsubmit =(e)=>{
        e.preventDefault();
    }

    continueBtn.onclick = ()=>{
        let xhr = new XMLHttpRequest()
        xhr.open("POST", "../../controller/deletefood.php");
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    location.reload();
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }
})