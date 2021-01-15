<?php
    session_start();
    unset($_SESSION['validado']);
    header("Location:./index.php");
?>
