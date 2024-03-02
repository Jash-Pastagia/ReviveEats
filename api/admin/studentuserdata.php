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
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
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
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
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
                    <a href="index.html">
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
                        <li><a href="studentuserdata.php">Student User Data</a></li>
						<li><a href="citizenuserdata.php">Citizen User Data</a></li>
						<li><a href="seniorcitizenuserdata.php">seniorcitizen User Data</a></li>
						<li><a href="handicapuserdata.php">Handicap User Data</a></li>
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
                
                
                <!-- <li>
                    <a href="login.html">
                        <i class="fa fa-user"></i>
                        <span>Login Page</span>
                    </a>
                </li> -->
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
 <div class="panel panel-default">
    <div  class="panel-heading">
         <b>STUDENT USER DETAIL</b> 
         <!-- <a href="addverifier.php" style="float: right;"><b>ADD VERIFIER</b></a> -->
    </div>
    <div>
    <?php
    $connection = mysqli_connect('localhost:4306','root','');
    $db = mysqli_select_db($connection,'admin');
    $q1 = "select * from u_detail where u_category='Student' ";
    $query = mysqli_query($connection,$q1);

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
                <th >F_NAME</th>
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

                
            </tr>
            <?php
                while($row = mysqli_fetch_array($query))
                {
            ?>
         <tr>
                <td><?php echo $row['u_id']; ?></td>
                <td><?php echo $row['u_firstname']; ?></td>
                <td><?php echo $row['u_lastname']; ?></td>
                <td><?php echo $row['u_phonenumber']; ?></td>
                <td><?php echo $row['u_email']; ?></td>
                <td><?php echo $row['u_gender']; ?></td>
                <td><?php echo $row['u_dob']; ?></td>
                <td><?php echo $row['u_city']; ?></td>
                <td><?php echo $row['u_address']; ?></td>
                <td><?php echo $row['u_landmark']; ?></td>
                <td><?php echo $row['u_pin']; ?></td>
                <td><?php echo $row['u_category']; ?></td>
                <td><a href = "userdocument.php?ids=<?php echo $row['u_id']; ?>">Document </a></td>
            </tr> 
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
