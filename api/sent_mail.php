<?php
session_start();


//email sent:
date_default_timezone_set("Asia/Kolkata");
$mail_status = 0;
$con = mysqli_connect('localhost','root','','admin');
// if (isset($_POST['forgot_Register_btn'])) {
    $otp = rand(1000, 9999);
    $to_email = $_POST['forgot_email'];
    $_SESSION['temp_mail'] = $to_email;
    $_SESSION['temp_otp'] = $otp;
    $subject = "Simple Email Test via PHP";
    $body = "Hi, This is test email send by PHP Script this is your otp $otp ";
    $headers = "From: brtsbuspassdeveloper@gmail.com";
    // $cmp_email="SELECT u_email FROM u_detail where email='$to_email'";
    // $data = mysqli_query($con, $cmp_email);
    $validation = mysqli_num_rows($data);
    if ($validation == 1) {
        if (mail($to_email, $subject, $body, $headers)) {
            echo "Email successfully sent to $to_email...";
            $mail_status = 1;
            $sql1 = "INSERT INTO otp_data VALUES('','$otp','0','" . date("Y-m-d H:i:s") . "')";
            $data = mysqli_query($con, $sql1);
            ?>
    <script>
        location.replace("./../html/Code_verification.php");
    </script>
    <?php
        } else {
            echo "Email sending failed...";
        }
    }
    else{    
        ?>
        <script>
            document.getElementById("message").innerText="No users found.";
        </script>
    <?php
    }
    }

    //resend otp:

    if (isset($_POST['resend_otp'])) {
        $otp = rand(100000, 999999);
        $select_email = $_SESSION['temp_mail'];
          $prev_otp = $_SESSION['temp_otp'];
         $subject = "Simple Email Test via PHP";
         $body = "Hi, This is test email send by PHP Script this is your otp $otp ";
          $headers = "From: brtsbuspassdeveloper@gmail.com";
          $cmp_email="SELECT * FROM admin_create where email='$select_email'";
          $data = mysqli_query($con, $cmp_email);
          $validation = mysqli_num_rows($data);
if ($validation==1) {
    if (mail($select_email, $subject, $body, $headers)) {
        echo "Email successfully sent to $to_email...";
        $mail_status = 1;
        $sql1 = "INSERT INTO otp_data VALUES('','$otp','0','" . date("Y-m-d H:i:s") . "')";
        $data = mysqli_query($con, $sql1);
        $expire_otp = "UPDATE otp_data SET is_expired=1 WHERE otp='$prev_otp'";
        $expire_otp_query = mysqli_query($con, $expire_otp);
        ?>
    <script>
        location.replace("./../html/Code_verification.php");
    </script>
    <?php
    } else {
        echo "Email sending failed...";
    }
    }
}


// otp verification:
$mail_status = 0;

if (isset($_POST['otp_btn'])) {
$code = $_POST['code'];
$sql1 = "SELECT * FROM otp_data where otp='$code' AND is_expired='0'";
$data = mysqli_query($con, $sql1);
$validation = mysqli_num_rows($data);

if ($validation==1) {
    
        $mail_status = 0;
        $sql1 = "UPDATE otp_data set is_expired = 1 WHERE otp='$code'";
        $data = mysqli_query($con, $sql1);
        ?>
        <script>
            location.replace("./../html/confirm_password.php");
        </script>
        <?php
} else {
    ?>
        <script>
        document.getElementById("message").innerText="Invalid otp";
        </script>
    <?php
}
}


//modify password in database:
if (isset($_POST['change_password'])) {

    $new_Password = $_POST['new_password'];
    $conf_password = $_POST['Confirm_password'];
    
    if ($new_Password == $conf_password) {
        $connection = mysqli_connect('localhost', 'root', '', 'admin');
        $change_email = $_SESSION['temp_mail'];
        $update_query = "UPDATE admin_create SET password ='$new_Password' WHERE email = '$change_email'";
        $data = mysqli_query($connection,$update_query);
        echo $data;
       $validation = mysqli_affected_rows($connection);
        if ($validation != 0) {
            ?>
            <script>
            location.replace("./../html/login.php");
        </script>
        <?php
        } 
        else {
            ?>
            <script>
            document.getElementById("message").innerText="Password didn't change.";
            </script>
             <?php
        }

    } 
    else {
            ?>
            <script>
            document.getElementById("message").innerText="Those password didn't match. Try again.";
            </script>
             <?php
    }
}
?>