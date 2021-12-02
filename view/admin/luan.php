
<?php include('partials/menu.php'); ?>
<?php 
    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['insert_submit']))
    {
        // cnDB
        
        // $id_new = mysqli_real_escape_string($conn1, $_POST['id_new']);
        
        $date_new = mysqli_real_escape_string($conn1, $_POST['date_new']);

        $namePn_new = mysqli_real_escape_string($conn1, $_POST['namePn_new']);
        $phone_new = mysqli_real_escape_string($conn1, $_POST['phone_new']);
        $ID_b_new = mysqli_real_escape_string($conn1, $_POST['ID_b_new']);
        if (!(!empty($date_new) && !empty($namePn_new) &&  !empty($phone_new) && !empty($ID_b_new))){ 
            echo "Missing Some Input";   
        }
        else {
            $res = mysqli_query($conn1, "call AddImportOrder('$date_new','$namePn_new', '$phone_new', '$ID_b_new',)");
            if($res==true)
            {
                //Category Updated
                echo "Insert import order successfully" ;
            }
            else
            {
                //failed to update category
                echo "Fail to insert import order" ;
            }
        }
        
        // $res2 = mysqli_query($conn1, "INSERT INTO tbl_food SET title = '$title', image_name = '$image_name', featured = '$featured', active = '$active',description='$des',category_id=$category ,price='$price'");

        
        // //2. SQL to check whether the user with username and password exists or not==========================================
        // $sql = "SELECT * FROM customer WHERE username='$username'";

        // //3. Execute the Query
        // $res = mysqli_query($conn1, $sql);

        // //4. COunt rows to check whether the user exists or not
        // $count = mysqli_num_rows($res);

    
        // $user = $username;
        
        // $sqlInsert1 = "CALL insertUser('$username', '$password' , 1);" ;
        // $res1 = mysqli_query($conn1, $sqlInsert1);
        // $count = mysqli_num_rows($res1);
        // echo $count;
        // $message = mysqli_fetch_assoc($res1);
        //     // exit;
        // // }
        // if($message['message'] == 'oke roi do'){
        //     echo $full_name.$email.$user.$address.$phone;
        //     $res2 = mysqli_query($conn2, "INSERT INTO customer set full_name='$full_name', email='$email', Sex='M', userName='$user', address='$address', phone='$phone', status='Unactive' ");
        //     header('location:'.view.'index.php');
        //     $_SESSION['guess'] = $username;
        // }



    }


?>

<script>
    function addNew() {
        var btn1 = document.querySelector('#ipForm');
        btn1.classList.toggle("d-none");
    }
</script>

<div class="container-fluid main-content">
    <div class="wrapper">
        <h1>Manage by Luan</h1>
        <div class="food-error-text">     
                <!-- "alert alert-danger"    -->
        </div>
        <br /><br />

                <!-- Button to Add Admin -->
        <div class="row">
            <div class="col-1"></div>
            <button class="btn btn-primary" style="margin: 1%;" id="addNew" onclick="addNew();">Thêm đơn nhập hàng mới</button>
        </div>
        

        <form class="formAddFood d-none" action="" method="POST" id="ipForm">
            <!-- <div class="form-group row">
                <label class="col-3 text-right col-form-label" for="idnew">Nhập id:</label>
                <input type="text" class="form-control col-7" id="idnew" name="id">
            </div> -->
            <div class="form-group row">
                <div class="col-1"></div>
                <label class="col-2 col-form-label" for="id_new">Import ID (optional):</label>
                <input type="number" class="form-control col-7" id="id_new" name="id_new">
            </div>
            <div class="form-group row">
                <div class="col-1"></div>
                <label class="col-2 col-form-label" for="date_new">Import Date:</label>
                <input type="text" class="form-control col-7" id="date_new" name="date_new">
            </div>
            <div class="form-group row">
                <div class="col-1"></div>
                <label class="col-2 col-form-label" for="namePn_new">Name of partner:</label>
                <input type="text" class="form-control col-7" id="namePn_new" name="namePn_new">
            </div>
            <div class="form-group row">
                <div class="col-1"></div>
                <label class="col-2 col-form-label" for="phone_new">Phone number of partner:</label>
                <input type="text" class="form-control col-7" id="phone_new" name="phone_new">
            </div>
            <div class="form-group row">
                <div class="col-1"></div>
                <label class="col-2 col-form-label" for="ID_b_new">ID of branch:</label>
                <input type="number" class="form-control col-7" id="ID_b_new" name="ID_b_new">
            </div>
            <div class="form-group row">
            <div class="offset-3">
                <button class="btn btn-secondary ml-auto" style="min-width: 150%" name="insert_submit" id="insert_submit" type="submit">I'm sure about that</button>
            </div>
            </div>
        </form>






            <!-- <div class="table-reponsive-xl">                    -->
            <div class="table-reponsive-xl-luan">                   
                <table class="table">
                    <tr>
                        <th>S.N.</th>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Name partner</th>
                        <th>Phone number of partner</th>
                        <th>ID_branch</th>
                    </tr>

                    <?php 
                        //Create a SQL Query to Get all the Food
                        $sql = "SELECT * FROM import_order";

                        //Execute the qUery
                        $res = mysqli_query($conn1, $sql);

                        //Count Rows to check whether we have foods or not
                        $count = mysqli_num_rows($res);

                        //Create Serial Number VAriable and Set Default VAlue as 1
                        $sn=1;

                        if($count>0)
                        {
                            //We have food in Database
                            //Get the Foods from Database and Display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //get the values from individual columns
                                $id = $row['ID'];
                                $IDate = $row['IDate'];
                                $Name_partner = $row['Name_partner'];
                                $Phone_partner = $row['Phone_partner'];
                                $ID_branch = $row['ID_branch'];
                                ?>

                                <tr class="food-menu-box">
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $IDate; ?></td>
                                    <td><?php echo $Name_partner;?></td>
                                    <td><?php echo $Phone_partner; ?></td>
                                    <td><?php echo $ID_branch; ?></td>
                                    <td class="d-flex">
                                        <form class="form-delete-food" action="" method="POST">
                                            <input type="text" value="<?php echo $id; ?>" name ="food_id" hidden>
                                            <button name="btnDel" type="submit" class="btn-food btn-outline-danger btn-sm">Xóa</button>
                                        </form>
                                        <button id="btnEdit<?php echo $id; ?>" onclick="buttonEdit(this.id)"type="click" class="bth-food btn-outline-info btn-sm">Sửa</button>
                                    </td>
                                </tr>
                                <!-- <tr class="btnEdit<?php //echo $id; ?>">
                                        <td colspan="6">
                                            <form class="form-edit-food" action="" method="POST" enctype='multipart/form-data'>
                                                <div class="form-group row">
                                                    <label class="col-3 text-right col-form-label"  name="id"><b>Sửa dòng này</b></label>
                                                </div>
                                            <div class="form-group row">
                                                <input type="hidden" name="id" value="<?php //echo $id; ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="name-edit<?php //echo $id; ?>">Nhập Tên partner:</label>
                                                <input type="text" class="form-control col-7" id="name-edit<?php //echo $id; ?>" name="name" value="<?php echo $title; ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="name-edit<?php //echo $id; ?>">Nhập Date:</label>
                                                <input type="date" class="form-control col-7" id="name-edit<?php //echo $id; ?>" name="price" value="<?php echo $price; ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="name-edit<?php //echo $id; ?>">Nhập Sđt partner:</label>
                                                <input type="number" class="form-control col-7" id="name-edit<?php //echo $id; ?>" name="price" value="<?php echo $price; ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="name-edit<?php //echo $id; ?>">Nhập ID branch:</label>
                                                <input type="number" class="form-control col-7" id="name-edit<?php //echo $id; ?>" name="price" value="<?php echo $price; ?>">
                                            </div>
                                            <form class="form-edit-food" action="" method="POST" enctype='multipart/form-data'>
                                            <div class="form-group row">
                                                <input type="hidden" name="id" value="<?php //echo $id; ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="category">Chọn Category:</label>
                                                <select id="category-select" name="category">                                                   
                                                <?php 
                                                   // $res2 = mysqli_query($conn1,"SELECT * FROM tbl_category");
                                                    //while($row2=mysqli_fetch_assoc($res2)){
                                                ?> 
                                                    <option value="<?php// echo $row2['id'];?>" <?php //if($row2['id'] == $category_id) echo 'selected';?>><?php //echo $row2['title'];?></option>
                                                <?php
                                                //}
                                                ?>
                                                </select>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="name-edit<?php//echo $id; ?>">Nhập Feature:</label>
                                                <input <?php //if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes 
                                                <input <?php //if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="name-edit<?php //echo $id; ?>">Active:</label>
                                                <input <?php //if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes 
                                                <input <?php //if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="image-edit<?php //echo $id; ?>">Change image</label>
                                                <input type="file" class="form-control col-7" id="image-edit<?php //echo $id; ?>" name="image" hidden>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-3">
                                                <button class="btn-edit-food btn btn-secondary" type="submit">Sửa</button>
                                                </div>
                                            </div>
                                            </form>
                                        </td>
                                        </tr>   -->
                                <?php 
                            }
                        }
                        else
                        {
                            //Food not Added in Database
                            echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                        }

                    ?>

                </table>
            </div> 
    </div>
    <ul id="PageFragment">
        <?php
        //     echo "<li class='btn btn-primary active' onclick='changePage(1)'>1</li>";
        // for($i = 2; $i <= ceil($count) && $i < 6;$i++){
        //     echo "<li class='btn btn-primary' onclick='changePage(".$i.")'>".$i."</li>";
        // }
        ?>
    </ul>   
</div>
    <!-- <script src="<?php //echo Ppath; ?>js/food.js"></script>
    <script src="<?php // echo Ppath;?>js/insertfood.js"></script>
    <script src="<?php // echo Ppath;?>js/edit.js"></script>
    <script src="<?php // echo Ppath;?>js/delete.js"></script> -->
<?php include('partials/footer.php'); ?>