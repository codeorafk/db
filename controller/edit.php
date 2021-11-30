<?php 
    include('../config/constants.php');
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['name']);
    $featured = mysqli_real_escape_string($conn, $_POST['featured']);
    $active = mysqli_real_escape_string($conn, $_POST['active']);
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
        $image_name = "Food_Category_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
        

        $source_path = $_FILES['image']['tmp_name'];

        $destination_path = "../public/images/category/".$image_name;

        //Finally Upload the Image
        $upload = move_uploaded_file($source_path, $destination_path);

        $res2 = mysqli_query($conn, "UPDATE tbl_category SET title = '$title', image_name = '$image_name', featured = '$featured', active = '$active' WHERE id='$id'");
            if($res2==true)
            {
                //Category Updated
                echo "Category Updated Successfully" ;
            }
            else
            {
                //failed to update category
                echo "Failed to Update Category" ;
            }
    }
    else
    {
        $res2 = mysqli_query($conn, "UPDATE tbl_category SET title = '$title', featured = '$featured', active = '$active' WHERE id='$id'");
            if($res2==true)
            {
                //Category Updated
                echo "Category Updated Successfully" ;
            }
            else
            {
                //failed to update category
                echo "Failed to Update Category" ;
            }
    }
    //Execute the Query
    if($active == "No"){
        $res3 = mysqli_query($conn, "UPDATE tbl_food SET active = '$active' WHERE category_id='$id'");
    }
    if($active == "Yes"){
        $res3 = mysqli_query($conn, "UPDATE tbl_food SET active = '$active' WHERE category_id='$id'");
    }
?>

