<?php 
    include('../config/constants.php');
    
    $title = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $des = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $featured = mysqli_real_escape_string($conn, $_POST['featured']);
    $active = mysqli_real_escape_string($conn, $_POST['active']);
    if(!empty($title) && !empty($price) &&  !empty($des) && !empty($category) && !empty($featured) && !empty($active)){    
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
            $image_name = $_FILES['image']['name'];

            $tmp = explode('.', $_FILES['image']['tmp_name']);
            $ext = end($tmp);
            //Rename the Image
            $image_name = "Food_Name_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
            

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../public/images/food/".$image_name;

            //Finally Upload the Image
            $upload = move_uploaded_file($source_path, $destination_path);
        }
        else
            $image_name = "default.jpg";
        //Execute the Query
        $res2 = mysqli_query($conn, "INSERT INTO tbl_food SET title = '$title', image_name = '$image_name', featured = '$featured', active = '$active',description='$des',category_id=$category ,price='$price'");
        if($res2==true)
        {
            //Category Updated
            echo "Food insert Successfully" ;
        }
        else
        {
            //failed to update category
            echo "Fail to insert Food" ;
        }
    }
    else{
        echo "Missing Some Input";
    }
?>

