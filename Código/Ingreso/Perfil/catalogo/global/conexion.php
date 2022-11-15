<?php
$con = new mysqli('localhost','root','','cotton');
$id = '1127024006';
$sql = mysqli_query($con,"SELECT * FROM producto");
$row = mysqli_num_rows($sql);
?>