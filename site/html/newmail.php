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

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if(isset($_GET["send"])){
        $sender = ($_GET["send"]);
    }else{
        $sender = "";
    }

    if(isset($_POST["subject"])){
        $subj = "RE: ";
        $subj .= $_POST["subject"];
    }else{
        $subj = "";
    }
    ?>
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>New mail</h1>
            <form  method="post">
                <div class="form-group">
                    <label>To</label>
                    <input type="textfield" name="mailReceiver" class="form-control" value= "<?= $sender ?>">
                    <label>Subject</label>
                    <input type="textfield" name="mailSubject" class="form-control" value="<?= $subj ?>">
                    <label>Body</label>
                    <textarea class="rows=10 form-control" name="mailCorpus"></textarea>
                    <button type="submit" name="sendMail" class="btn btn-default pull-right">Send</button>
                </div>
            </form>
        </div>
</div>
    <?php

    if(isset($_POST["sendMail"])){
        if($pdo->isUserInDb($_POST["mailReceiver"])){
                    $pdo->addMail(date("d-m-Y"), $_SESSION["login"], $_POST["mailReceiver"], $_POST["mailSubject"], $_POST["mailCorpus"]); ?>
                    <div class="row">
                        <div class = "alert alert-success col-md-8 col-md-offset-2">
                            <p>Successfully sent mail.</p>
                        </div>
                    </div>
        <?php
            header("Refresh: 1; url=chat.php");

        }else{
            ?>
            <div class="row">
                <div class = "alert alert-danger col-md-8 col-md-offset-2">
                    <p>This user doesn't exist.</p>
                </div>
            </div> <?php
        }
    }

    //session_unset();
    //session_destroy();
} ?>
</body>
</html>