
<?php
    $connection = mysqli_connect('localhost','root',''); //connection with server apache (servername,username,pwd)
    echo "<br><br>";
    $database = mysqli_select_db($connection,'hackathon');//(connection vari,database_name) select database

?>