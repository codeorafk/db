$('.editOrderForm').each(function () {
    let form = this;
    let continueBtn = this.querySelector('.btn');

    form.onsubmit =(e)=>{
        e.preventDefault();
    }

    continueBtn.onclick = ()=>{
        let xhr = new XMLHttpRequest()
        xhr.open("POST", "../../controller/editOrder.php");
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
                    this.parentElement.parentElement.querySelector(".status_order").innerText = data;
                    $status = this.parentElement.parentElement.querySelector(".status_order").innerText;
                    if($status=="Ordered")
                    {
                        console.log("1");
                        this.parentElement.parentElement.querySelector(".status_order").parentElement.innerHTML = `<label class='status_order'>Ordered</label>`;
                    }
                    else if($status=="On Delivery")
                    {
                        console.log("1");
                        this.parentElement.parentElement.querySelector(".status_order").parentElement.innerHTML = `<label class='status_order' style='color: orange;'>On Delivery</label>`;
                    }
                    else if($status=="Delivered")
                    {
                        console.log("1");
                        this.parentElement.parentElement.querySelector(".status_order").parentElement.innerHTML = `<label class='status_order' style='color: green;'>Delivered</label>`;
                    }   
                    if($status == "Completed")
                    {
                        this.parentElement.parentElement.remove();
                    }
                    //location.reload();
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }
})