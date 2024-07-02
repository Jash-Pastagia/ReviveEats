<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donate</title>
    <link rel="stylesheet" href="ngo_home.css">
    <link rel="stylesheet" href="ngo_delivery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="logo">Revive<b style="color: #06C167;">Eats</b></div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="ngo_home.php" class="active">Home</a></li>
                <li><a href="ngo_map.html" >Map</a></li>
                <li><a href="#" >My orderes</a></li>
                <!-- <li ><a href="fooddonate.html"  >Donate</a></li> -->
            </ul>
        </nav>
    </header>
    <script>
        hamburger=document.querySelector(".hamburger");
        hamburger.onclick =function(){
            navBar=document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }

        
    </script>
    <section class="banner">
        <p style="font-size: 2rem; color: white; font-weight:700; text-align: center; width: 70% ;margin-bottom:80px;">
            “Cutting food waste is a delicious way of saving money, helping to feed the world and protect the planet.” 
        </p>
        <!-- <button class="btn1" onclick="login()">Donate</button> -->
    </section>

    <div class="log">
<!-- <button type="submit" name="food" onclick="">My orders</button> -->
<!-- <a href="delivery.php">Take orders</a> -->
   <center><h1 style="margin-top:20px">Order assigned To You</h1></center> 
<br>
</div>
 
    <div class="table-container">
      <!-- <p id="heading">donated</p> -->
      <div class="table-wrapper">
     <table class="table">
     <thead>
     <tr>
         <th >Name</th>
         <!-- <th>food</th> -->
         <!-- <th>Category</th> -->
         <th>phoneno</th>
         <th>date/time</th>
         <th>Pickup address</th>
         <th>Delivery Address</th>
         <th>Action</th>
     </tr>
     </thead>
    <tbody>

     <?php foreach ($data as $row) { ?>
     <?php    echo "<tr><td data-label=\"name\">".$row['name']."</td><td data-label=\"phoneno\">".$row['phoneno']."</td><td data-label=\"date\">".$row['date']."</td><td data-label=\"Pickup Address\">".$row['From_address']."</td><td data-label=\"Delivery Address\">".$row['To_address']."</td>";
  ?>
     
         <!-- <td><?= $row['Fid'] ?></td>
         <td><?= $row['name'] ?></td>
         <td><?= $row['address'] ?></td> -->
         <td data-label="Action" style="margin:auto">
             <?php if ($row['delivery_by'] == null) { ?>
                 <form method="post" action=" ">
                     <input type="hidden" name="order_id" value="<?= $row['Fid'] ?>">
                     <input type="hidden" name="delivery_person_id" value="<?= $id ?>">
                     <button type="submit" name="food">Take order</button>
                 </form>
             <?php } else if ($row['delivery_by'] == $id) { ?>
                 Order assigned to you
             <?php } else { ?>
                 Order assigned to another delivery person
             <?php } ?>
         </td>
     </tr>
     <?php } ?>
 </tbody>
</table>

         </div>


    </div>
    <div class="ser">
      <!-- <p class="heading">Our Services</p> -->
      
    </div>
      <script>
        function login(){
            location.href = "user_donate.php";
        }
      </script>
</body>
</html>