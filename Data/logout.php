<?php
    session_start();
    if(isset($_SESSION['login_user']) && !empty($_SESSION['login_user']))
    {
        $_SESSION['login_user'] = "";
        $_SESSION['admin'] = "";
    }
    header("location: index.php");

?>