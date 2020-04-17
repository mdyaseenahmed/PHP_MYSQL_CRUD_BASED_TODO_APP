<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "todo";

    $con = mysqli_connect($server,$user,$pass,$db);

    if($con)
    {
        echo "";
    }
    else
    {
        echo "Error in Connection.!";
    }

?>