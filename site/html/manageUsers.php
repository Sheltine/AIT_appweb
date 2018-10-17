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
        <div class="col-md-4 col-md-offset-1">
            <button class="btn btn-success pull-right">Add</button>
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
                    <td><form method="POST"><button class="btn btn-default" type="submit" name="id" value="<?= $user["id"] ?>">Edit</button></form></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                    <?php endforeach; ?>
                
                <!--
                    <tr>
                        <td> <input type="text" name="lname" value="Nyahon" disabled></td>
                        <td>•••••</td>
                        <td>Active</td>
                        <td>Admin</td>
                        <td><button class="btn btn-default" id="2">Edit</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                        <td><button class="btn btn-success" method="post" value="selected_id">Save</button></td>

                    </tr>
                 
                    <tr id="demo" class="collapse">
                        <td>Nyahon</td>
                        <td>•••••</td>
                        <td>Active</td>
                        <td>Admin</td>
                        <td><button class="btn btn-default" data-toggle="collapse" data-target="#demo">Edit</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                    
                    <tr>
                        <td>loul</td>
                        <td>•••••</td>
                        <td>Active</td>
                        <td>Admin</td>
                        <td><button class="btn btn-default" data-toggle="collapse" data-target="#demo">Edit</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>-->
                    </tr>
                </tbody>
                
            </table>
        </div>
        <?php if(isset($_POST['id'])){
            $userInfo = $pdo->getUserById($_POST['id']);
            ?>
        <div  class="col-md-4 col-md-offset-2">
            <h1>Edit</h1>
                <?php
                    foreach($userInfo as $info):?>
                    <table class="table">
                        <tr><td><label>Login </label></td><td><input type="text" name="lname" value="<?= $info["login"] ?>"></td></tr><br/>
                        <tr><td><label>Password </label></td><td><input type="text" name="lname" value="<?= $info["password"] ?>"></td></tr><br/>
                        <tr><td><label>Role </label></td><td><input type="text" name="lname" value="<?= $info["role"] ?>"></td></tr><br/>
                        <tr><td><label>Validity </label></td><td><input type="text" name="lname" value="<?= $info["validity"] ?>"></td></tr><br/>
                        <tr><td><label>Delete </label></td><td><form method="POST"><button  class="btn btn-danger" name="delete" value="<?= $info['id']?>">Delete</button></form></td></tr>
                    </table>
                    <?php endforeach; ?>
        <?php
     }
     if(isset($_POST["delete"])){
        ?><div>Are you sure you want to delete <?= $pdo->getUserById($_POST["delete"])[0]["login"] ?>?</div>
            <?php
     }
     ?>
        </div>
        <?php
            }
        ?>
    </body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>