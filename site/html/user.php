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
    
        <div>
        <?php if(isset($_GET['userId'])){
            $userInfo = $pdo->getUserById($_GET['userId']);

            foreach($userInfo as $info){
                $uLogin = $info["login"];
                $uRole = $info["role"];
                $uValidity = $info["validity"];
            }
            ?>
            <div>
            <h2>Information concerning <?= $uLogin ?></h2>
        </div>
            <div class="col-md-4">
            <form method = post>
                    <h2>Change user info</h2>
                    <table class="table">
                        <tr><td><label>Login </label></td><td><input type="text" name="login" value="<?= $uLogin ?>"></td></tr><br/>
                        <tr><td><label>Role </label></td><td>
        <input type="radio" name="role" value="0" <?php if($uRole === "0") { ?> checked <?php } ?> > User<br>
         <input type="radio" name="role" value="1" <?php if($uRole === "1") { ?> checked <?php } ?> > Admin<br>
                                                    </td></tr><br/>
                        <tr><td><label>Validity </label></td><td>
        <input type="radio" name="validity" value="true" <?php if($uValidity === "true") { ?> checked <?php } ?> > True<br>
         <input type="radio" name="validity" value="false" <?php if($uValidity === "false") { ?> checked <?php } ?> > False<br>

                        </td></tr><br/>
                        <tr>
                        <td>
                            <button  class="btn btn-danger pull-left" name="delete">Delete</button>
                            <button  class="btn btn-success pull-right" name="saveInfo">Save</button>
                        </td></tr>
                    </table>
            </form>
            <?php
                if(isset($_POST["saveInfo"])){
                    if($_POST["login"] == "" || $_POST["role"] == "" || $_POST["validity"] == ""){
                        ?>
                            <div class = "alert alert-danger">
                                <p>Cannot send empty fields.</p>
                            </div>
                        <?php
                    }else if(($_POST["login"] != $uLogin) && ($pdo->isUserInDb($_POST["login"])) == true){
                        ?>
                            <div class = "alert alert-danger">
                                <p>This username already exists, please choose another one.</p>
                            </div>
                        <?php
                    }else{
                        echo $uLogin;
                        echo $_POST["role"];
                        echo $_POST["validity"];
                        echo $_POST["login"];
                        $pdo->modUser($uLogin, $_POST["role"], $_POST["validity"], $_POST["login"]);
                        ?>
                            <div class = "alert alert-success">
                                <p>Successfully updated user.</p>
                            </div>
                        <?php
                    }
                }// fin if isset change
            ?>
        </div>
        <div class="col-md-4">
                    <h2>Change this user's password</h2>
                    <form method="post">
                        <table class="table col-md-5">
                            <tr><td><label>Your password</label></td><td><input type="password" name="yourpw"></td></tr><br/>
                            <tr><td><label>New password</label></td><td><input type="password" name="newpw"></td></tr><br/>
                            <tr><td><label>Repeat password</label></td><td><input type="password" name="newpw2"></td></tr><br/>
                            <tr><td><button class="btn btn-success" type="submit" name="changePW">Save</button></form></td></tr>
                        </table>
                    </form>
            <?php
                if(isset($_POST["changePW"])){
                    if($pdo->checkLogin($_SESSION["login"], $_POST["yourpw"]) == false){
                        ?>
                                <div class = "alert alert-danger">
                                    <p>Wrong password.</p>
                                </div>
                    <?php  
                    }else if($_POST["newpw"] != $_POST["newpw2"]){
                        ?>
                                <div class = "alert alert-danger">
                                    <p>New passwords are not matching.</p>
                                </div>
                        <?php  
                    }else{
                        $pdo->modUserPassword($uLogin, $_POST["newpw"]);
                        ?>
                                <div class = "alert alert-success">
                                    <p>Successfully changed youre password</p>
                                </div>
                    <?php  
                    }
                
                
                }// fin if isset change
            ?>
        </div>
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