$(document).ready(function(){
    console.log("alo");
    $arr = document.querySelectorAll(".card-text");
    for($i = 0; $arr.length; $i++) {
        $arr[$i].innerText = $arr[$i].innerText.slice(0, 255) +"...";
    }
})

function subForm(t){
    t.parentElement.querySelector(".news-item").submit();
}