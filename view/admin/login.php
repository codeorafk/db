<?php include('../../config/constants.php'); ?>
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

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.view.'admin/');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.view.'admin/login.php');
        }


    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="<?php echo Ppath; ?>css/admin.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="../public/css/login-guess.css"> -->
        <link rel="stylesheet" href="/public/css/login-guess.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>

    <body>
    <div class="container h-100">
        <!-- <h1 class="text-center">Login</h1> -->
        <!-- <br><br> -->

        <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>
        <!-- <br><br> -->
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="https://lh3.googleusercontent.com/oGx3exzt54pbcRnydCDg5n6PQLTX3QWpx0bnxD8nOICNIF9WK_U0HYvo9UxP0ba9sLEzPNqhmOxv_jdjNjwtgcpkbfwOnnDMykHLiQ3lkxr2S-Op_zkzAal9TI4W-d_jdRqbgWp7vHlA81DX8_DTRi4GObWhCNCTzAUWjnCfUgRSii3Cy2nnyfWd4E4cEfOe0WWrDiHpWAZbxMq_YYofFciuORiHXC1tiVmOlwp_iCuaoE0sbcZJSD5cw15CJZeFxvFDBPE46ssniUzdFd4PsKErI6ZGruavHTWwY_HgDm6gLRcn8WqkT0oKVT5lB2F6DpDQy53FwbE0lsfS9bhqT2NmmfzuwYvHf3xoc9bRDMeytRlLBab2nylC_t1yBOXVeKo9IDo2bH2UPSD5BjEvzRerlKe1-kZS89axwaZhE-KtlAO--LqbfFISv5xQGymaLFS_0fSLLITdCIa58DxdBz62OwpmDcgUnWhGlbhN6qRR3xFYiDK0GxzN07_Qt1tpmYxBYva4jh7zg7QbTI0gVj2RR5xp7AEwysu_VrT5huo4tj0Lvbv7fVfG1Ad3I5kKj_Bano8CdC2gthego8DCrIcPFuTWJ-3RTFORFhAfmcBt8ifWsEiOSeGs4ud7Z16ViuoME1vE4h_UY0j8sXzlZXgZCPisu1IWLg-aMDHzWS_-BbAa1CxfMbgunqH-SaeT9S6PUwHHozcSVSzerpnvsyTe=s944-no" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="" method="POST" class="text-center">
                        <div class="d-flex justify-content-center links" style="color: red;   font-weight: bold;">
                            Login for Admin Only!!
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="username" class="form-control input_user" value="" placeholder="username">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
                        </div>
                        <!-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                            </div>
                        </div> -->
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="submit" class="login_btn">Login</button>
                            <!-- <input type="submit" name="submit" value="Login" class="btn-primary"> -->

                        </div>
                    </form>
                </div>

                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        Don't have an account? Contact Admin!!
                    </div>
            <p class="text-center">Created By - <a href="#">Rap xiec trung uong</a></p>
                    
                    <!-- <div class="d-flex justify-content-center links">
                        <a href="#">Forgot your password?</a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
        <!-- <div class="login">
            <h1 class="text-center">Login</h1>
            <br><br>

            <h1>php</h1>
            <br><br>

            Login Form Starts HEre
            <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            Login Form Ends HEre
        </div> -->

    </body>
</html>

