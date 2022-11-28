<?php
$con = new mysqli('localhost','root','','cotton');
$sql = mysqli_query($con,"SELECT * FROM producto");
$row = mysqli_num_rows($sql);
?>