<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
            <div class="error-text">     
                <!-- "alert alert-danger"    -->
            </div>
                <!-- Button to Add Admin -->
                <button class="btn btn-primary btnAddNew">Thêm mới</button>

                <form class="formAddNew d-none" action="" method="POST">
                    <!-- <div class="form-group row">
                        <label class="col-3 text-right col-form-label" for="idnew">Nhập id:</label>
                        <input type="text" class="form-control col-7" id="idnew" name="id">
                    </div> -->
                        <div class="form-group row">
                            <label class="col-3 text-right col-form-label" for="name-new">Nhập Tên:</label>
                            <input type="text" class="form-control col-7" id="name-new" name="name" >
                        </div>
                        <div class="form-group row">
                            <label class="col-3 text-right col-form-label">Nhập Feature:</label>
                            <input type="radio" name="featured" value="Yes" checked> Yes 
                            <input type="radio" name="featured" value="No"> No 
                        </div>
                        <div class="form-group row">
                            <label class="col-3 text-right col-form-label">Active:</label>
                            <input checked type="radio" name="active" value="Yes"> Yes 
                            <input type="radio" name="active" value="No"> No 
                        </div>
                        <div class="form-group row">
                            <label class="col-3 text-right col-form-label" for="image-new">change image</label>
                            <input type="file" class="form-control col-7" id="image-new" name="image" hidden>
                        </div>
                    <div class="form-group row">
                    <div class="offset-3">
                        <button class="btn btn-secondary btnOk">OK</button>
                    </div>
                    </div>
                </form>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 

                        //Query to Get all CAtegories from Database
                        $sql = "SELECT * FROM tbl_category";

                        //Execute Query
                        $res = mysqli_query($conn, $sql);

                        //Count Rows
                        $count = mysqli_num_rows($res);

                        //Create Serial Number Variable and assign value as 1
                        $sn=1;

                        //Check whether we have data in database or not
                        if($count>0)
                        {
                            //We have data in database
                            //get the data and display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>

                                    <tr class="food-menu-box d-none">
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $title; ?></td>

                                        <td>

                                            <?php  
                                                //Chcek whether image name is available or not
                                                if($image_name!="")
                                                {
                                                    //Display the Image
                                                    ?>
                                                    
                                                    <img src="<?php echo Ppath; ?>images/category/<?php echo $image_name; ?>" style = "width: 180px;height: 180px; overflow:hidden" >
                                                    
                                                    <?php
                                                }
                                                else
                                                {
                                                    //DIsplay the MEssage
                                                    echo "<div class='error'>Image not Added.</div>";
                                                }
                                            ?>

                                        </td>

                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td class="d-flex">
                                            <form class="form-delete" action="" method="POST">
                                                <input type="text" value="<?php echo $id; ?>" name ="food_id" hidden>
                                                <button name="btnDel" type="submit" class="btn btn-outline-danger btn-sm">Xóa</button>
                                            </form>
                                                <button id="btnEdit<?php echo $id; ?>" onclick="buttonEdit(this.id)"type="click" class="btn btn-outline-info btn-sm">Sửa</button>
                                        </td>
                                    </tr>
                                    <tr class="btnEdit<?php echo $id; ?> d-none">
                                        <td colspan="6">
                                            <form class="form-edit" action="" method="POST">
                                            <div class="form-group row">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="name-edit<?php echo $id; ?>">Nhập Tên:</label>
                                                <input type="text" class="form-control col-7" id="name-edit<?php echo $id; ?>" name="name" value="<?php echo $title; ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="name-edit<?php echo $id; ?>">Nhập Feature:</label>
                                                <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes 
                                                <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="name-edit<?php echo $id; ?>">Active:</label>
                                                <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes 
                                                <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No 
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="image-edit<?php echo $id; ?>">change image</label>
                                                <input type="file" class="form-control col-7" id="image-edit<?php echo $id; ?>" name="image" hidden>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-3">
                                                <button class="btn-edit btn btn-secondary" style="submit">Sửa</button>
                                                </div>
                                            </div>
                                            </form>
                                        </td>
                                        </tr>                
                                <?php

                            }
                        }
                        else
                        {
                            //WE do not have data
                            //We'll display the message inside table
                            ?>

                            <tr>
                                <td colspan="6"><div class="error">No Category Added.</div></td>
                            </tr>

                            <?php
                        }
                    
                    ?>

                    

                    
                </table>
    </div>
    <ul id="PageFragment">
        <?php
            echo "<li class='btn btn-primary active' onclick='changePage(1)'>1</li>";
        for($i = 2; $i <= ceil($count / 4) && $i < 6;$i++){
            echo "<li class='btn btn-primary' onclick='changePage(".$i.")'>".$i."</li>";
        }
        ?>
    </ul> 
</div>
<script src="<?php echo Ppath;?>js/food.js"></script>
<script src="<?php echo Ppath;?>js/insert.js"></script>
<script src="<?php echo Ppath;?>js/edit.js"></script>
<script src="<?php echo Ppath;?>js/delete.js"></script>
<?php include('partials/footer.php'); ?>