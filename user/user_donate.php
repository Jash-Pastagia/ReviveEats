<?php
include("login.php"); 
if($_SESSION['name']==''){
	header("location: user_signin.php");
}
// include("login.php"); 
$emailid= $_SESSION['email'];
$connection=mysqli_connect("localhost:3304","root","");
$db=mysqli_select_db($connection,'demo');
if(isset($_POST['submit']))
{
    $foodname=mysqli_real_escape_string($connection, $_POST['foodname']);
    $meal=mysqli_real_escape_string($connection, $_POST['meal']);
    $category=$_POST['image-choice'];
    $quantity=mysqli_real_escape_string($connection, $_POST['quantity']);
    // $email=$_POST['email'];
    $phoneno=mysqli_real_escape_string($connection, $_POST['phoneno']);
    $district=mysqli_real_escape_string($connection, $_POST['district']);
    $address=mysqli_real_escape_string($connection, $_POST['address']);
    $name=mysqli_real_escape_string($connection, $_POST['name']);
  
    $query="insert into food_donations(email,food,type,category,phoneno,location,address,name,quantity) values('$emailid','$foodname','$meal','$category','$phoneno','$district','$address','$name','$quantity')";
    $query_run= mysqli_query($connection, $query);
    if($query_run)
    {

        echo '<script type="text/javascript">alert("data saved")</script>';
        header("location:delivery.html");
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revive Eats</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header style="border-bottom: 2px solid black;">
        <div class="logo">Revive<b style="color: #06C167;">Eats</b></div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li><a href="home.html" class="active">Home</a></li>
                <li><a href="user_reward.html">Reward</a></li>
                <li><a href="contact.html">Contact</a></li>
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

    <body style="    background-color: #06C167;">
        <div class="container">
            <div class="regformf">
                <form action="" method="post">
                    <p class="logo">Revive <b style="color: #06C167; ">Eats</b></p>

                    <div class="input">
                        <label for="foodname"> Food Name:</label>
                        <input type="text" id="foodname" name="foodname" required />
                    </div>


                    <div class="radio">
                        <label for="meal">Meal type :</label>
                        <br><br>

                        <input type="radio" name="meal" id="veg" value="veg" required />
                        <label for="veg" style="padding-right: 40px;">Veg</label>
                        <input type="radio" name="meal" id="Non-veg" value="Non-veg">
                        <label for="Non-veg">Non-veg</label>

                    </div>
                    <br>
                    <div class="input">
                        <label for="food">Select the Category:</label>
                        <br><br>
                        <div class="image-radio-group">
                            <input type="radio" id="raw-food" name="image-choice" value="raw-food">
                            <label for="raw-food">
                                <img src="raw-food.png" alt="raw-food">
                            </label>
                            <input type="radio" id="cooked-food" name="image-choice" value="cooked-food" checked>
                            <label for="cooked-food">
                                <img src="cooked-food.png" alt="cooked-food">
                            </label>
                        </div>
                        <br>
                    </div>
                    <div class="input">
                        <label for="quantity">Quantity:(No. of person)</label>
                        <input type="text" id="quantity" name="quantity" required />
                    </div>
                    <b>
                        <p style="text-align: center;">Contact Details</p>
                    </b>
                    <div class="input">

                        <div>
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="<?php echo"". $_SESSION['name'] ;?>"
                                required />
                        </div>
                        <div>
                            <label for="phoneno">PhoneNo:</label>
                            <input type="text" id="phoneno" name="phoneno" maxlength="10" pattern="[0-9]{10}"
                                required />

                        </div>
                    </div>
                    <div class="input">
                        <label for="address" style="padding-left: 10px;">Address:</label>
                        <input type="text" id="address" name="address" required /><br>
                        <label for="location"></label>
                        <label for="district">District:</label>
                        <select id="district" name="district" style="height: 2rem; width: 5rem; font-size: 1rem">
                        <option value="chennai" selected>Surat</option>
                            <option value="kancheepuram">Ahmedabad</option>
                            <option value="thiruvallur">Baroda</option>
                            <option value="vellore">Nadiad</option>
                            <option value="tiruvannamalai">Gandhinagar</option>
                            <option value="tiruvallur">Valsad</option>
                        </select>
                    </div>
                    <div class="btn">
<<<<<<< HEAD:user/user_donate.html
                        <button type="submit" name="submit"> Submit</button>
=======
                        <button type="submit" name="submit">Submit</button>
>>>>>>> 81c7c7ca05623b340c55c7208d9d4543d8740ec8:user/user_donate.php

                    </div>
                </form>
            </div>
        </div>


    </body>
    <footer class="footer">
        <div class="footer-left col-md-4 col-sm-6">
            <p class="about">
                <span> About us</span>The basic concept of this project Food Waste Management is to collect the
                excess/leftover
                food from donors such as hotels, restaurants, marriage halls , etc and distribute to the needy people .
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
                    <li><a href="https://twitter.com/globalgiving"><img src="https://i.ibb.co/Wnxq2Nq/twitter.png"></a>
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
</body>

</html>