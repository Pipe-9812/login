<?php
    session_start();

    $_SESSION = array();

    session_destroy();

    header('Location:layout_sign_in.php');
?>