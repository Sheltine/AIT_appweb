<!DOCTYPE html>
<html>
    <head>
        <title>Page title</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    </head>
    <body>

<?php
session_start();

if($_SESSION["role"] != "1"){
    header("Location:chat.php");
}

if(isset($_SESSION["login"]) && isset($_SESSION["password"])){
    include_once("navbar.php");
    include_once("connect.php");


    ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Add user</h1>
            <form method="post">
                <div class="form-group">
                    <label>Login</label>
                    <input type="textfield" name="login" class="form-control">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <label>Role</label><br/>
                    <input type="radio" name="role" value="0" checked>User<br>
                    <input type="radio" name="role" value="1">Admin<br>
                    <label>Validity</label><br/>
                    <input type="radio" name="validity" value="true"checked>True<br>
                    <input type="radio" name="validity" value="false">False<br>
                    <button type="submit" name="sendUser" class="btn btn-default pull-right">Send</button>
                </div>
            </form>
        </div>
</div>
    <?php

    if(isset($_POST["sendUser"])){
    
        $pdo->addUser($_POST["login"], $_POST["password"], $_POST["validity"], $_POST["role"]);
        ?>
        <div class="row">
            <div class = "alert alert-success col-md-8 col-md-offset-2">
                <p>Successfully added user.</p>
            </div>
    </div>
        <?php
            header("Refresh: 1; url=manageUsers.php");
    }

    //session_unset();
    //session_destroy();
}else{
    echo "lol";
} ?>
</body>
</html>