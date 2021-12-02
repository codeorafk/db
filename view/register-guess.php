<?php include('../config/constants.php'); ?>
<?php

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        $raw_password_re = md5($_POST['password_re']);
        $password_re = mysqli_real_escape_string($conn, $raw_password_re);


        $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM customer WHERE username='$username'";

        //3. Execute the Query
        $res = mysqli_query($conn1, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        // if($count == 1)
        // {
        //     //User AVailable and Login Success
        //     // $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        //     // $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

        //     //REdirect to HOme Page/Dashboard
        //     // header('location:'.view.'admin/';
        //     // header("Location: /index.php");
        //     // $_SESSION['login'] = "<div class='error text-center'>Trùng tên.</div>";
            
        //     $message = "Trùng username rồi mai phen";
        //     echo "<script type='text/javascript'>alert('$message');</script>";  
        //     // header('location:'.view.'register-guess.php');
        //     // header('location:'.view.'/register-guess.php');
        //     // exit;
 
        // } else
        // {
            $user = $username;
            
            $sqlInsert1 = "CALL insertUser('$username', '$password' , 1);" ;
            $res1 = mysqli_query($conn1, $sqlInsert1);
            $count = mysqli_num_rows($res1);
            echo $count;
            $message = mysqli_fetch_assoc($res1);
            // exit;
        // }
        if($message['message'] == 'oke roi do'){
            echo $full_name.$email.$user.$address.$phone;
            $res2 = mysqli_query($conn2, "INSERT INTO customer set full_name='$full_name', email='$email', Sex='M', userName='$user', address='$address', phone='$phone', status='Unactive' ");
            header('location:'.view.'index.php');
            $_SESSION['guess'] = $username;
        }

    }

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../public/js/register-guess.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="../public/css/register-guess.css" rel="stylesheet">
    <script>

    </script>
</head>

<body>

<div class="container">
<!-- <div class="d-flex justify-content-center links" style="color: red;   font-weight: bold;">
    UI only, đừng kick bậy bạ!!
</div> -->
<div class="card bg-light" style="max-width: 800px; min-width:600px; margin:auto">
<!-- <article class="card-body mx-auto" style="max-width: 400px;"> -->
    <!-- ok -> -->
<!-- <article class="card-body text-center" style="min-width: 500 px; max-width: 800px;">  -->
    <!-- <- ok -->
<article class="card-body" style="max-width: 600px; min-width:450px; margin:auto">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	<p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p>
	<p class="divider-text">
        <span class="bg-light"><b>OR</span>
    </p>
    
	<form action="" method="POST" class="text-center">
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
            </div>
            <input name="full_name" class="form-control" placeholder="Full name" type="text"  onchange="checkMail();" id="full_name">
        </div> <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
            </div>
            <input name="email" class="form-control" placeholder="Email address" type="email" id="email" onchange="checkMail();">
        </div> <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
            <!-- <select class="custom-select" style="max-width: 120px;">
                <option selected="">+971</option>
                <option value="1">+972</option>
                <option value="2">+198</option>
                <option value="3">+701</option>
            </select> -->
            <input name="phone" class="form-control" placeholder="Phone number" type="number" onchange="checkMail();" id="phone">
        </div> 
        <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa-solid fa-map-location-dot"></i> </span>
            </div>
            <input name="address" class="form-control" placeholder="Address" type="text"  onchange="checkMail();" id="address">
        </div> <!-- form-group// -->

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa-solid fa-user-tag"></i> </span>
            </div>
            <input name="username" class="form-control" placeholder="User name" type="text" onchange="checkMail();" id="username">
        </div> <!-- form-group// -->
        
        <div class="form-group input-group popup">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" placeholder="Create password" type="password" name="password" id="password" onchange="checkPassword();">
            <!-- <span class="popuptext" id="myPopup">Password must be the same</span> -->
        </div> <!-- form-group// -->
        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input class="form-control" placeholder="Repeat password" type="password" name="password_re" id="password_re" onchange="checkPassword();">
            <!-- <span class="popuptext" id="myPopup2">Password must be the same</span> -->
        </div> <!-- form-group// -->             

        <p class="d-hidden" style="color: red;" id="warning-same">Password must be the same</p> 
        <p class="d-hidden" style="color: red;" id="warning-null">Password must not be null</p>  
        <p class="d-hidden" style="color: red;" id="warning-mail">Please fill all value</p>  

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="submit"> Create Account  </button>
        </div> <!-- form-group// -->      
        <div class="messagetxt" style="color: red">
            <?php 
                if($message['message'] != 'oke roi do'){
                    echo $message['message'];
                }

            ?>
        </div>
        <p class="text-center">Have an account? <a href="login-guess2.php">Log In</a> </p>                                                                 
    </form>
</article>  <!-- card-body.// -->
</div> <!-- card.// -->

</div> 
<!--container end.//-->


</body>

</html>