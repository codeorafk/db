1. Download as as Zip or Clone this project

2. Import Database

Database in model folder

3. Make Changes to settings

Go to 'config' folder and Open 'constants.php' file. Then make changes on following constants
```php
<?php 
//Start Session
session_start();

//Create Constants to Store Non Repeating Values
define('SITEURL', 'http://localhost/'); //Update the home URL of the project if you have changed port number or 
define('view','http://localhost/view/');//
define('Ppath','http://localhost/public/');//
define('controller','http://localhost/controller/');//


define('LOCALHOST', 'localhost');//Update your port database
define('DB_USERNAME', 'root');// database name
define('DB_PASSWORD', ''); // password
define('DB_NAME', 'restaurant');
    
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database 

?>
```

4. Now, Open the project in your browser. It should run perfectly.

5. Photo: 
https://photos.google.com/share/AF1QipPfln5UPLYBo7RBN_Y8zFGAb6JpWsgarGS8pCx9ZZtR3R3V3dTb5Le15LdeBbWsVw?key=RmxjdzNnemNwUk5VSFNnU3ZUcE5fSW1rNnNaV2F3