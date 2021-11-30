
   <?php include('partials-front/menu.php'); ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<section class="news">
    <div class="container">
      <div class="logo-wrapper d-flex align-items-center">
        <h1><a href="">The News</a></h1>
      </div>
    </div>

    <div class="container">
        <div class="row">
        <?php 
            $res = mysqli_query($conn, "SELECT * FROM tbl_news");
            while($row=mysqli_fetch_assoc($res)){
        ?>
            
            <div class="card col-4" style="width: 350px;">
                <img class="card-img-top" src="<?php echo Ppath.'images/news/'.$row['image_name'];?>" alt="Card image cap"style="width: 350px;">
                <div class="card-body">
                    <form class="news-item" action="news-temp.php" method="GET">
                        <input name="id" type="hidden" value="<?php echo $row['id'];?>">
                    </form>
                    <a href="javascript:void(0)"class="card-title" onclick="subForm(this)"> <?php echo $row['title'];?> </a>
                    <p class="card-text"> <?php echo $row['description'];?> </p>
                </div>
            </div>
            
        <?php 
            }
        ?>
        </div>
    <!-- <div class="row">
        <div class="card col-4" style="width: 350px;">
            <img class="card-img-top" src="../public/images/news1.jpg" alt="Card image cap"style="width: 350px;">
            <div class="card-body">
            <a href="news-temp.php" class="card-title" onclick="func(1)">Is Taco Bell Open On Thanksgiving Day?</a>
            <p class="card-text">Some things in this world are largely disappointing, i.e. the supermarket being sold out of special-edition sweets, ice cream falling on the ground,</p>
            </div>
        </div>
        <div class="card col-4 offset-1" style="width: 350px;">
            <img class="card-img-top" src="../public/images/new2.jpg" alt="Card image cap">
            <div class="card-body">
            <a href="news-temp.php" class="card-title" onclick="func(2)">All The Grocery Stores Open On Thanksgiving Day</a>
            <p class="card-text">You know what happens to the best-laid plans, right? They go awry. Meaning that Thanksgiving shopping list you triple-checked actually...</p>
            </div>
        </div>
    </div>    
    <br>
    <div class="row">
        <div class="card col-4" style="width: 350px;">
            <img class="card-img-top" src="../public/images/news3.jpg" alt="Card image cap">
            <div class="card-body">
            <a href="news-temp.php" class="card-title" onclick="func(3)">Is McDonald's Open On Thanksgiving?</a>
            <p class="card-text">Maybe you're a pro cook in the kitchen, especially when it comes to food-centric holidays like Thanksgiving...</p>
            </div>
        </div>
        <div class="card col-4 offset-1" style="width: 350px;">
            <img class="card-img-top" src="../public/images/news4.jpeg" alt="Card image cap">
            <div class="card-body">
            <a href="news-temp.php" class="card-title" onclick="func(4)">Cracker Barrel Is Selling Thanksgiving Dinner</a>
            <p class="card-text">Sure, it's true that Thanksgiving is all about food, but that doesn't mean that you have to be cooking everything yourself...</p>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="card col-4" style="width: 350px;">
            <img class="card-img-top" src="../public/images/news5.png" alt="Card image cap">
            <div class="card-body">
            <a href="news-temp.php" class="card-title" onclick="func(5)">Here's Where to Buy Thanksgiving Dinner</a>
            <p class="card-text">According to research conducted by Bob Evans Restaurants,...</p>
            </div>
        </div>
     
        <div class="card col-4 offset-1" style="width: 350px;">
            <img class="card-img-top" src="../public/images/new6.jpg" alt="Card image cap">
            <div class="card-body">
            <a href="news-temp.php" class="card-title" onclick="func(6)">Score Deals On Mini Fridges This Black Friday</a>
            <p class="card-text">We've all played an intricate game of Jenga with the groceries inside our refrigerators at one point or another...</p>
            </div>
        </div>
    </div>     -->
    </div>
</section>
<script>
    function func(n){
        var theCookies = document.cookie.split(';');
        for (var i = 1 ; i <= theCookies.length; i++) {
            document.cookie = theCookies[i-1].split('=')[0]+'=; Max-Age=-99999999;'; 
        }
        document.cookie =  "num=" + n;
    }
</script>
<script src="<?php echo Ppath; ?>js/news.js"></script>
<?php include('partials-front/footer.php'); ?>