function checkPassword() {
              
    password1 = document.getElementById('password').value;
    password2 = document.getElementById('password_re').value;
  //   password1 = form.password1.value;
  //   password2 = form.password2.value;
    // If password not entered
    if (password1 == '' || password2 == '') {
        // document.getElementById("waring").style.display = "none";
        // document.getElementById("warning").style.visibility = "inherit";
        document.getElementById("warning-null").style.display = "block";
        document.getElementById("warning-same").style.display = "none";
    }
          
    // If Not same return False.    
    else if (password1 != password2) {
      //   alert ("\nPassword did not match: Please try again...")
    //   var popup = document.getElementById("myPopup");
    //   popup.classList.toggle("show");
      //   return false;
        document.getElementById("warning-null").style.display = "none";
        document.getElementById("warning-same").style.display = "block";
    }

    // If same return True.
    else{
        document.getElementById("warning-null").style.display = "none";
        document.getElementById("warning-same").style.display = "none";
        return true;
    }
}

function checkMail() {
              
    full_name = document.getElementById('full_name').value;
    phone = document.getElementById('phone').value;
    email = document.getElementById('email').value;
    address = document.getElementById('address').value;
    username = document.getElementById('username').value;
    //   password1 = form.password1.value;
  //   password2 = form.password2.value;
    // If password not entered
    if (full_name == '' || phone == '' || email == '' || address == '' || username== '') {
        // document.getElementById("waring").style.display = "none";
        // document.getElementById("warning").style.visibility = "inherit";
        document.getElementById("warning-mail").style.display = "block";
    }
    // If same return True.
    else{
        document.getElementById("warning-mail").style.display = "none";
        return true;
    }
}