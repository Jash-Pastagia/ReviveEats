<?php
include("login.php"); 
include '../connection.php';
// if($_SESSION['loggedin']==true){
//     header("location:loginindex.html");
// }
header("conn.php");
if($_SESSION['name']==''){
	header("location: user_signup.php");
}

?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revive Eats</title>
    <link rel="stylesheet" href="home2.css">
    <link rel="stylesheet" href="profile.css">
    <!-- <link rel="stylesheet" href="loginstyle.css"> -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f2f2f2; /* Change this to your desired background color */
}

/* Header Styles */
header {
    border-bottom: 2px solid black;
    padding: 10px 0;
    background-color: #fff; /* Change this to your desired background color */
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 999;
}

/* .logo {
    text-align: center;
    font-size: 22px;
    color: black;
} */
.logo {
    font-size: 28px;
    color: var(--navfont);
}

</style>
</head>

<body background-color="new rgb">
    <header style="border-bottom: 2px solid black;">
        <div class="logo">Revive<b style="color: #06C167;">Eats</b></div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="user_reward.html" >Reward</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="profile.php" class="active">Profile</a></li>
            </ul>
        </nav>
    </header>

    <div class="profile">
    <!-- <section class="cover" >
        
        </section>
     -->
        <div class="profilebox" style="">
          
            <p class="headingline" style="text-align: left;font-size:30px;"> <img src="" alt="" style="width:40px; height:  height: 25px;; padding-right: 10px; position: relative;" >Profile</p>
<!--             
            <img src="user.png" alt="" style="  width: 90px;
            height: 90px;
            /* border-radius:50% ;  */
            display: block;
            margin-left: auto;
            margin-right: auto;
            padding-top: 10px;
             /* border: 1px solid #06C167; */
            ">
            <br> -->
              <!-- <p style="font-size: 28px;">welcome</p> -->
              <!-- <p style="color: #06C167;">username</p> -->
              <br>
              <div class="profile">
        <div class="profilebox">
            <!-- Profile information section -->
            <p class="headingline">Profile</p>
            <div class="info">
                <p>Name: <?php echo $_SESSION['name']; ?></p>
                <p>Email: <?php echo $_SESSION['email']; ?></p>
                <p>Gender: <?php echo $_SESSION['gender']; ?></p>
                <!-- Additional profile details can be added here -->
                <a href="logout.php">Logout</a>
            </div>
           
            
        
         <br>
         <p class="heading">Your donations</p>
         <!-- <p class="" style="font-family: 'Times New Roman', Times, serif; font-size: 20px;">Your donations</p><br> -->
         <!-- <img src="profilecover1.jpg" alt="" width='100%' height='auto'> -->
        <div class="table-container">
         <!-- <p id="heading">donated</p> -->
         <div class="table-wrapper">
        <table class="table">
        <thead>
        <tr>
            <th>food</th>
            <th>Type</th>
            <th>Category</th>
            <th>date/time</th>
        </tr>
        </thead>
       <tbody>
        

         <?php
        $email=$_SESSION['email'];
        $query="select * from food_donations where email='$email'";
        $result=mysqli_query($connection, $query);
        if($result==true){
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr><td>".$row['food']."</td><td>".$row['type']."</td><td>".$row['category']."</td><td>".$row['date']."</td></tr>";

             }
          }
       ?> 
    
        </tbody>
    </table>
         </div>
   </div>          

            

        </div>
    </div>

    <footer class="footer" id="contact">
            <div class="footer-left col-md-4 col-sm-6">
                <p class="about">
                    <span> About us</span>The basic concept of this project Food Waste Management is to collect the
                    excess/leftover
                    food from donors such as hotels, restaurants, marriage halls , etc and distribute to the needy
                    people .
                </p>

            </div>
            <div class="footer-center col-md-4 col-sm-6">
                <div>
                    <p><span> Contact</span> </p>

                </div>
                <div>

                    <p> +91 9825111616</p>

                </div>
                <div>
                    <!-- <i class="fa fa-envelope" style="font-size: 17px;
            line-height: 38px; color:white;"></i> -->
                    <p><a href="#">Reviveeats@gmail.com</a></p>
                </div>

                <div class="sociallist">
                    <ul class="social">
                        <li><a href="https://www.facebook.com/TheAkshayaPatraFoundation/"><img
                                    src="https://i.ibb.co/x7P24fL/facebook.png"></a></li>
                        <li><a href="https://twitter.com/globalgiving"><img
                                    src="https://i.ibb.co/Wnxq2Nq/twitter.png"></a>
                        </li>
                        <li><a href="https://www.instagram.com/charitism/"><img
                                    src="https://i.ibb.co/ySwtH4B/instagram.png"></a></li>
                        <li><a href="https://web.whatsapp.com/"><i class="fa fa-whatsapp"
                                    style="font-size:50px;color: black;"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-right col-md-4 col-sm-6">
                <h2>Revive<span>Eats</span></h2>

                <p class="name">All rights reserved. Copyright ©
                    <script>document.write(new Date().getFullYear())</script> Code Fusion Five
                </p>
            </div>
        </footer>
    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function () {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>