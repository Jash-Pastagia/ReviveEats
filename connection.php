<?php
//change mysqli_connect(host_name,username, password); 
<<<<<<< HEAD
$connection = mysqli_connect('localhost:3306', 'root', '');
=======
$connection = mysqli_connect('localhost', 'root', '');
>>>>>>> 6c9d19109ceae1d9b4a1cd2cdec1d90b848f9378
$db = mysqli_select_db($connection, 'demo');
?>