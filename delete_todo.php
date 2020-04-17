<?php 

require_once('connection.php');
$id=$_GET['id'];

$q=mysqli_query($con,"DELETE from todo_tab where id='$id'");

header('location:view.php');

?>