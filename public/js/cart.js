// function addToCart(id, name, price, image_path){
    
//     let e = `<div class='d-flex mb-4' style="padding-left:20px;">
//             <img src="http://localhost/code_xin/food-order-website-php-main/public/images/food/${image_path}" style='width:100px;height:100px;border-radius:5px;'>
//             <div class='w-75 ml-3 mr-3 row' style='overflow:hidden'>
//                 <div><strong>${name}</strong></div>
//                 <div class="price"><strong>${price}</strong></div>
//                 <textarea name="descript[]" rows="2" cols="30" placeholder="Note for food"></textarea><br>
//                 <a href="" id="remove-id">Remove</a>
//             </div>
//             <div class='w-25 mr-3 d-flex align-items-center justify-content-center'>
//                 <div class="input-group" style='width:120px'>
//                     <div class="input-group-prepend" style='cursor:pointer' onclick="">
//                         <span class="input-group-text">-</span>
//                     </div>
//                     <input type="text" class="form-control" value='1' id="totalBuy" name="quantity[]">
//                     <div class="input-group-append" style='cursor:pointer' onclick="">
//                         <span class="input-group-text">+</span>
//                     </div>
//                 </div>
//             </div>
//             <input type='hidden' value=${id} name="id[]">
//         </div>`
//     $('.appendOrder').append(e);

//     let xhr = new XMLHttpRequest()
//     xhr.open("POST", "../../controller/cart.php");
//     xhr.onload = ()=>{
//         if(xhr.readyState === XMLHttpRequest.DONE){
//             if(xhr.status === 200){
//                 let data = xhr.response;
//                 console.log(data);
//             }
//         }
//     }
//     let formData = new FormData(form);
//     xhr.send(formData);
// }
// $('.itemCart').each(function(){
//     let removeBtn = this.querySelector(".remove");
//     let removeform = this.querySelector(".removeForm");
//     removeform.onsubmit = (e)=>{
//         e.preventDefault();
//     }
//     removeBtn.onclick = ()=>{

//         this.remove();

        // let xhr = new XMLHttpRequest()
        // xhr.open("POST", "../controller/remove-item.php");
        // xhr.onload = ()=>{
        //     if(xhr.readyState === XMLHttpRequest.DONE){
        //         if(xhr.status === 200){
        //             let data = xhr.response;
        //             console.log(data);
        //         }
        //     }
        // }
        // let formData = new FormData(form);
        // xhr.send(formData);
//     }
// })

function removeCart(e) {
    var a = ".itemCart" + e;
    var f = "." + e + "Form";
    var form = document.querySelector(f);
    let xhr = new XMLHttpRequest()
    xhr.open("POST", "../controller/remove-item.php");
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);

    document.querySelector(a).remove();
};

$('.orderForm').each(function() {
    let form = this;
    let continueBtn = this.querySelector('.btn');
    let id = this.querySelector('.food_id').value;
    let name = this.querySelector('.food_title').value;
    let price = this.querySelector('.food_price').value;
    let image_path = this.querySelector('.food_image_name').value;

    form.onsubmit =(e)=>{
        e.preventDefault();
    }

    continueBtn.onclick = ()=>{
        var tmp = ".itemCartremove"+id
        var item = document.querySelector(tmp);
        if(document.querySelector(tmp) != null)
        {
            item.querySelector(".quantity-item").value = parseInt(item.querySelector(".quantity-item").value) + 1;
        }
        else{
            let e = `<div class="itemCartremove${id}">
        <div class='d-flex mb-4' style="padding-left:20px;">
            <img src="http://localhost/public/images/food/${image_path}" style='width:100px;height:100px;border-radius:5px;'>
            <div class='w-75 ml-3 mr-3' style='overflow:hidden'>
                <div><strong>${name}</strong></div>
                <div class="price"><strong>${price}</strong></div>
                <form action="" class="remove${id}Form">
                    <input type="hidden" value=${id} name="id-remove">
                    <button class="btn btn-primary" id="remove${id}" onclick="removeCart(this.id)" name="removeBtn">Remove</button>
                </form>
            </div>
            <div class='w-25 mr-3 d-flex align-items-center justify-content-center'>
                <div class="input-group" style='width:120px'>
                    <div class="input-group-prepend" style='cursor:pointer' onclick="decTotal(this , ${price})">
                        <span class="input-group-text">-</span>
                    </div>
                    <input readonly="readonly" type="text" class="form-control quantity-item" value="1" name="quantity[]">
                    <form class="quantityForm">
                        <input type="hidden" value="${id}" name="id">
                    </form>
                    <div class="input-group-append" style='cursor:pointer' onclick="incTotal(this , ${price})">
                        <span class="input-group-text">+</span>
                    </div>
                </div>
            </div>
            <input class="item-id" type='hidden' value=${id} name="id[]">
        </div>
    </div>`
        $('.appendOrder').append(e);
        }
        
        let xhr = new XMLHttpRequest()
        xhr.open("POST", "../controller/cart.php");
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    console.log(data);
                    // errorText.textContent = data;
                    // errorText.classList.add("alert");
                    // errorText.classList.add("alert-danger");
                    // data = document.getElementsByClassName("error-text")[0].innerText;
                    // if(data == "success"){
                    //     location.reload();
                    // }else{
                        
                    // }
                    // location.reload();
                }
            }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }
});

function incTotal(t, price){
    console.log(price)
    var check = parseInt(t.parentElement.querySelector(".quantity-item").value) + 1;
    t.parentElement.querySelector(".quantity-item").value = check;
    form = t.parentElement.querySelector(".quantityForm")
    let xhr = new XMLHttpRequest()
        xhr.open("POST", "../controller/inc.php");
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    console.log(data);
                }
            }
        }
    
    xhr.send(new FormData(form))
}

function decTotal(t, price){
    console.log(price)
    var check = parseInt(t.parentElement.querySelector(".quantity-item").value) - 1;
    if(check >= 1){
        t.parentElement.querySelector(".quantity-item").value = check;
        form = t.parentElement.querySelector(".quantityForm")
        let xhr = new XMLHttpRequest()
            xhr.open("POST", "../controller/dec.php");
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        console.log(data);
                    }
                }
            }
        
        xhr.send(new FormData(form))
    }

    
}