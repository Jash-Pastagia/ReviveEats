<?php
<<<<<<< HEAD
//change mysqli_connect(host_name,username, password); 
$connection = mysqli_connect('localhost:3304', 'root', '');

=======
$connection = mysqli_connect('localhost', 'root', '');
>>>>>>> 267e2bbcea92beb6a6b2982a977e7a6a44693de2
$db = mysqli_select_db($connection, 'hackathon');
?>