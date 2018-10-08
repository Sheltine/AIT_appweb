<!DOCTYPE html>
<html>
    <head>
        <title>Page title</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    </head>
    </head>
    <body>
        <?php
        include_once 'connect.php';
        session_unset();
        session_destroy();
        ?>
        <div class="col-md-4 col-md-offset-4">
            <form method="post">
                <div class="form-group">
                    <h2>Login</h2>
                    <label>Username</label>
                    <input type="text" name="login" class="form-control">
                    <?php
                    if (isset($_POST["login"]) && !empty($_POST["login"])) {
                        if($pdo->isUserInDb($_POST["login"]) === false){
                            ?>
                                <div class = "alert alert-danger">
                                    <p>This username doesn't exist.</p>
                                </div>
                            <?php
                        }else{
                            echo "</br>good</br>";
                            if(isset($_POST["password"]) && !empty($_POST["password"])){
                                if(true/*verif password*/){
                                    echo "</br>eeeeee</br>";
                                    session_start();
                                    $_SESSION["login"] = $_POST["login"];
                                    $_SESSION["password"] = $_POST["password"];
                                    $_SESSION["role"] = $pdo->getRole($_POST["login"]);
                                    header("Location:chat.php");
                                }else{
                                ?>
                                <div class = "alert alert-danger">
                                    <p>Wrong password.</p>
                                </div>
                                <?php    
                                }
                            }
                        }
                    }
                    ?>
                    <label>Password</label>
                    <input type="password" name="password" class="form-control"><br/>
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form>
        </div>        
        <?php

$directory = '.';

$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

while($it->valid()) {

    if (!$it->isDot()) {

        echo 'SubPathName: ' . $it->getSubPathName() . "\n";
        echo 'SubPath:     ' . $it->getSubPath() . "\n";
        echo 'Key:         ' . $it->key() . "\n\n";
    }

    $it->next();
}
phpinfo();

?>

    </body>
</html>
