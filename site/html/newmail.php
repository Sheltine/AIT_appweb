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
        
        <div class="col-md-8 col-md-offset-2">
            <h1>New mail</h1>
            <form>
                <div class="form-group">
                    <label>To</label>
                    <input type="email" class="form-control" value= "<?php echo $_POST["sendTo"] ?>">
                    <label>Subject</label>
                    <input type="textfield" class="form-control">
                    <label>Body</label>
                    <textarea class="rows=10 form-control"></textarea>
                    <button type="submit" class="btn btn-default pull-right">Submit</button>
                </div>
            </form>
        </div>
    <?php
    //session_unset();
    //session_destroy();
}else{
    echo "lol";
} ?>
</body>
</html>