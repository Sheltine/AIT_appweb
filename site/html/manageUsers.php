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

        $selected_id = -1;
        $users = $pdo->getUsersList();
        ?>
        <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="newuser.php"><button class="btn btn-success pull-right">Add</button></form>
            <table class="table">
                <h1>Manage users</h1>
                <thead>
                    <tr>
                        <td>Username</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($users as $user):?>
                    <tr>
                    <td> <input type="text" name="lname" value="<?= $user["login"] ?>" disabled></td>
                    <td><form action="user.php?userId=<?=$user["id"]?>" method="post"><button class="btn btn-default" type="submit" name="id" value="<?=$user["id"]?>">Edit</button></form></td>
                    <td><form method="post"><button class="btn btn-danger" type="submit" value="<?=$user["login"]?>" name="delete">Delete</button></form></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
        <?php 
            if(isset($_POST["delete"])){
               $pdo->delUser($_POST["delete"]);
               ?>
               <div class="row">
                    <div class = "col-md-4 col-md-offset-4 alert alert-success">
                        <p>Successfully deleted user.</p>
                    </div>
            </div>
                <?php
            header("Refresh: 1; url=manageUsers.php");
        }
        ?>

        <?php
            }
        ?>
    </body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>