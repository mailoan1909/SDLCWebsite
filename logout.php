<?php
    session_start();
    unset($_SESSION['Username']);
    unset($_SESSION['Role']);
    header("Location:index.php#login");
?>