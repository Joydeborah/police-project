<?php
require 'db.php';
if(isset($_POST['email']))
{
    extract($_POST);
    $password=crypt($password,'qwertyuiop;dfghjm,kjn_ytr4#');
    $sql="select * from users where email='$email' and password='$password'";
    $results = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($results);

    if ($count==1)
    {
//        success
        $user=mysqli_fetch_assoc($results);
//        sessions
        session_start();
//        var_dump($user);
        $_SESSION['user']=$user;
        header('location:home.php');
    }else
    {
        $error="wrong username or password";
    }
}

/*$password=crypt('123456','qwertyuiop;dfghjm,kjn_ytr4#');
$sql="INSERT INTO `users`(`id`, `names`, `badge_number`, `email`, `password`) VALUES
                       (null,'Inspector Gwalla','P0034','gwalla12@gmail.com','$password')";
//echo $password;
mysqli_query($conn, $sql) or die(mysqli_error($conn));*/

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap-4.2/css/bootstrap.css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card" style="margin-top: 100px">
                <div class="card-header">
                    Login
                </div>

                <div class="card-body">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" required class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" name="password" required class="form-control" id="pwd">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>

                    <p class="text-danger">
                        <?php
                        if (isset($error))
                            echo $error;
                        ?>
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>