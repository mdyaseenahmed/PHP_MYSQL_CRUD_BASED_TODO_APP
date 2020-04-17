<?php
    require_once('connection.php');
    $id = $_GET['id'];
    $query = mysqli_query($con,"SELECT * from todo_tab WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
?>

<?php
    extract($_POST);
    if(isset($Update))
    {
    $q = "UPDATE todo_tab set title = '$tit',notes = '$note',date = '$mdate' where id = '$id'";
    $run = mysqli_query($con,$q);
    if($run)
    {
        $err="<font color='green' align='center'>TODO Updated Successfully...!</font>";	
        
    }
    else
    {
        $err="<font color='red' align='center'>Error in Updating TODO.!</font>";	
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel = "stylesheet" href = "styles.css">
    
    <title>Update TODO</title>
</head>
<body>
    <nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand text-white" href="#">TODO-App</a>
        <a class="navbar-brand text-white" href="view.php">Display the Notes</a>
    </nav>
    
        <div class = "col-sm-6 mcontainer m-auto text-center text-uppercase" >
            <div class = "card">
                <div class = "card-header text-white bg-dark">
                    <h1 class = "">Update Todo</h1>
                </div>
            </div>
        </div>

        <div class = "form-group mcon align-items-center col-sm-6 m-auto">
            <form method = "post" class = "myform">
                <div class = "row">
                    <div class = "col-lg-6">
                        <p align="center"><b><?php echo @$err; ?></b></p>
                    </div>
                </div>
            <div class = "row">
                <div class="col-lg-3">
                    <label class="col-form-label mlabel col-form-label-lg"> Title : </label>
                </div>
                <div class = "col">
                    <div class="input-group mig">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                        </div>
                        <input class="form-control form-control-lg" type = "text" placeholder = "Notes" name = "tit" style = "text-overflow:ellipsis" value = "<?php echo $row['title'];?>" />
                    </div>
                </div>
            </div>

            <div class = "row">
                <div class="col-lg-3">
                    <label class="col-form-label mlabel col-form-label-lg"> Notes : </label>
                </div>
                <div class = "col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-notes-medical"></i></span>
                        </div>
                        <input class="form-control form-control-lg" type = "text" placeholder = "Notes" name = "note" value = "<?php echo $row['notes'];?>" />
                    </div>
                </div>
            </div>

            <div class = "row">
                <div class="col-lg-3">
                    <label class="col-form-label mlabel col-form-label-lg"> Date : </label>
                </div>
                <div class = "col">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input class="form-control form-control-lg" type = "date" name = "mdate" placeholder = "date" value = "<?php echo $row['date'];?>" />
                    </div>
                </div>
            </div>

            <div class = "row">
                    <div class = "col-lg-6">
                        <input class="form-control form-control-lg  login_btn" name = "Update" value = "Update-Todo" type = "submit" />
                    </div>
                    <div class = "col-lg-6">
                        <input class="form-control form-control-lg reset_btn" type = "reset" />
                    </div>
                </div>
            </div>
        </form>
    </div>
        <div class="footer text-center m-auto">
            <h5 class = "foot">Developed By <a href = "https://mdyaseenahmed.ml">Md Yaseen Ahmed</a></h5>
        </div>
    </div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">
       <p></p>
      </nav>
</body>
</html>