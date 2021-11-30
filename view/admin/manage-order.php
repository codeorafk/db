<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Order Date</th>
                        <th>Total</th>
                        <th>Status</th>      
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];
                                $order_date = $row['order_date'];
                                $total = $row['total'];
                                $status = $row['status'];
                                if($status != "Completed"){
                                ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td><?php echo $order_date; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label class='status_order'>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label class='status_order' style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label class='status_order' style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label class='status_order' style='color: red;'>$status</label>";
                                                }
                                                else
                                                    echo "<label class='status_order' style='color: black;'>$status</label>";
                                            ?>
                                        </td>    
                                        <td>
                                            <form class="editOrderForm">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <button class="btn btn-primary" type="submit">update</button>
                                            </form>
                                            <button class="btn" data-toggle="modal" data-target="#Modal<?php echo $id;?>">More</button>
                                        </td>
                                    </tr>
                                    <div id="Modal<?php echo $id;?>" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel" >
                                        <div class="modal-dialog modal-lg">

                                            <!-- Modal content-->
                                            <div class="modal-content" style="width: 80%; margin: auto; margin-top: 50px;">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                    <div class="modal-body">
                                                        <?php 
                                                            $res2 = mysqli_query($conn, "SELECT * FROM tbl_food_in_order WHERE order_id = '$id' ");
                                                            while($foodinorder=mysqli_fetch_assoc($res2)){
                                                                $food_id = $foodinorder['food_id'];
                                                                
                                                                $res3 = mysqli_query($conn, "SELECT * FROM tbl_food WHERE id = '$food_id' ");
                                                                
                                                                while($food=mysqli_fetch_assoc($res3)){
                                                         ?>
                        
                                                        <div class='d-flex mb-4' style="padding-left:20px;">
                                                            <img src="<?php echo Ppath ?>images/food/<?php echo $food['image_name'];?>" style='width:100px;height:100px;border-radius:5px;'>
                                                            <div class='w-75 ml-3 mr-3' style='overflow:hidden'>
                                                                <div><strong><?php echo $food["title"];?></strong></div>
                                                                <div class="price"><strong>$ <?php echo $food["price"];?></strong></div>
                                                            </div>
                                                            <div class='w-25 mr-3 d-flex align-items-center justify-content-center'>
                                                                <div class="input-group" style='width:120px'>
                                                                    <input readonly="readonly" type="text" class="form-control quantity-item" value="<?php echo $foodinorder['quantity']; ?>" name="quantity[]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                         <?php  
                                                                }  }   
                                                            }
                                                        ?>
                                    </div></div></div></div>
                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

<script src="<?php echo Ppath;?>js/updateOrder.js"></script>
<?php include('partials/footer.php'); ?>