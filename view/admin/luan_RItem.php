<?php include('partials/menu.php'); ?>
<?php
$sqlInit = "SELECT * FROM import_order";

//Execute the qUery
$resInit = mysqli_query($conn1, $sqlInit);

//Count Rows to check whether we have foods or not
$countInit = mysqli_num_rows($resInit);

//Create Serial Number VAriable and Set Default VAlue as 1
$snInit = 1;

if ($countInit > 0) {
    //We have food in Database
    //Get the Foods from Database and Display
    while ($rowInit = mysqli_fetch_assoc($resInit)) {
        $snInit++;
    }
}


//CHeck whether the Submit Button is Clicked or NOt
if (isset($_POST['insert_submit'])) {
    // cnDB

    $id_new = mysqli_real_escape_string($conn1, $_POST['id_new']);

    // $date_new = mysqli_real_escape_string($conn1, $_POST['date_new']);

    $namePn_new = mysqli_real_escape_string($conn1, $_POST['namePn_new']);
    
}

/*
if (isset($_POST['btnDel'])) {
    $idDel = mysqli_real_escape_string($conn1, $_POST['IO_id']);
    echo $idDel;
    $sql2 = mysqli_query($conn1, "DELETE FROM import_order WHERE id ='{$idDel}'");
}
if (isset($_POST['editSubmit'])) {
    $idEdit = mysqli_real_escape_string($conn1, $_POST['idEdit']);

    $namePE = mysqli_real_escape_string($conn1, $_POST['namePE']);
    $phonePE = mysqli_real_escape_string($conn1, $_POST['phonePE']);
    
    $idBE = mysqli_real_escape_string($conn1, $_POST['idBE']);

    if(isset($namePE) && isset($phonePE) && isset($idBE)){

        // IDate,,Phone_partner,ID_branch
        //  IDate,Name_partner,Phone_partner,ID_branch
        // $upload = move_uploaded_file($source_path, $destination_path);
        $resEdit = mysqli_query ($conn1, "  UPDATE import_order SET 
                                            Name_partner = '$namePE', 
                                            Phone_partner = '$phonePE', ID_branch = '$idBE'
                                            WHERE ID ='$idEdit'"
                                );
        if($resEdit==true)
        {
            //Category Updated
            echo "IO Updated Successfully" ;
        }
        else
        {
            //failed to update category
            echo "Failed to Update IO" ;
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

}
*/
?>

<script>
    function addNew() {
        var btn1 = document.querySelector('#ipForm');
        btn1.classList.toggle("d-none");
    }
</script>

<div class="container-fluid main-content">
    <div class="wrapper">
        <h1>Rank Item in branch by Luan</h1>
        <div class="food-error-text">
            <!-- "alert alert-danger"    -->
        </div>
        <br /><br />

        <!-- Button to Add Admin -->
        <div class="row">
            <div class="col-1"></div>
            <button class="btn btn-primary" style="margin: 1%;" id="addNew" onclick="addNew();">Rank item in a branch</button>
        </div>


        <form class="formAddFood d-none" action="" method="POST" id="ipForm">
            <!-- <div class="form-group row">
                <label class="col-3 text-right col-form-label" for="idnew">Nh???p id:</label>
                <input type="text" class="form-control col-7" id="idnew" name="id">
            </div> -->
            <div class="form-group row">
                <div class="col-1"></div>
                <label class="col-2 col-form-label" for="id_new">Branch ID:</label>
                <input type="number" class="form-control col-7" id="id_new" name="id_new" >
            </div>
            
            <div class="form-group row">
                <div class="col-1"></div>
                <label class="col-2 col-form-label" for="namePn_new">True is food:</label>
                <input type="text" class="form-control col-7" id="namePn_new" name="namePn_new">
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
                    <th>ID_item</th>
                    <th>Quantity</th>
                    <th>Name item</th>
                    <!-- <th>Phone number of partner</th>
                    <th>ID_branch</th> -->
                </tr>

                <?php
                //Create a SQL Query to Get all the Food
                $sql = "call printRankItem(".$id_new.", ".$namePn_new.");";

                //Execute the qUery
                $res = mysqli_query($conn1, $sql);

                //Count Rows to check whether we have foods or not
                $count = mysqli_num_rows($res);

                //Create Serial Number VAriable and Set Default VAlue as 1
                $sn = 1;

                if ($count > 0) {
                    //We have food in Database
                    //Get the Foods from Database and Display
                    while ($row = mysqli_fetch_assoc($res)) {
                        //get the values from individual columns
                        $ID_item = $row['ID_item'];
                        // $IDate = $row['IDate'];
                        $Quantity = $row['Quantity'];
                        $Name_item = $row['name_'];
                        // $ID_branch = $row['ID_branch'];
                ?>
<!-- luan_RItem -->
                        <tr class="food-menu-box">
                            <td><?php echo $sn++; ?>. </td>
                            <td><?php echo $ID_item; ?></td>
                            <td><?php echo $Quantity; ?></td>
                            <td><?php echo $Name_item; ?></td>
                            
                            
                            <td class="d-flex">
                                <form class="form-delete-food" action="" method="POST">
                                    <input type="number" value="<?php echo $id; ?>" name="IO_id" hidden>
                                    <button id="btnDel" name="btnDel" type="submit" class="btn-food btn-outline-danger btn-sm">X??a</button>
                                </form>
                                <button id="btnEdit<?php echo $id; ?>" onclick="buttonEdit(<?php echo $id; ?>)" type="click" class="bth-food btn-outline-info btn-sm">S???a</button>
                            </td>
                        </tr>
                        <tr class="btnEdit<?php echo $id; ?> d-none">
                            <td colspan="6">
                                <form class="form-edit-food" action="" method="POST" enctype='multipart/form-data'>
                                    <div class="form-group row">
                                        <label class="col-3 text-right col-form-label" name="id"><b>S???a d??ng n??y</b></label>
                                    </div>
                                    <div class="form-group row">
                                        <input type="hidden" name="idEdit" value="<?php echo $id; ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 text-right col-form-label" for="namePE<?php echo $id; ?>">Name of partner:</label>
                                        <input type="text" class="form-control col-7" id="namePE<?php echo $id; ?>" name="namePE" value="<?php echo $Name_partner; ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 text-right col-form-label" for="dateE<?php echo $id; ?>">Nh???p Date:</label>
                                        <input type="date" class="form-control col-7" id="dateE<?php echo $id; ?>" name="dateE" value="<?php echo $IDate; ?>" readonly>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 text-right col-form-label" for="phonePE<?php echo $id; ?>">Phone number of partner:</label>
                                        <input type="text" class="form-control col-7" id="phonePE<?php echo $id; ?>" name="phonePE" value="<?php echo $Phone_partner; ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 text-right col-form-label" for="idBE<?php echo $id;  ?>">ID of branch:</label>
                                        <input type="number" class="form-control col-7" id="idBE<?php echo $id;  ?>" name="idBE" value="<?php echo $ID_branch; ?>">
                                    </div>
                                    <!-- <form class="form-edit-food" action="" method="POST" enctype='multipart/form-data'> -->
                                    <?php
                                    // $res2 = mysqli_query($conn1,"SELECT * FROM tbl_category");
                                    //while($row2=mysqli_fetch_assoc($res2)){
                                    ?>
                                    <?php
                                    //}
                                    ?>
                                    <div class="form-group row">
                                        <div class="offset-3">
                                            <button class="btn-edit-food btn btn-secondary" type="submit" name="editSubmit" id="editSubmit">S???a</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                } else {
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
<script>
    function buttonEdit(e) {
        var a = ".btnEdit" + e;
        let tr = document.querySelector(a);
        tr.classList.toggle("d-none");
    }
</script>
<!-- <script src="<?php //echo Ppath; 
                    ?>js/food.js"></script>
    <script src="<?php // echo Ppath;
                    ?>js/insertfood.js"></script>
    <script src="<?php // echo Ppath;
                    ?>js/edit.js"></script>
    <script src="<?php // echo Ppath;
                    ?>js/delete.js"></script> -->
<?php include('partials/footer.php'); ?>