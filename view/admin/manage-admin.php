<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Member</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_POST['unban']))
                    {
                        $id = mysqli_real_escape_string($conn, $_POST['id']);
                        $ban = mysqli_query($conn, "UPDATE tbl_guess SET status='Sleeping' WHERE id = '$id'");
                    }
                    if(isset($_POST['ban']))
                    {
                        $id = mysqli_real_escape_string($conn, $_POST['id']);
                        $ban = mysqli_query($conn, "UPDATE tbl_guess SET status='Banning' WHERE id = '$id'");
                    }
                    if(isset($_POST['del']))
                    {
                        $id = mysqli_real_escape_string($conn, $_POST['id']);
                        $ban = mysqli_query($conn, "DELETE FROM tbl_guess WHERE id = '$id'");
                    }
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
                        <th>Member</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>      
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM customer ORDER BY full_name"; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn1, $sql);
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
                                $customer_name = $row['full_name'];
                                $customer_contact = $row['phone'];
                                $customer_email = $row['email'];
                                $customer_address = $row['address'];
                                $status = $row['status'];
                                if(true){
                                ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Unactive")
                                                {
                                                    echo "<label class='status_order'>$status</label>";
                                                }
                                                elseif($status=="Active")
                                                {
                                                    echo "<label class='status_order' style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Sleeping")
                                                {
                                                    echo "<label class='status_order' style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Banning")
                                                {
                                                    echo "<label class='status_order' style='color: red;'>$status</label>";
                                                }
                                                else
                                                    echo "<label class='status_order' style='color: black;'>$status</label>";
                                            ?>
                                        </td>    
                                        <td>
                                            <?php
                                            if($status=="Banning"){
                                            ?>
                                            <form action="" class="BanForm" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <button name="unban" class="btn btn-outline-info " type="submit">Ubn</button>
                                            </form>
                                            <?php
                                            }else{
                                            ?>
                                            <form action="" class="BanForm" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <button name="ban" class="btn btn-outline-info " type="submit">Ban</button>
                                            </form>
                                            <?php
                                            }
                                            ?>
                                            <form action="" class="RemoveForm" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <button name="del" class="btn btn-outline-danger" type="submit">DeL</button>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                                        
                                <?php  
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