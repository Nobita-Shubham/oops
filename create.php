<?php

include "controller.inc.php";
$app = new App;
$msg = "";
if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password === $cpassword)
    {
        $hash_password = md5($password);
        $arr = array('name'=>$name, 'email'=>$email, 'password'=>$hash_password);
        $app->create("logins", $arr);
        header('location:main.php');
    }else{
        $msg = "please check confirm password";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" aria-describedby="helpId" placeholder="enter a name" >
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" aria-describedby="helpId" placeholder="enter a email" >
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" aria-describedby="helpId" placeholder="enter a password" >
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="cpassword" aria-describedby="helpId" placeholder="cofirm your password" >
            </div>
            <div style="color:red;"><?php echo $msg;?></div>
            <button type="submit" name='add' class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>