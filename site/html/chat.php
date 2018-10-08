<!DOCTYPE html>
<html>
    <head>
        <title>Page title</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    </head>
    <body>

<?php
include_once("navbar.php");
session_start();
if(isset($_SESSION["login"]) && isset($_SESSION["password"])){
    ?>
    <h1>Bonjour <?php echo $_SESSION["login"]; ?> !</h1>
        <table class ="table">
            <thead>
                <tr>
                    <td>Date</td>
                    <td>Sender</td>
                    <td>Subject</td>
                    <td><form action ="newmail.php" method ="post"><button type="submit" name="sendTo" value="nyahon@coucou.com">send</button></form></td>
                </tr>
            </thead>
            <tr>
                <td>
            </tr>
        </table>
    <?php
    //session_unset();
    //session_destroy();
}else{
    echo "lol";
} ?>
</body>
</html>