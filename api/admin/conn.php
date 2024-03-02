<?php
    $connection = mysqli_connect('localhost','root',''); //connection with server apache (servername,username,pwd)
    // if($connection) 
    // {   
    //     echo "connection done !! ";
    // }
    // else
    // {
    //     echo "connection is fail !! ";
    // }
    // echo "<br><br>";
    $database = mysqli_select_db($connection,'admin');//(connection vari,database_name) select database
    // if($database)
    // {
    //     echo "database find !! ";
    // }
    // else
    // {
    //     echo "database lost !! ";   
    // }
    // echo "<br><br>";


?>