<?php include'conn.php';?>
<?php session_start(); if($_SESSION['session']==1){?>

<?php error_reporting(0); ?>

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
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
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
                    <!-- user login dropdown start -->
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
                                <li>
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
                            <b>NOT ELIGIBLE FOR BUS PASS USER DETAIL</b>
                            <!-- <a href="addverifier.php" style="float: right;"><b>ADD VERIFIER</b></a> -->
                        </div>
                        <div>
                            <form method="post">
                                <!-- <input type="text" name="search" placeholder="Search" style="margin-left: 800px; margin-top: 20px;background-color: lightcoral; color: wheat;border-radius:10px;" >&nbsp;&nbsp; -->
                                <div class="dhar" style="float: right;">
                                    <label for="category" style="float: left;margin-top: 20px;">Filter by&nbsp;&nbsp;</label> <select name="category" style=" margin-top: 20px;background-color: lightcoral; color: white;border-radius:6px; ">
                                        <option value="a" selected>----All----</option>
                                        <option value="Student">Student</option>
                                        <option value="Handicap">Handicap</option>
                                        <option value="Citizen">Citizen</option>
                                        <option value="Senior Citizen">Senior Citizen</option>
                                    </select>
                                    <button type="submit" name="submit" style=" margin-top: 20px;background-color: #8b5c7e;border-radius: 100%;"><img src="images/search-icon.png"></button>
                                </div>
                            </form>

                            <?php

                            // $connection = mysqli_connect('localhost:4306', 'root', '');
                            // $db = mysqli_select_db($connection, 'admin');
                            $q1 = "select * from u_detail where eligible='2' AND u_create='0'";


                            if (isset($_POST['submit'])); {
                                try {
                                    $getcategory = $_POST['category'];


                                    if ($getcategory == "Student") {
                                        $q1 = "select * from u_detail where u_category='Student' AND eligible='2'  AND u_create='0'";
                                    } elseif ($getcategory == "Handicap") {
                                        $q1 = "select * from u_detail where u_category='Handicap' AND eligible='2'  AND u_create='0'";
                                    } elseif ($getcategory == "Citizen") {
                                        $q1 = "select * from u_detail where u_category='Citizen' AND eligible='2'  AND u_create='0'";
                                    } elseif ($getcategory == "Senior Citizen") {
                                        $q1 = "select * from u_detail where u_category='Senior Citizen' AND eligible='2'  AND u_create='0'";
                                    } elseif ($getcategory == "a") {
                                        $q1 = "select * from u_detail where eligible='2'  AND u_create='0'";
                                    }
                                } catch (Exception $e) {
                                }
                            }


                            $query = mysqli_query($connection, $q1);

                            if (mysqli_num_rows($query) == 0) { ?>
                                <br><br>
                                <p style="color: red; align-items: center;">
                                <h2>There is no Data !!!!</h2>
                                </p>
                            <?php } else {


                            ?>


                                <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>username</th>
                                            <!-- <th>Password</th> -->
                                            <th>F_NAME</th>
                                            <th>L_NAME</th>
                                            <th>PHONE NO.</th>
                                            <th>EMAIL</th>
                                            <th>GENDER</th>
                                            <th>DOB</th>
                                            <th>CITY</th>
                                            <th>ADDRESS</th>
                                            <th>LAND MARK</th>
                                            <th>PIN</th>
                                            <th>CATEGORY</th>
                                            <th>DOCUMENT</th>
                                            <th>DOC Verified STATUS</th>
                                            <th>DELETE</th>





                                        </tr>
                                        <?php
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['u_id']; ?></td>
                                                <td><?php echo $row['u_username']; ?></td>
                                                <!-- <td><?php //echo $row['u_password']; ?></td> -->
                                                <td><?php echo $row['u_firstname']; ?></td>
                                                <td><?php echo $row['u_lastname']; ?></td>
                                                <td><?php echo $row['u_phonenumber']; ?></td>
                                                <td><?php echo $row['u_email']; ?></td>
                                                <td><?php echo $row['u_gender']; ?></td>
                                                <td><?php echo $row['u_dob']; ?></td>
                                                <td><?php echo $row['u_city']; ?></td>
                                                <td><?php echo $row['u_address']; ?></td>
                                                <td><?php echo $row['u_landmark']; ?></td>c
                                                <td><?php echo $row['u_pin']; ?></td>
                                                <td><?php echo $row['u_category']; ?></td>
                                                <td><a href="userdocument.php?ids=<?php echo $row['u_id']; ?>">Document </a></td>
                                                <td><?php if ($row['u_doc_status'] == 1) {
                                                        echo "Verified";
                                                    } elseif ($row['u_doc_status'] == 0) {
                                                        echo "Not Verified";
                                                    } ?>
                                                
                                                <td>
                                                    <!-- <form action="pass.php" method="get">
                                                        <input type="submit" style="height: 40px; width: 100px;font-size:10px; border-radius: 0%;" onclick="return confirm('Are you sure?');" value="CREATE"> -->
                                                        <a href="delete.php?ids=<?php echo $row['u_id'];?>&fname=<?php echo $row['u_firstname'];?>&lname=<?php echo $row['u_lastname'];?>&category=<?php echo $row['u_category'];?> ">DELETE</a>
                                                </td>
                                                <!-- <td><input type="Button" name="yes" value="Yes"><br><br> <input type="button"  name="no" value="NO"></td> -->


                                            </tr>
                                        <?php } ?>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                                </table>
                            <?php } ?>

                            </thead>
                            <tbody>

                            </tbody>
                            </table>

                            </table>
                            <!-- <table align="center">
            <tr><td></td></tr><tr><td><td></td></td></tr> <tr>
                <td>
           <button style="font-weight: bolder;"><a  href="addverifier.php" style="color: black;" >ADD NEW OFFICER</a></button></td>
           </tr></table> -->
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
