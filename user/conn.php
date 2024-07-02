
<?php
    $connection = mysqli_connect('localhost:3304','root',''); //connection with server apache (servername,username,pwd)
    $database = mysqli_select_db($connection,'demo');//(connection vari,database_name) select database
?>