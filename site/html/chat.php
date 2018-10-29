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
            include_once("navbar.php");
            include_once("connect.php");

            $role = ($isAdmin === true ? "admin" : "collaborateur");
       
            $mails = $pdo->getUserMail($_SESSION["login"]);
            
            ?>
            <div class="col-md-offset-2">
            <h1>Bonjour <?php echo $_SESSION["login"]; ?> ! Vous etes <?php echo $role ?>.</h1>
                <table class ="table">
                    <thead>
                        <tr>
                            <td>Date</td>
                            <td>Sender</td>
                            <td>Subject</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <?php
                    foreach($mails as $mail):?>
                    <tr>
                        <td><?= $mail["reception_time"] ?></td>
                        <td><a href="newmail.php?send=<?= $mail["sender"]?>"> <?= $mail["sender"] ?></a></td>
                        <td><?= $mail["subject"] ?></td>
                        <td><form action ="readMail.php" method ="post"><button class="btn btn-default" type="submit" name="mailId" value="<?= $mail["id"]?>">Read</button></form></td>
                        <td><form method="post" action="newmail.php?send=<?=$mail["sender"]?>"><button class="btn btn-default" type="submit" name="subject" value="<?=$mail["subject"]?>" class="btn btn-default pull-right">Reply</button></form></td>
                        <td><form method="post"><button class="btn btn-danger" type="submit" name="delete" value="<?= $mail["id"]?>">Delete</button></form></td>

                    </tr>
        <?php endforeach; ?>
                </table>
        </div>
            <?php

            if(isset($_POST["delete"])){
                $pdo->delMail($_POST["delete"]);
                ?>
               <div class="row">
                    <div class = "col-md-8 col-md-offset-2 alert alert-success">
                        <p>Successfully deleted mail.</p>
                    </div>
            </div>
                <?php
            header("Refresh: 1;");
            }
            //session_unset();
            //session_destroy();
        } ?>
    </body>
</html>