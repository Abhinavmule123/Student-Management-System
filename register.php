<?php
    $db = new mysqli("localhost","root","","sms");
    if($db->connect_error){
        die("connection failed");
    }
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $sql = "INSERT INTO admin (name,email,password)VALUES('$name','$email','$password')";
        if($db->query($sql)){
            echo '<div class="container p-3">
                <div class="alert alert-success alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>Admin Registered Successfully !</strong>
                </div>
                </div>';
        }
        else{
            echo '<div class="container p-3">
            <div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
             <strong>Admin Registered Failed !</strong>
            </div>
            </div>';
        }


    }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management Sysytem(Admin)</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container p-5">
        <div class="row mb-5">
            <div class="col-md-12">
                <h1 class="text-center">Student Management Sytem
                <br>
                   <i class="text-info">Admin Area</i>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 shadow rounded p-4 mx-auto">
                <h2 class="text-info text-center m-0">Register Here</h2>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group mt-5">
                        <center>
                            <input type="submit" value="Register" class="btn btn-primary">
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>