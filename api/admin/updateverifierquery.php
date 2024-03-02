<?php include'conn.php';?>
<?php session_start(); if($_SESSION['session']==1){?>

<?php
    session_start();

    // $connection = mysqli_connect('localhost:4306','root','');
    // $db = mysqli_select_db($connection,'admin');
   $v_id=$_POST['vid'];
   $v_name=$_POST['updatevname'];
   $v_email=$_POST['updatevemail'];
   $v_username=$_POST['updatevusername'];
   $v_password=$_POST['updatevpassword'];
   $v_branch=$_POST['updatevbranch'];
   
   

   $query = "update v_login set v_name = '$v_name',v_email='$v_email',v_username='$v_username',v_password='$v_password',v_branch='$v_branch' where v_id = '$v_id'";

   $query1 = mysqli_query($connection,$query);
        if($query1)
        {
            //echo "Record is Updated.";
           header('location:verifier.php');
        }
        else 
        {
            echo "Record is not Updated.";
        }
   
?>


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
