<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Donate</title>
    <link rel="stylesheet" href="ngo_home.css">
    <!-- <link rel="stylesheet" href="ngo_delivery.css"> -->
    <link rel="stylesheet" href="../user/loginstyle.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

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
        <body style="background-color: #06C167;">
        <div class="container mx-auto py-8 ">
            <div class="regformf">
                <form action="" method="post">
                    <p class="logo" style="text-align:center;margin-bottom:2%"><b>Feedback Form</b></p>

                    <div class="input">
                        <label for="ngo_name"> Name of Delivery Person </label>
                        <input type="text" id="ngo_name" name="ngo_name" required />
                    </div>

                    <div class="input">
                        <label for="user_name"> Name of User </label>
                        <input type="text" id="user_name" name="user_name" required />
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
            <option>Excellent</option>
            <option>Good</option>
            <option>Fair</option>
            <option>Poor</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586l5.293-5.293a1 1 0 111.414 1.414l-6 6a1 1 0 01-1.414 0z"/></svg>
        </div>
    </div>
</div>

<div class="mt-3">
    <label for="Taste">
        Tase of Food
    </label>
    <div class="relative">
        <select name="Taste" class="mt-1 block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            <option>Excellent</option>
            <option>Good</option>
            <option>Average</option>
            <option>Below-Average</option>
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
            <option>High</option>
            <option>Moderate</option>
            <option>Low</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586l5.293-5.293a1 1 0 111.414 1.414l-6 6a1 1 0 01-1.414 0z"/></svg>
        </div>
    </div>
</div>

                    <!-- <div class="input">
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
                        <option value="Surat" selected>Surat</option>
                            <option value="Ahmedabad">Ahmedabad</option>
                            <option value="Baroda">Baroda</option>
                            <option value="Nadiad">Nadiad</option>
                            <option value="Gandhinagar">Gandhinagar</option>
                            <option value="Valsad">Valsad</option>
                        </select>
                    </div>-->
                    <div class="mt-7">
                        <button style="background-color:black; color:white; height:50px" type="submit" name="feedback_submit"> Submit</button>
                    </div>
                </form>
            </div>
        </div> 


    </body>

<!-- <div class="container mx-auto py-8">
    <form class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="ngo_name">
                Name NGO
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="ngo_name" type="text" placeholder="Name NGO">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="user_name">
                Name User
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="user_name" type="text" placeholder="Name User">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="quantity">
                Quantity
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="quantity" type="text" placeholder="Quantity">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="category">
                Category
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category" type="text" placeholder="Category">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Freshness
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option>Excellent</option>
                <option>Good</option>
                <option>Fair</option>
                <option>Poor</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Taste
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option>Excellent</option>
                <option>Good</option>
                <option>Average</option>
                <option>Below Average</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">
                Quality
            </label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option>High</option>
                <option>Moderate</option>
                <option>Low</option>
            </select>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Submit Feedback
            </button>
        </div>
    </form>
</div> -->
