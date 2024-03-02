<?php include'conn.php';?>
<?php session_start(); if($_SESSION['session']==1){?>


<?php
        $statusid=$_GET['ids'];
        $category=$_GET['category'];

   
        // $row=mysqli_fetch_array($query1);
        $delete="delete from u_comman_doc where u_id='$statusid'";
        $com=mysqli_query($connection,$delete);

        if($category=='Student')
        {
            echo"Student";
            $q2="delete from u_s_doc where u_id='$statusid'";
            $stu=mysqli_query($connection,$q2);
        }
        elseif($category=='Handicap')
        {
            $q2="delete from u_h_doc where u_id='$statusid'";
            $stu=mysqli_query($connection,$q2);
            echo"handi";
        }

    

    $status=0;
    $q1 = "update u_detail set u_doc_status='$status' where u_id='$statusid'";
    $q1 = "update u_detail set u_doc_success='$status' where u_id='$statusid'";
    $query = mysqli_query($connection,$q1);

    if($query)
    {
           header('location:'.$_SERVER['HTTP_REFERER']);
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