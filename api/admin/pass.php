<?php include'conn.php';?>
<?php session_start(); if($_SESSION['session']==1){?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 40%;
            display: flex;
            height: 300px;
            background-color: #D10027;
            font-size: medium;
            
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 2px 16px;
        }
    </style>
</head>

<body >

<?php

$id=$_REQUEST["ids"];
$fname=$_REQUEST["fname"];
$lname=$_REQUEST["lname"];
$category=$_REQUEST["category"];
?>
    <div>
    <h1 style="margin-left: 350px; font-family: Arial, Helvetica, sans-serif; ">BRTS BUS PASS </h1>
        <div class="card">

            <img src="brts.jpg" alt="Avatar" width="300px" height="300px" style="margin-left: 0px; margin-top: 0px;">
            <div style="margin-left: 20px;">
               
                <table>
                    <tr>
                        <td><b>
                                <h2>Name : </h2>
                            </b></td>
                        <td>
                            <h3><?php echo $fname." ".$lname;  ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <td><b>
                                <h2>Category : </h2>
                            </b></td>
                        <td>
                            <h3><?php echo $category; ?></h3>
                        </td>
                    </tr>
                    <tr>
                        <td><b>
                                <h2>Card NO : </h2>
                            </b></td>
                        <td>
                            <h3>6078 3800 0016 3584</h3>
                        </td>
                    </tr>
                    <tr>
                        <td><b>
                                <h2>DATE :  </h2>
                            </b></td>
                        <td>
                            <h3>From: 5/2023 To VALID 9/2024</h3>
                        </td>
                    </tr>
                </table>

            </div>
            <div>
                <img src="chip.jpg" alt="Avatar" width="100px" height="80px" style="margin-left: 100px; margin-top: 100px;">
                <br>
                <img src="rupay.png" alt="Avatar" width="140px" height="30px" style="margin-left: 70px; margin-top: 20px;">
            <?php
                // $connection = mysqli_connect('localhost:4306', 'root', '');
                // $db = mysqli_select_db($connection, 'admin');

                $q1="update u_detail set u_create=1 where u_id='$id'";

                mysqli_query($connection,$q1);

            ?>
            </div>
        </div>


    </div>

</body>

</html>


<?php
}

else
{?>
 <script>
        alert("Please Login !!");
        location.replace("../login_panel/login.html")
    </script>

<?php }
?>
