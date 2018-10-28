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
    $mailInfo = $pdo->getMailById($_POST['mailId']);

    ?>
    
        <div class="col-md-8 col-md-offset-2">
            
                <div class="form-group">
                <?php
                    foreach($mailInfo as $info):?>
                    <form method="post" class="btn btn-danger pull-right">Delete</button></form>
                    <form method="post" action="newmail.php?send=<?=$info["sender"]?>"><button type="submit" name="subject" value="<?=$info["subject"]?>" class="btn btn-default pull-right">Reply</button></form><br/>
                    <label>From</label>
                    <input type="textfield" class="form-control" value="<?= $info["sender"]?>" disabled>
                    <label>Subject</label>
                    <input type="textfield" class="form-control" value="<?= $info["subject"]?>" disabled>
                    <label>Message</label>
                    <input type="textfield" class="form-control" value="<?= $info["corpus"]?>" disabled>
                    <?php endforeach; ?>
                </div>
            
        </div>


    <?php
    //session_unset();
    //session_destroy();
}else{
    echo "lol";
} ?>
</body>
</html>