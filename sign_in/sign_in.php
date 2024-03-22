<?php

    session_start();

    include_once('../connection.php');

    $userLogin = $_POST['user_login'];
    $passwordLogin = $_POST['password_login'];

    // echo '<pre>';
    // var_dump($userLogin);
    // var_dump($passwordLogin);
    // echo '</pre>';

    // if(strlen($userLogin) === 0 || strlen($passwordLogin) === 0) {
    //     header('Location:layout_sign_in.php?alert=2');
    //     exit();
    // }

    if(empty($userLogin) || empty($passwordLogin)) {
        // Uno de los campos está vacío, redirige y pasa los valores ingresados como parámetros
        header('Location: layout_sign_in.php?alert=2&user_login=' . urlencode($userLogin) . '&password_login=' . urlencode($passwordLogin));
        exit();
    }

    $sql = 'SELECT * FROM t_users WHERE user_name = ?';
    $statement = $pdo->prepare($sql);
    $statement->execute(array($userLogin));

    $result = $statement->fetch();

    
    if(!$result) {
        header('Location:layout_sign_in.php?alert=1');
        header('Location: layout_sign_in.php?alert=1&user_login=' . urlencode($userLogin) . '&password_login=' . urlencode($passwordLogin));
        exit();
    }
    
    if(password_verify($passwordLogin, $result['password'])) {        
        $_SESSION['admin'] = $userLogin;
        header('Location:../index.php');
        exit();

    } else {
        header('Location:layout_sign_in.php?alert=1');
        header('Location: layout_sign_in.php?alert=1&user_login=' . urlencode($userLogin) . '&password_login=' . urlencode($passwordLogin));
        exit();
    }