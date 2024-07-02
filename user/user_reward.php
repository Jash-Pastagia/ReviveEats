<?php
    include("login.php"); 
    include '../connection.php';
    
    if($_SESSION['name']==''){
        header("location: user_signup.php");
    }
    $token = 0;
    $email=$_SESSION['email'];
    $credit = 0;
    $id;
    $sum = 0;
    $query="select * from food_donations where email='$email'";
    $result=mysqli_query($connection, $query);
    if($result==true){
        while($row=mysqli_fetch_assoc($result)){
            $credit = $credit + $row['credit'];
            $id = $row['Fid'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReviveEats</title>
    <link rel="icon" type="image/x-icon" href="../logo.png">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        text-align: center;
        width: 50%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
        }
        .with input{
            margin-left: 10px;
            width: 15vw;
            height: 5vh;
        }
        .modal-content .withdraw{
            background-color: black;
            font-size: 16px;
            color: white;
            margin-top: 25px;
            cursor: pointer;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid black;
            width: 50%;
        }
        #toast {
        visibility: hidden;
        max-width: 50px;
        height: 50px;
        /*margin-left: -125px;*/
        margin: auto;
        background-color: #FF7276;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        position: fixed;
        z-index: 1;
        left: 0;right:0;
        bottom: 30px;
        font-size: 17px;
        white-space: nowrap;
        }
        #toast2{
        visibility: hidden;
        max-width: 50px;
        height: 50px;
        /*margin-left: -125px;*/
        margin: auto;
        background-color: #77DD77;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        position: fixed;
        z-index: 1;
        left: 0;right:0;
        bottom: 30px;
        font-size: 17px;
        white-space: nowrap;
        }

        #toast #img{
            width: 50px;
            height: 50px;
            
            float: left;
            padding-top: 16px;
            padding-bottom: 16px;
            box-sizing: border-box;
            background-color: red;
            color: #fff;
        }
        #toast2 #img{
            width: 70px;
            height: 50px;
            float: left;
            padding-top: 16px;
            padding-bottom: 16px;
            box-sizing: border-box;
            background-color: green;
            color: #fff;
        }
        #toast #desc, #toast2 #desc{
            color: #fff;
            padding: 16px;
            overflow: hidden;
            white-space: nowrap;
        }

        #toast.show, #toast2.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, expand 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
        }

        @-webkit-keyframes fadein {
            from {bottom: 0; opacity: 0;} 
            to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
            from {bottom: 0; opacity: 0;}
            to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes expand {
            from {min-width: 50px} 
            to {min-width: 350px}
        }

        @keyframes expand {
            from {min-width: 50px}
            to {min-width: 350px}
        }
        @-webkit-keyframes stay {
            from {min-width: 350px} 
            to {min-width: 350px}
        }

        @keyframes stay {
            from {min-width: 350px}
            to {min-width: 350px}
        }
        @-webkit-keyframes shrink {
            from {min-width: 350px;} 
            to {min-width: 50px;}
        }

        @keyframes shrink {
            from {min-width: 350px;} 
            to {min-width: 50px;}
        }

        @-webkit-keyframes fadeout {
            from {bottom: 30px; opacity: 1;} 
            to {bottom: 60px; opacity: 0;}
        }

        @keyframes fadeout {
            from {bottom: 30px; opacity: 1;}
            to {bottom: 60px; opacity: 0;}
        }
</style>
</head>

<body>
    <header>
    
    <div class="logo" style="color: var(--navfont);">Revive<b style="color: #06C167;">Eats</b></div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
              <li><a href="home.html" >Home</a></li>
              <li><a href="user_reward.html" class="active">Reward</a></li>
              <li><a href="#contact">Contact</a></li>
              <li><a href="profile.php">Profile</a></li>
            </ul>
          </nav>
    </header>
    <script>
        hamburger = document.querySelector(".hamburger");
        hamburger.onclick = function () {
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>

    <body style="background-color: #06C167;">
        <center>
            <h1 style="margin-top: 1.5rem;">User Rewards</h1>
        </center>
        <div class="content">
            <div class="card">
                <div class="bronze-card">
                    <h2>Bronze Reward <i class="fa-solid fa-medal"></i></h2>
                    <p style="color: black;"><b>Earn 1$ -> 80₹</b></p>
                    <p style="color: black;">For 5 people meal</p>
                </div>
                <div class="silver-card">
                    <h2>Silver Reward <i class="fa-solid fa-medal"></i></h2>
                    <p style="color: black;"><b>Earn 5$ -> 400₹</b></p>
                    <p style="color: black;">For 20 people meal</p>
                </div>
                <div class="gold-card">
                    <h2>Gold Reward <i class="fa-solid fa-medal"></i></h2>
                    <p style="color: black;"><b>Earn 25$ -> 2000₹</b></p>
                    <p style="color: black;">For 100 people meal</p>
                </div>
            </div>
        </div>
        <center>
            <div class="amount">
                <div style="left: 3rem; position: absolute;">Amount Earned</div>
                <div style="right: 3rem; position: absolute;">₹ <?php echo $credit; ?></div>
            </div>

            <button class="withdraw"  id="myBtn">Withdraw <i class="fa-solid fa-wallet"></i></button>
        </center>

        <footer class="footer" id="contact">
            <div class="footer-left col-md-4 col-sm-6">
                <p class="about">
                    <span> About us</span>The basic concept of this project Food Waste Management is to collect the
                    excess/leftover
                    food from donors such as hotels, restaurants, marriage halls , etc and distribute to the needy
                    people .
                </p>

            </div>
            

        </div>
            <div class="footer-center col-md-4 col-sm-6">
                <div>
                    <p><span> Contact</span> </p>
                </div>
                <div>
                    <p> +91 9825111616</p>
                </div>
                <div>
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

        <!-- The Modal -->
        <form action="" method="POST">
            <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Withdraw Reward</h2>
                <div style="margin-top: 20px; font-size: 1.2rem;" class="with">
                    Enter amount
                    <input type="number" placeholder="Amount" name="amount" required>
                </div>
                
                <button type="submit" value="Withdraw" name="withdraw" class="withdraw">Withdraw</button>
            </div>
            </div>
            <div id="toast">
            <div id="img">Error</div>
            <div id="desc">Not sufficient balance</div>

            <div id="toast2">
            <div id="img">Success</div>
            <div id="desc">Withdrawal Successfull</div>
        </form>
        <?php
            if($_POST['withdraw']){
                $amt = $_POST['amount'];
                if($amt>0){
                if($amt > $credit){
                    ?>
                    <script>
                        var x = document.getElementById("toast");
                        x.className = "show";
                        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
                    </script>
                    <?php
                }
                else{
                    $credit = $credit - $amt;
                    $query2="UPDATE food_donations SET credit='0' WHERE email='$email'";
                    $query_run2= mysqli_query($connection, $query2);

                    $query3="UPDATE food_donations SET credit='$credit' WHERE Fid='$id'";
                    $query_run3= mysqli_query($connection, $query3);
                    ?>
                    <script>
                        var x = document.getElementById("toast2");
                        x.className = "show";
                        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
                        let s = true;
                    </script>
                    <?php
                }
            }
            else{
                ?>
                <script>
                    var x = document.getElementById("toast");
                    x.className = "show";
                    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
                </script>
                <?php
            }
        }
        
        ?>
       
      

        <script>
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
        if(s){
            setTimeout(function() {
                location.href = 'user_reward.php'; 
            }, 2000); // 3000 milliseconds = 3 seconds

        }
        </script>
    </body>
</html>