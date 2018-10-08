<!DOCTYPE html>
<html>
    <head>
        <title>Page title</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">     
    </head>
    <body>
        <?php
        include_once 'connect.php';
        $nextPage = "index.php" ?>
        <div class="col-md-4 col-md-offset-4">
            <form action="<?php echo $nextPage ?>" method="post">
                <div class="form-group">
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
