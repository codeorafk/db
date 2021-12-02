<?php 
    //Start Session
    session_start();

    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/');
    define('view','http://localhost/view/');
    define('Ppath','http://localhost/public/');
    define('controller','http://localhost/controller/');

    define('LOCALHOST', 'localhost:8111');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'restaurant');
    
    define('LOCALHOST1', 'localhost:3306');     //  your mysql server
    define('DB_USERNAME1', 'root');             //  your mysql server
    define('DB_PASSWORD1', '');                 //  your mysql server
    define('DB_NAME1', 'rxtw');                 //  your mysql server
    
    define('LOCALHOST2', 'localhost:8111');     // rxtw in phpmyadmin
    define('DB_USERNAME2', 'root');             // rxtw in phpmyadmin
    define('DB_PASSWORD2', '');                 // rxtw in phpmyadmin
    define('DB_NAME2', 'rxtw');                 // rxtw in phpmyadmin

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error()); //Database Connection
    // $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database
    $conn1 = mysqli_connect(LOCALHOST1, DB_USERNAME1, DB_PASSWORD1, DB_NAME1) or die(mysqli_error());
    $conn2 = mysqli_connect(LOCALHOST1, DB_USERNAME1, DB_PASSWORD1, DB_NAME1) or die(mysqli_error());
?>