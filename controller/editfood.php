<?php 
    include('../config/constants.php');
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $featured = mysqli_real_escape_string($conn, $_POST['featured']);
    $active = mysqli_real_escape_string($conn, $_POST['active']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    // if(!empty($id) && !empty($name) && !empty($year)){
    //     $pattern1 = "/^[0-9]+$/i";
    //     if(preg_match($pattern1, $id) && strlen($name) >= 1 && strlen($name) <= 40 && preg_match($pattern1, $year) && $year >= 0 && $year <= 2021){
    //         $sql2 = mysqli_query($conn, "UPDATE cars SET name ='{$name}', year ='{$year} 'WHERE id ='{$id}'");
    //         if($sql2){
    //             echo "success";
    //         }else{
    //             echo "Something is wrong";
    //         }
    //     }else{
    //         echo "Input form is wrong";
    //     }
    // }else{
    //     echo "All input field are required!";
    // }

    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
        $image_name = $_FILES['image']['name'];

        $ext = end(explode('.', $image_name));

        //Rename the Image
        $image_name = "Food-Name-".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
        

        $source_path = $_FILES['image']['tmp_name'];

        $destination_path = "../public/images/food/".$image_name;

        //Finally Upload the Image
        $upload = move_uploaded_file($source_path, $destination_path);
        $res2 = mysqli_query($conn, "UPDATE tbl_food SET title = '$title', price = '$price', image_name = '$image_name',category_id='$category', featured = '$featured', active = '$active' WHERE id=$id");
        if($res2==true)
        {
            //Category Updated
            echo "Food Updated Successfully" ;
        }
        else
        {
            //failed to update category
            echo "Failed to Update Food" ;
        }
    }
    else
    {
        // $image_name = "default.jpg";
    //Execute the Query
        $res2 = mysqli_query($conn, "UPDATE tbl_food SET title = '$title', price = '$price',category_id='$category', featured = '$featured', active = '$active' WHERE id=$id");
        if($res2==true)
        {
            //Category Updated
            echo "Food Updated Successfully" ;
        }
        else
        {
            //failed to update category
            echo "Failed to Update Food" ;
        }
    }
?>

