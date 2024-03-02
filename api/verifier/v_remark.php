<?php include'conn.php';?>
<?php session_start(); if($_SESSION['session']==1){?>
<?php
    $id=$_REQUEST['ids'];
    $remark=$_REQUEST['Remark'];

    // $connection = mysqli_connect('localhost:4306', 'root', '');
    // $db = mysqli_select_db($connection, 'admin');
    // $q1 = "insert into u_detail (v_remark) VALUES('$remark') where u_id='$id'";
     $q1 = "update u_detail SET v_remark='$remark' where u_id='$id'"; 
    $query = mysqli_query($connection, $q1);

    if($query==true)
    {
        header('location:user.php');
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