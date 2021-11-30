<?php include('../config/constants.php'); ?>
<?php
    $username = $_SESSION['guess'];
    $sql = "SELECT * FROM tbl_guess WHERE username='$username'";
    // $sql = "SELECT * FROM tbl_guess ORDER BY id DESC"; // DIsplay the Latest Order at First
    //Execute Query
    $res = mysqli_query($conn, $sql);
    //Count the Rows
    $count = mysqli_num_rows($res);

    $sn = 1; //Create a Serial Number and set its initail value as 1

    //Order Available
    // while($row=mysqli_fetch_assoc($res))
    $row=mysqli_fetch_assoc($res);
    
    //Get all the order details
    $id = $row['id'];
    $customer_name = $row['full_name'];
    $customer_contact = $row['phone'];
    $customer_email = $row['email'];
    $customer_address = $row['address'];
    $status = $row['status'];
    $customer_username = $row['username'];

        

    function toggleStatus() {
        global $conn;
        global $status;
        $username = $_SESSION['guess'];
        $sql = "SELECT * FROM tbl_guess WHERE username='$username'";
        $res = mysqli_query($conn, $sql);
        //Count the Rows
        $count = mysqli_num_rows($res);
        $row=mysqli_fetch_assoc($res);
        $currStt = $row['status'];
        if ($currStt == 'Banning') {
            return "Banning";
        }
        if ($currStt == 'Active') {
            $sql2 = "UPDATE tbl_guess SET status = 'Sleeping' WHERE username='$username'";
            $res2 = mysqli_query($conn, $sql2);
            if($res2==true)
            {
                //Category Updated
                // echo "Category Updated Successfully" ;
            }
            else
            {
                //failed to update category
                // echo "Failed to Update Category" ;
            }
            // $status = 'Sleeping';
            // header("Location: /profile.php");
            // header("Refresh:1; url=profile.php");
            return "Sleeping";
        }
        $sql1 = "UPDATE tbl_guess SET status = 'Active' WHERE username='$username'";
        $res1 = mysqli_query($conn, $sql1);
        if($res1==true)
        {
            //Category Updated
            // echo "Category Updated Successfully" ;
        }
        else
        {
            //failed to update category
            // echo "Failed to Update Category" ;
        }
        // $status = 'Active';
        // header("Location: /profile.php");
        // header("Refresh:1; url=profile.php");
        return "Active";
    }
    if(isset($_POST['submitStt'])) {
        global $conn;
        global $status;
        $username = $_SESSION['guess'];
        $sql = "SELECT * FROM tbl_guess WHERE username='$username'";
        $res = mysqli_query($conn, $sql);
        //Count the Rows
        $count = mysqli_num_rows($res);
        $row=mysqli_fetch_assoc($res);
        $currStt = $row['status'];
        if ($currStt == 'Banning') {
            // return;
        }
        elseif ($currStt == 'Active') {
            $sql2 = "UPDATE tbl_guess SET status = 'Sleeping' WHERE username='$username'";
            $res2 = mysqli_query($conn, $sql2);
            $status = 'Sleeping';
            
            // return "Sleeping";
        }
        else {
            $sql1 = "UPDATE tbl_guess SET status = 'Active' WHERE username='$username'";
            $res1 = mysqli_query($conn, $sql1);
            $status = 'Active';
        }
    }  

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
        $sql = "SELECT * FROM tbl_guess WHERE username='$username'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if(false)
        {
            
            $message = "Trùng username rồi mai phen";
            echo "<script type='text/javascript'>alert('$message');</script>";  

        } else
        {
            $sqlInsert = "UPDATE tbl_guess SET (`full_name`, `email`, `username`, `address`, `password`, `phone`)
            VALUES ('$customer_name', '$customer_email', '$customer_username', '$customer_address', '$password', '$customer_contact',)";
            // VALUES ('{$id}', '{$name}', '{$year}')";
    
            if ($conn->query($sqlInsert) === TRUE) {
                echo "Edit dữ liệu thành công";
            } else {
                echo "Error: " . $sqlInsert . "<br>" . $conn->error;
            }
            // exit;
        }
    }
    
?>

<!DOCTYPE html>
<html>

<head>




    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <title>Modify profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../public/js/profile.js"></script>
</head>

<body>
    <!-- <div class="container bootstrap snippet"> -->
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <h1>User name: 
                    <?php
                        echo $_SESSION['guess'];
                    ?>
                </h1>
            </div>
            <div class="col-sm-2"><a href="index.php" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->


                <div class="text-center">
                    <label for="avatar">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    </label>
                    <!-- <h6>Upload a different photo...</h6> -->
                    <input type="file" class="text-center center-block file-upload" id="avatar" hidden>
                </div>
                </hr><br>


                <div class="panel panel-default">
                    <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                    <div class="panel-body"><a href="https://www.facebook.com/lh.rav/">www.fb.com/lh.rav/</a></div>
                </div>

                <form action="" method="POST" class="text-center">
                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right">
                        <span class="pull-left">
                        <strong>Status</strong></span>
                        <!-- <span id="status" onclick="document.getElementById('status').innerHTML =  '<?php //echo toggleStatus();?>'  ">
                            <?php //echo $status;
                            ?>
                        </span> -->
                        <!-- <form action="" method="POST" class="text-center"> -->
                            <button class="btn btn-primary" id="status" name="submitStt" type="submit">
                                <?php echo $status;
                                ?>
                            </button>
                        <!-- </form> -->

                    </li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
                </ul>
                </form>

                <div class="panel panel-default">
                    <div class="panel-heading">Social Media</div>
                    <div class="panel-body">
                        <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                    </div>
                </div>

            </div>
            <!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Edit your profile</a></li>
                    <!-- <li><a data-toggle="tab" href="#messages">Menu 1</a></li>
                    <li><a data-toggle="tab" href="#settings">Menu 2</a></li> -->
                </ul>


                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <label for="full_name">
                                        <h4>Full name</h4>
                                    </label>
                                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="full name" title="enter your full name." value="<?php
                                        echo $customer_name;
                                    ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="username">
                                        <h4>User name</h4>
                                    </label>
                                    <input readonly="readonly" type="text" class="form-control" name="username" id="username" placeholder="User name" title="enter username." value="<?php
                                        echo $customer_username;
                                    ?>">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Email</h4>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." value="<?php
                                        echo $customer_email;
                                    ?>">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="phone">
                                        <h4>Phone</h4>
                                    </label>
                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number." value="<?php
                                        echo $customer_contact;
                                    ?>">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="Address">
                                        <h4>Address</h4>
                                    </label>
                                    <input type="Address" class="form-control" id="Address" placeholder="somewhere" title="enter a location" value="<?php
                                        echo $customer_address;
                                    ?>">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="password">
                                        <h4>New Password</h4>
                                    </label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="password2">
                                        <h4>Verify</h4>
                                    </label>
                                    <input type="password" class="form-control" name="password_re" id="password_re" placeholder="password again" title="enter your password2.">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit" name="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                </div>
                            </div>
                        </form>

                        <hr>

                    </div>
                </div>
                <!--/tab-pane-->
            </div>
            <!--/tab-content-->

        </div>
        <!--/col-9-->
    </div>
    <!--/row-->




</body>

</html>