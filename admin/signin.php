<?php
session_start();
include '../connection.php';
$token=0;

if (isset($_POST['sign'])) {
  $email =$_POST['email'];
  $password =$_POST['password'];

  // $sanitized_emailid =  mysqli_real_escape_string($connection, $email);
  // $sanitized_password =  mysqli_real_escape_string($connection, $password);

  $sql = "select * from admin where email='$email'";
  $result = mysqli_query($connection, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name'];
        // $_SESSION['gender'] = $row['gender'];
        
        header("location:home.php");
      } else {
        $token = 1;
      }
    }
  } else {
    ?>
    <script>
      alert('Account does not exist!');
      location.href="signin.php";
    </script>
    <?php
  }
}
?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    User Registration Page
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="sign-in-basic">
  <!-- Navbar Transparent -->
  <!-- End Navbar -->
  <div class="page-header align-items-start min-vh-100" loading="lazy">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
          <div class="card z-index-0 fadeIn3 fadeInBottom">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-4 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign In</h4>
                <div class="row mt-3">
              </div>
            </div>
            <div class="card-body">
              <form role="form" class="text-start" action=" " method="POST">
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control">
                </div>                
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <div class="text-center">
                  <button type="submit" name="sign" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign In</button>
                </div>
                <center>
                <?php
                    if($token==1){
                        echo ' <i class="bx bx-error-circle error-icon"></i>';
                        echo '<p class="error" style="color:red">Password not match.</p>';
                    }
                  ?>
                <!-- <a href="user_signup.html" class="mt-10 text-sm text-center">
                    Forgot Password?
                  </a><br>
                  <a href="user_signup.html" class="mt-10 text-m text-center ">
                    Don't have an account?
                  </a> -->
                </center>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer position-absolute bottom-2 py-2 w-100">
      <div class="container">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-12 col-md-6 my-auto">
            <!-- <div class="copyright text-center text-sm text-white text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script> -->
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="../assets/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>

  <script>
   
  </script>
</body>

</html>