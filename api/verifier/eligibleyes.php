<?php include'conn.php';?>

<?php
        session_start();
if($_SESSION['session']==1)
{
        $statusid=$_GET['ids'];

    //    echo"$status";

//     $connection = mysqli_connect('localhost:4306','root','');
//     $db = mysqli_select_db($connection,'admin');
    
    $status=1;
    $q1 = "update u_detail set eligible='$status' where u_id='$statusid'";    
    $query = mysqli_query($connection,$q1);

    if($query)
    {
           header('location:user.php');
    }
}
else
{?>
    <script>
        alert("Please Login !!");
        location.replace("../login_panel/login.html")
    </script>
<?php
}?>