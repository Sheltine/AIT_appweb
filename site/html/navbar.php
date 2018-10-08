<?php 
session_start();
$isAdmin = ($_SESSION["role"] === "1" ? true : false);

?>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#">My mail box</a>
            </div>
                <ul class="nav navbar-nav">
                <li class="active"><a href="chat.php">Mail box</a></li>
                <li><a href="newmail.php">New mail</a></li>
                <li><a href="#">Profile</a></li>
                <?php
                if($isAdmin){
                    ?>
                    <li><a href="manageUsers.php">Admin</a></li>
                    <?php
                }
                ?>
                <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
    </nav>