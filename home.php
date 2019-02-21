<?php
require 'security.php';
if(isset($_POST['crime']))
{
    require 'db.php';
    extract($_POST);
    $today= date('Y-m-d H:i:s');
    $left ="0000-00-00";
    $sql="INSERT INTO `suspects`(`id`, `names`, `identity`, `gender`, `date`, `date_left`, `crime`, `type`) VALUES
                               (null,'$names','$identity','$gender','$today','$left','$crime','$type')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <link rel="stylesheet" href="bootstrap-4.2/css/bootstrap.css">
    <script scr="bootstrap-4.2/js/jquery.min.js"></script>
    <script scr="bootstrap-4.2/js/popper.min.js"></script>
    <script scr="bootstrap-4.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php require 'navbar.php'; ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card" style="margin-top: 15px">
                <div class="card-header">
                    Add suspect
                </div>

                <div class="card-body">
                    <h4 class="text-success">
                        <?php
                        if (isset($message))
                            echo $message
                        ?>
                    </h4>
                    <form action="home.php" method="post">
                        <div class="form-group">
                            <label for="names">Names:</label>
                            <input type="text" name="names" required class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">ID/PASSPORT no.:</label>
                            <input type="text" name="identity" required class="form-control" id="pwd">
                        </div>
                        <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" checked value="Male" class="form-check-input" name="gender">Male
                                </label>
                        </div>
                       <div class="form-check">
                               <label class="form-check-label">
                                   <input type="radio" value="Female" class="form-check-input" name="gender">Female
                               </label>
                       </div>


                        <div class="form-group">
                            <label>Type of crime</label>
                            <select name="type"  class="form-control">
                                <option value="Traffic">Traffic</option>
                                <option value="Child abuse">Child abuse</option>
                                <option value="Theft">Theft</option>
                                <option value="Murder">Murder</option>
                                <option value="Violence">Violence</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Describe the crime</label>
                            <textarea name="crime"  rows="6" class="form-control"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary btn-block">Add suspect</button>
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
