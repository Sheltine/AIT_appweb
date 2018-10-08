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
        $selected_id = -1;
        ?>
        <div class="col-md-4 col-md-offset-1">
            <button class="btn btn-success pull-right">Add</button>
            <table class="table">
                <h1>Manage users</h1>
                <thead>
                    <tr>
                        <td>Username</td>
                        <!--
                        <td>Password</td>
                        <td>Validity</td>
                        <td>Role</td>
    -->
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                <tr>
                        <td> <input type="text" name="lname" value="Nyahon" disabled></td>
                        <td><button class="btn btn-default" data-toggle="collapse" data-target="#editUser" id="2">Edit</button></td>
                        <td><button class="btn btn-danger">Delete</button></td>

                    </tr>
                
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
        
        <div id="editUser" class="col-md-4 col-md-offset-2 collapse">
            <table class="table">
                    <tr>
                    <td>Username</td>
                        <td>Password</td>
                        <td>Validity</td>
                        <td>Role</td>
                        <td>Edit</td>
                        <td>Delete</td>
            </tr>
                </thead>
            </table>
        </div>
        <?php
            }
        ?>
    </body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>