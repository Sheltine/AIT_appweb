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
        <h1>New mail</h1>
        <form>
            <div class="form-group">
                <label>To</label>
                <input type="email" class="form-control" value= "<?php echo $_POST["sendTo"] ?>">
                <label>Subject</label>
                <input type="textfield" class="form-control">
                <label>Body</label>
                <input type="textarea" class="form-control">
            </div>
        </form>
    <?php
    //session_unset();
    //session_destroy();
}else{
    echo "lol";
} ?>
</body>
</html>