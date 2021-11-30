<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <div class="food-error-text">     
                <!-- "alert alert-danger"    -->
        </div>
        <br /><br />

                <!-- Button to Add Admin -->
        <button class="btn btn-primary btnAddFood">Thêm mới</button>

        <form class="formAddFood d-none" action="" method="POST">
            <!-- <div class="form-group row">
                <label class="col-3 text-right col-form-label" for="idnew">Nhập id:</label>
                <input type="text" class="form-control col-7" id="idnew" name="id">
            </div> -->
                <div class="form-group row">
                    <label class="col-3 text-right col-form-label" for="name-new">Nhập Tên:</label>
                    <input type="text" class="form-control col-7" id="name-new" name="name">
                </div>
            <div class="form-group row">
                <label class="col-3 text-right col-form-label" for="pricenew">Nhập Giá:</label>
                <input type="number" class="form-control col-7" id="pricenew" name="price">
            </div>
            <div class="form-group row">
                <label class="col-3 text-right col-form-label" for="descriptionnew">Nhập Mô Tả:</label>
                <input type="text" class="form-control col-7" id="descriptionnew" name="description">
            </div>
            <div class="form-group row">
                <label class="col-3 text-right col-form-label" for="category">Chọn Category:</label>
                <select name="category" id="category">
                            <?php 
                                //Create PHP Code to display categories from Database
                                //1. CReate SQL to get all active categories from database
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                
                                //Executing qUery
                                $res = mysqli_query($conn, $sql);

                                //Count Rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //IF count is greater than zero, we have categories else we donot have categories
                                if($count>0)
                                {
                                    //WE have categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            ?>
                </select>
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
                <button class="btn btn-secondary fbtnOk">OK</button>
            </div>
            </div>
        </form>
            <div class="table-reponsive-xl">                   
                <table class="table">
                    <tr>
                        <th>S.N.</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Category ID</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Create a SQL Query to Get all the Food
                        $sql = "SELECT * FROM tbl_food";

                        //Execute the qUery
                        $res = mysqli_query($conn, $sql);

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
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $category_id = $row['category_id'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>

                                <tr class="food-menu-box d-none">
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $title; ?></td>
                                    <td>$<?php echo $price; ?></td>
                                    <td>
                                    <?php  
                                            //CHeck whether we have image or not
                                            if($image_name=="")
                                            {
                                                //WE do not have image, DIslpay Error Message
                                                echo "<div class='error'>Image not Added.</div>";
                                            }
                                            else
                                            {
                                                //WE Have Image, Display Image
                                                ?>
                                                <img src="<?php echo Ppath; ?>images/food/<?php echo $image_name; ?>" style = "width: 180px;height: 180px; overflow:hidden">
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $category_id;?></td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td class="d-flex">
                                        <form class="form-delete-food" action="" method="POST">
                                            <input type="text" value="<?php echo $id; ?>" name ="food_id" hidden>
                                            <button name="btnDel" type="submit" class="btn-food btn-outline-danger btn-sm">Xóa</button>
                                        </form>
                                        <button id="btnEdit<?php echo $id; ?>" onclick="buttonEdit(this.id)"type="click" class="bth-food btn-outline-info btn-sm">Sửa</button>
                                    </td>
                                </tr>
                                <tr class="btnEdit<?php echo $id; ?> d-none">
                                        <td colspan="6">
                                            <form class="form-edit-food" action="" method="POST" enctype='multipart/form-data'>
                                            <div class="form-group row">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="name-edit<?php echo $id; ?>">Nhập Tên:</label>
                                                <input type="text" class="form-control col-7" id="name-edit<?php echo $id; ?>" name="name" value="<?php echo $title; ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="name-edit<?php echo $id; ?>">Nhập Giá:</label>
                                                <input type="number" class="form-control col-7" id="name-edit<?php echo $id; ?>" name="price" value="<?php echo $price; ?>">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-3 text-right col-form-label" for="category">Chọn Category:</label>
                                                <select id="category-select" name="category">                                                   
                                                <?php 
                                                    $res2 = mysqli_query($conn,"SELECT * FROM tbl_category");
                                                    while($row2=mysqli_fetch_assoc($res2)){
                                                ?> 
                                                    <option value="<?php echo $row2['id'];?>" <?php if($row2['id'] == $category_id) echo 'selected';?>><?php echo $row2['title'];?></option>
                                                <?php
                                                }
                                                ?>
                                                </select>
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
                                                <label class="col-3 text-right col-form-label" for="image-edit<?php echo $id; ?>">Change image</label>
                                                <input type="file" class="form-control col-7" id="image-edit<?php echo $id; ?>" name="image" hidden>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-3">
                                                <button class="btn-edit-food btn btn-secondary" style="submit">Sửa</button>
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
                            //Food not Added in Database
                            echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                        }

                    ?>

                </table>
            </div> 
    </div>
    <ul id="PageFragment">
        <?php
            echo "<li class='btn btn-primary active' onclick='changePage(1)'>1</li>";
        for($i = 2; $i <= ceil($count) && $i < 6;$i++){
            echo "<li class='btn btn-primary' onclick='changePage(".$i.")'>".$i."</li>";
        }
        ?>
    </ul>   
</div>
    <script src="<?php echo Ppath; ?>js/food.js"></script>
    <script src="<?php echo Ppath;?>js/insertfood.js"></script>
    <script src="<?php echo Ppath;?>js/edit.js"></script>
    <script src="<?php echo Ppath;?>js/delete.js"></script>
<?php include('partials/footer.php'); ?>