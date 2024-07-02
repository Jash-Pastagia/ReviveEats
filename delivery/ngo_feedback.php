<?php
session_start();
include '../connection.php';
$id = $_SESSION['id'];

if (isset($_POST['feedback_submit'])) {
    // $id = 6;
    $dname = $_POST['ngo_name'];
    $uname = $_POST['user_name'];
    $quantity = $_POST['quantity'];
    $freshness = $_POST['Freshness'];
    $taste = $_POST['Taste'];
    $quality = $_POST['Quality'];
    $status = $_POST['status'];

    if($status == "accept"){
    $sql="insert into feedback values ('$id','$uname','$quantity','$freshness','$taste','$quality','$status')" ;
    // $result= mysqli_query($connection, $sql);
    // $num=mysqli_num_rows($result);
    $query_run= mysqli_query($connection, $sql);
    if($query_run)
    {
        header("Location:ngo_home.php");
      
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}else{
    $fid =  $_GET['id'];
    // $fid = 32;
    $sql = "delete from food_donations where Fid = '$fid'"; 
    $query_run= mysqli_query($connection, $sql);
    if($query_run)
    {
        header("Location:ngo_home.php");
      
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}
}

?><?php
session_start();
include '../connection.php';
// $id = $_SESSION['id'];

if (isset($_POST['feedback_submit'])) {
    $id = 6;
    $dname = $_POST['ngo_name'];
    $uname = $_POST['user_name'];
    $quantity = $_POST['quantity'];
    $freshness = $_POST['Freshness'];
    $taste = $_POST['Taste'];
    $quality = $_POST['Quality'];
    $status = $_POST['status'];

    if($status == "accept"){
    $sql="insert into feedback values ('$id','$uname','$quantity','$freshness','$taste','$quality','$status')" ;
    // $result= mysqli_query($connection, $sql);
    // $num=mysqli_num_rows($result);
    $query_run= mysqli_query($connection, $sql);
    if($query_run)
    {
        header("Location:ngo_home.php");
      
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}else{
    // $fid =  $_GET['id'];
    $fid = 32;
    $sql = "delete from food_donations where Fid = '$fid'"; 
    $query_run= mysqli_query($connection, $sql);
    if($query_run)
    {
        header("Location:ngo_home.php");
      
    }
    else{
        echo '<script type="text/javascript">alert("data not saved")</script>';
    }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donate</title>
    <link rel="stylesheet" href="home.css">
    <!-- <link rel="stylesheet" href="ngo_delivery.css"> -->
    <link rel="stylesheet" href="../user/loginstyle.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <script>
        hamburger=document.querySelector(".hamburger");
        hamburger.onclick =function(){
            navBar=document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
    </script>
        <body style="background-color: #06C167;">
        <form action = " " method = "POST">
        <div class="container mx-auto py-8 ">
            <div class="regformf">
                <form action="" method="post">
                    <p class="logo" style="text-align:center;margin-bottom:2%"><b>Feedback Form</b></p>

                    <div class="input">
                        <label for="ngo_name"> Email of Delivery Person </label>
                        <input type="email" id="ngo_name" name="ngo_name" required />
                    </div>

                    <div class="input">
                        <label for="user_name"> Email of User </label>
                        <input type="email" id="user_name" name="user_name" required />
                    </div>

                    <div class="input">
                        <label for="quantity"> Quantity of Food </label>
                        <input type="text" id="quantity" name="quantity" required />
                    </div>

                    
                    <!-- <br> -->
                    <!-- <div class="input">
                        <label for="category">Category of Food</label> -->
                        <!-- <br><br> -->
                        <!-- <div class="image-radio-group">
                            <input type="radio" id="raw-food" name="image-choice" value="raw-food">
                            <label for="raw-food">
                                <img src="raw-food.png" alt="raw-food">
                            </label>
                            <input type="radio" id="cooked-food" name="image-choice" value="cooked-food" checked>
                            <label for="cooked-food">
                                <img src="cooked-food.png" alt="cooked-food">
                            </label>
                        </div> -->
                        <!-- <br> -->
                    <!-- </div> # -->
                    
                    <!-- <div class="radio">
                        <label for="freshness">Freshness of Food </label>
                        <br><br>
                        
                        <input type="radio" name="raw_food" id="raw_food" value="raw_food" required />
                        <label for="raw_food" style="padding-right: 40px;">Raw Food</label>
                        <input type="radio" name="cooked_food" id="cooked_food" value="cooked_food">
                        <label for="cooked_food">Cooked Food</label>

                    </div> -->
                    <!-- <div class="">
            <label class="block text-gray-700 text-sm font-bold">
                Freshness of Food
            </label><br>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option>Excellent</option>
                <option>Good</option>
                <option>Fair</option>
                <option>Poor</option>
            </select>
        </div> -->
        
        <div class="">
    <label for="Freshness">
        Freshness of Food
    </label>
    <div class="relative">
        <select name="Freshness" class="mt-1 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            <option value="Excellent">Excellent</option>
            <option value="Good">Good</option>
            <option value= "Fair">Fair</option>
            <option value="Poor">Poor</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586l5.293-5.293a1 1 0 111.414 1.414l-6 6a1 1 0 01-1.414 0z"/></svg>
        </div>
    </div>
</div>

<div class="mt-3">
    <label for="Taste">
        Taste of Food
    </label>
    <div class="relative">
        <select name="Taste" class="mt-1 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            <option value="Excellent">Excellent</option>
            <option value="Good">Good</option>
            <option value="Average">Average</option>
            <option value="Below-Average">Below-Average</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586l5.293-5.293a1 1 0 111.414 1.414l-6 6a1 1 0 01-1.414 0z"/></svg>
        </div>
    </div>
</div>

<div class="mt-3">
    <label for="Quality">
        Quality of Food
    </label>
    <div class="relative">
        <select name="Quality" class="mt-1 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            <option value="High">High</option>
            <option value="Moderate">Moderate</option>
            <option value="Low">Low</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586l5.293-5.293a1 1 0 111.414 1.414l-6 6a1 1 0 01-1.414 0z"/></svg>
        </div>
    </div>
</div>

 <div class="radio mt-5" >
                        <label for="status" style="font-size:1.5vw">Status</label>
                        <br>      
                        
                        <input type="radio" name="status" id="accept" value="accept" required />
                        <label for="accept" style="padding-right: 40px;">Accept</label><br>
                        <input type="radio" name="status" id="reject" value="reject">
                        <label for="reject">Reject</label>

                    </div>
                
                    <div class="mt-7">
                        <button style="background-color:black; color:white; height:50px" type="submit" name="feedback_submit"> Submit</button>
                    </div>
                </form>
            </div>
        </div> 

        </form>
    </body>