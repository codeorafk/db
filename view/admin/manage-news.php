<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage News</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_POST['unban']))
                    {
                        echo "a";
                        $id = mysqli_real_escape_string($conn, $_POST['id']);
                        $ban = mysqli_query($conn, "UPDATE tbl_news SET status='Active' WHERE id = '$id'");
                    }
                    if(isset($_POST['ban']))
                    {
                        echo "b";
                        $id = mysqli_real_escape_string($conn, $_POST['id']);
                        $ban = mysqli_query($conn, "UPDATE tbl_news SET status='Unactive' WHERE id = '$id'");
                    }
                    if(isset($_POST['del']))
                    {
                        $id = mysqli_real_escape_string($conn, $_POST['id']);
                        $ban = mysqli_query($conn, "DELETE FROM tbl_news WHERE id = '$id'");
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
                        <th>Title</th>
                        <th>image</th>
                        <th>Status</th>
                        <th>Action</th>      
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM tbl_news ORDER BY id DESC"; // DIsplay the Latest Order at First
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
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $description = $row['description'];
                                $status = $row['status'];
                                if(true){
                                ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><form class="news-item" action="<?php echo view; ?>news-temp.php" method="GET">
                        <input name="id" type="hidden" value="<?php echo $row['id'];?>">
                    </form>
                    <a href="javascript:void(0)"class="card-title" onclick="subForm(this)"> <?php echo $title;?> </a></td>
                                        <td><img src="<?php echo Ppath; ?>images/news/<?php echo $image_name; ?>" width="100px" alt="Chicke Hawain Pizza" class="img-responsive img-curve"></td>
                                        <td>
                                            <?php 
                                                if($status=="Unactive")
                                                {
                                                    echo "<label class='status_order'>$status</label>";
                                                }
                                                elseif($status=="Active")
                                                {
                                                    echo "<label class='status_order' style='color: green;'>$status</label>";
                                                }
                                            ?>
                                        </td>    
                                        <td>
                                            <?php
                                            if($status=="Active"){
                                            ?>
                                            <form action="" class="BanForm" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <button name="ban" class="btn btn-outline-info " type="submit">Unactv</button>
                                            </form>
                                            <?php
                                            }else{
                                            ?>
                                            <form action="" class="BanForm" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <button name="unban" class="btn btn-outline-info " type="submit">Active</button>
                                            </form>
                                            <?php
                                            }
                                            ?>
                                            <form action="" class="RemoveForm" method="POST">
                                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                                <button name="del" class="btn btn-outline-danger" type="submit">Delete</button>
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
                            echo "<tr><td colspan='12' class='error'>News not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>
<script>
    function subForm(t){
    t.parentElement.querySelector(".news-item").submit();
}
</script>
<?php include('partials/footer.php'); ?>