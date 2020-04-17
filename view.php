<?php 
require_once('connection.php');
$q=mysqli_query($con,"SELECT * from todo_tab");
$rr=mysqli_num_rows($q);
if(!$rr)
{
echo "<h2 style='color:red'>No TODO Found...!</h2>";
}
else
{
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
    
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>TODO Data</title>
    <script src="jquery.js"></script>
    <script lang="javascript" src="xlsx.full.min.js"></script>
    <script lang="javascript" src="FileSaver.min.js"></script>

    <script>
        function DeleteUser(id)
        {
            if(confirm("You want to delete this Todo...?"))
            {
                window.location.href="delete_todo.php?id="+id;
            }
        }
    </script>
    <style type = "text/css">
        @import url('https://fonts.googleapis.com/css?family=Acme|Bree+Serif|Patrick+Hand|Volkhov|Handlee|PT+Serif|Numans|Bitter|Odibee+Sans|Simonetta|Trade+Winds&display=swap');

        .mcon{
            margin-top: 0;
            padding-top: 0;
            position:absolute;
            top:85px;
            font-family:'Acme';
            left:0;
            right:0;
        }
        .foot
        {
            margin-top:auto;
            display: block;
            position: static;
            font-family: trade winds;
        }

        a{
            color: black;
            text-decoration: none;
            color: orangered;
            font-family: 'Acme';
            font-size: 25px;
        }

        a:hover{
            text-decoration: none;
            color:green;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-light bg-dark" style = "font-family:'Acme'">
        <a class="navbar-brand text-white" href="#">TODO-App</a>
        <a class="navbar-brand text-white" href="index.php">Add New Notes</a>
    </nav><div class = "col-sm-7 mcontainer m-auto text-center text-uppercase" style = "background-color: rgba(121,12,12,0.4) !important;font-family: 'PT Serif';border : 3px solid black;padding: 10px;" >
    <div class = "card">
                <div class = "card-header text-white bg-dark">
                    <h1 class = "">Todo Data</h1>
                </div>
            </div>
    </div>
<div class = "col-lg-6 mcon text-center m-auto">
    <table width = "100%" class="mcon table table-bordered table-hover table-responsive"ss>
    	<tr align = 'center' style = "color:black;font-size:25px;font-family: 'PT serif';" class="table-info">
            <th style='border:2px solid black'>SL.No</th>
            <th style='border:2px solid black'>Title</th>
            <th style='border:2px solid black'>Notes</th>
            <th style='border:2px solid black'>Date</th>
            <th style='border:2px solid black'>Update</th>
            <th style='border:2px solid black'>Delete</th>
		</tr>
        
      
    <?php

        $query1 = "SELECT * FROM todo_tab";
        $result = mysqli_query($con,$query1);
        while($row = mysqli_fetch_array($result)) 
            {
                echo "<tr style='color:black;border-bottom:2px solid black;font-size:18px;border-right:2px solid black;border-top:2px solid black;border-left:2px solid black;'>";
            	echo "<td style='border:2px solid black' align = 'center'>".$row['id']."</td>";
	            echo "<td style='border:2px solid black' align = 'center'>".$row['title']."</td>";
	            echo "<td style='border:2px solid black' align = 'center'>".$row['notes']."</td>";
                echo "<td style='border:2px solid black' align = 'center' width='200px'>".$row['date']."</td>";
                    

    ?>
            <td align = 'center' style='border:2px solid black'> <a href="update.php?id=<?php echo $row['id']; ?>" style='color:green'><i class = "fa fa-pencil-alt"></i></a> </td>
            <td align = 'center' style='border:2px solid black'> <a href="javascript:DeleteUser('<?php echo $row['id']; ?>')" style='color:red'><i class = "fa fa-trash"></i></a> </td>

            <?php
                
            echo "<tr />";
            echo "<br />";
        }
    }
        ?>  
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">
       <p></p>
    </nav>
</body>
</html>