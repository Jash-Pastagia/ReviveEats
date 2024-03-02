<?php include 'conn.php'; ?>
<?php session_start(); if($_SESSION['session']==1){?>

<!-- <html>
    <head>
        <title>update verifier officer data</title>
    </head>

    <body>
        <center><h1>UPDATE VERIFIER OFFICER DATA</h1></center>
        <form action="updateverifierquery.php" method="post" >
        <table border="0" align='center'>
        <tr>
        <td>   Enter ID:</td> 
        <td> <input type="text" name="vid" value="1" required>(Enter current verifierID)</td>
        <tr>
        <td>   Enter NAME:</td> 
        <td> <input type="text" name="updatevusername" required></td>
       </tr>
        <tr> 
            <td> Assign a Password:</td>
            <td><input type="text" name="updatevpassword" required></td>
        </tr>
        <tr> 
            <td>  </td>
            <td><input type="submit" name="addverifier" value="Update"></td>
        </tr>
        </table>
        </form>
        
    </body>
</html> -->

<!-- <html>
    <head>
        <title>Add verifier officer</title>
    </head>

    <body>
        <center><h1>ADD VERIFIER OFFICER</h1></center>
        <form action="addverifierquery.php" method="post" >
        <table border="0" align='center'>
        <tr>
        <td>   Enter NAME:</td> 
        <td> <input type="text" name="addvname" required></td>
       </tr>
        <tr> 
            <td> Assign a Password:</td>
            <td><input type="text" name="addvpassword" required></td>
        </tr>
        <tr> 
            <td>  </td>
            <td><input type="submit" name="addverifier"></td>
        </tr>
        </table>
        </form>
        
    </body>
</html> -->

<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>

    <title>BRTS BUSS PASS </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script
        type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Dharmik -->
    <script src="js/jquery2.0.3.min.js"></script>
</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">

                <a href="index.html" class="logo">
                    ADMIN
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->

                <!--  notification end -->
            </div>
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li> -->
                    <!-- user login dropdown start-->
                    <!-- <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username">John Doe</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li> -->
                    <!-- user login dropdown end -->

                </ul>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="Post">
		<input type="submit" style="margin-left:1850px;height: 50px; width: 150px;background-color: #8b5c7e;font-size:30px; border-radius: 5%;" onclick="return confirm('Are you sure?');" value="LOGOUT" name="logout">
		<!--search & user info end-->
		</form>
        <?php
            if(isset($_POST['logout']))
            {
                session_destroy();
                header("location:../login_panel/login.html");
            }
        ?>

                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>


                        <li class="sub-menu">
                            <a class="active" href="javascript:;">
                                <i class="fa fa-th"></i>
                                <span>User</span>
                            </a>
                            <ul class="sub">
                                <li><a href="all_user_data.php">All User Data</a></li>
                                <li><a href="document_verified_user.php">Document Verified User</a></li>
                                <li><a href="document_Verify_Pandding_User.php">Document Verify Pandding User</a></li>
                                <li><a href="eligiblr_for_pass.php">Eligible for Pass</a></li>
                                <li><a href="noteligible_for_pass.php">Not Eligible for Pass</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="verifier.php">
                                <i class="fa fa-th"></i>
                                <span>Verifier</span>

                            </a>
                            <!-- <ul class="sub">
                        <li><a href="basic_table.html">User Data</a></li>
                        <li><a href="responsive_table.html">Responsive Table</a></li>
                    </ul> -->
                        </li>
                        </li>

                        <li class="sub-menu">
                            <a href="Status.php">
                                <i class="fa fa-th"></i>
                                <span>Status</span>

                            </a>


                            <!-- <li>
                    <a href="login.html">
                        <i class="fa fa-user"></i>
                        <span>Login Page</span>
                    </a>
                </li> -->
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>UPDATE VERIFIER DATA</b>
                            <!-- <a href="addverifier.php" style="float: right;"><b>ADD VERIFIER</b></a> -->
                        </div>
                        <div>
                            <?php
                            // $connection = mysqli_connect('localhost:4306','root','');
                            // $db = mysqli_select_db($connection,'admin');
                            $q1 = "select * from v_login";
                            $query = mysqli_query($connection, $q1);
                            ?>


                            <!-- <form action="addverifierquery.php" method="post"  >
        <table border="0"  align='center'>
        <tr>
        <td ></td> 
        <td>  </td>
       </tr>
       <br>
        <tr>
        <td style="color:purple;">  <b> Enter NAME:</b></td> 
        <td> <input type="text" name="addvname" required style="background-color: lightcoral; color: white; border-radius: 5px;margin-bottom: 15px;"  ></td>
       </tr>
       <tr>
        <td > </td> 
        <td>  </td>
       </tr>
        <br>
        <tr> 
            <td style="color:purple;"> <b>Assign a Password: &nbsp;&nbsp;&nbsp;&nbsp;</b></td>
            <td><input type="text" name="addvpassword" style="background-color: lightcoral; color: white;border-radius: 5px;margin-bottom: 15px; " required></td>
        </tr>
        <tr><td></td></tr>
        <tr> 
            <td>  </td>
            <td><input type="submit" name="addverifier" style="background-color:lightsalmon ; "></td>
        </tr>
        </table>
        </form> -->
                            <?php
                            // $connection = mysqli_connect('localhost:4306','root','');
                            // $db = mysqli_select_db($connection,'admin');
                            
                            $v_id = $_GET['ids'];
                            $q1 = "select * from v_login where v_id='$v_id'";
                            $query = mysqli_query($connection, $q1);
                            $row = mysqli_fetch_array($query)

                                ?>
                            <form action="updateverifierquery.php" method="post">
                                <table border="0" align='center'>
                                    <tr>
                                        <td style="color:purple;"> <b> User ID:</b></td>
                                        <td>
                                            <!-- <label for="ID" name="vid"  style=" background-color: lightcoral; color: white; margin-bottom: 15px; margin-top: 15px;border-color: black;border-radius: 5px;">&nbsp;&nbsp;<?php echo $v_id; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> -->
                                            <input type="text" name="vid" value="<?php echo $v_id; ?>" required
                                                style="background-color: lightcoral; color: white; border-radius: 5px;margin-bottom: 15px; margin-top: 15px; ">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color:purple;"> <b> Update Name:</b></td>
                                        <td> <input type="text" name="updatevname" value="<?php echo $row['v_name']; ?>"
                                                required
                                                style="background-color: lightcoral; color: white; border-radius: 5px;margin-bottom: 15px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color:purple;"> <b> Update Email:</b></td>
                                        <td> <input type="email" name="updatevemail"
                                                value="<?php echo $row['v_email']; ?>" required
                                                style="background-color: lightcoral; color: white; border-radius: 5px;margin-bottom: 15px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color:purple;"> <b> Update Username:</b></td>
                                        <td> <input type="text" name="updatevusername"
                                                value="<?php echo $row['v_username']; ?>" required
                                                style="background-color: lightcoral; color: white; border-radius: 5px;margin-bottom: 15px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color:purple;"> <b> Update Password: &nbsp;&nbsp;</b></td>
                                        <td> <input type="text" name="updatevpassword"
                                                value="<?php echo $row['v_password']; ?>" required
                                                style="background-color: lightcoral; color: white; border-radius: 5px;margin-bottom: 15px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color:purple;"> <b> Update Branch:</b></td>
                                        <td> <input type="text" name="updatevbranch"
                                                value="<?php echo $row['v_branch']; ?>" required
                                                style="background-color: lightcoral; color: white; border-radius: 5px;margin-bottom: 15px;">
                                        </td>
                                    </tr>


                                    <tr>
                                        <td> </td>
                                        <td><input type="submit" name="addverifier" value="Update"
                                                style="background-color:lightsalmon ; "></td>
                                    </tr>
                                </table>
                            </form>
                            <br><br>

</body>

</html>

</table>
</div>
</div>
</div>
</section>
<!-- footer -->
<!-- <div class="footer">
            <div class="wthree-copyright">
              <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
            </div>
          </div> -->
<!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
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
