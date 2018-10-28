<!DOCTYPE html>
<html>
    <head>
        <title>Page title</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    </head>
    <body>
        <?php
        session_start();
        if(isset($_SESSION["login"]) && isset($_SESSION["password"])){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            include_once("navbar.php");
            include_once("connect.php");
        ?>
            
        <div class="col-md-4 col-md-offset-4">
            <h1>Change password</h1>
            <form method="post">
                <table class="table">
                <div class="form-group">
                    <tr>
                        <td><label>Old password</label></td>
                        <td><input type="password" name="oldpw"></td>
                    </tr>
                    <tr>
                        <td><label>New password</label></td>
                        <td><input type="password" name="newpw"></td>
                    </tr>
                    <tr>
                        <td><label>Retype new password</label></td>
                        <td><input type="password" name="newpw2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button name="change" type="submit" class="btn btn-default pull-right">Submit</button></td>
                    </tr>
                    </div>
                </table>
            </form>
            <?php
                if(isset($_POST["change"])){
                    echo "coucou";
                    if($pdo->checkLogin($_SESSION["login"], $_POST["oldpw"]) == false){
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
                        $pdo->modUserPassword($_SESSION["login"], $_POST["newpw"]);
                        ?>
                                <div class = "alert alert-success">
                                    <p>Successfully changed youre password</p>
                                </div>
                    <?php  
                    }
                
                
                }// fin if isset change
            ?>
        </div>

        <?php
        }
        ?>
    </body>
</html>