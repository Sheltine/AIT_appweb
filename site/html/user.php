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
    
        <div class="col-md-8 col-md-offset-2">
        <?php if(isset($_POST['id'])){
            $userInfo = $pdo->getUserById($_POST['id']);
            ?>
            <h2>User information</h2>
            
            <h1><?php echo $_POST['id']?></h1>
            <form>
            <?php
                    foreach($userInfo as $info):?>
                    <h2>Change user info</h2>
                    <table class="table col-md-5">
                        <tr><td><label>Login </label></td><td><input type="text" name="login" value="<?= $info["login"] ?>"></td></tr><br/>
                        <tr><td><label>Role </label></td><td><input type="text" name="role" value="<?= $info["role"] ?>"></td></tr><br/>
                        <tr><td><label>Validity </label></td><td><input type="text" name="validity" value="<?= $info["validity"] ?>"></td></tr><br/>
                        <tr><td><label>Delete </label></td><td><form method="POST"><button  class="btn btn-danger" name="delete" value="<?= $info['id']?>">Delete</button></form></td></tr>
                    </table>
                    <?php endforeach; ?>
            </form>
            <?php
                    
                    foreach($userInfo as $info):?>
                    <h2>Change password</h2>
                    <table class="table col-md-5">
                        <tr><td><label>Your password</label></td><td><input type="password" name="yourpw"></td></tr><br/>
                        <tr><td><label>New password</label></td><td><input type="password" name="newpw"></td></tr><br/>
                        <tr><td><label>Repeat password</label></td><td><input type="password" name="newpw2"></td></tr><br/>

                    </table>
                    <?php endforeach; ?>
            </form>
        <?php }else{// fin if $_POST['id'] 
            ?>
                <h1>Sorry, you did not select any user.</h1>
            <?php
        } //fin else ?> 
        </div>
    <?php
} //fin if session(login) et session(password)
?>
</body>
</html>