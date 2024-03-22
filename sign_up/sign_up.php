<?php
    include_once('../connection.php');

    $newUser = $_POST['new_user'];
    $newPassword = $_POST['new_password'];
    $verifyPassword = $_POST['verify_password'];

    if(empty($newUser) || empty($newPassword) || empty($verifyPassword)) {
        header('Location:layout_sign_up.php?alert=3&new_user=' . urlencode($newUser) . '&new_password=' . urlencode($newPassword) . '&verify_password=' . urlencode($verifyPassword));
        exit();
    }

    $sql_select_users = 'SELECT * FROM t_users WHERE user_name = ?';
    $statement_select_users = $pdo->prepare($sql_select_users);
    $statement_select_users->execute(array($newUser));

    $match_users = $statement_select_users->fetch();

    if($match_users) {
        // echo 'Este usuario ya existe';
        header('Location:layout_sign_up.php?alert=1&new_user=' . urlencode($newUser) . '&new_password=' . urlencode($newPassword) . '&verify_password=' . urlencode($verifyPassword));
        die();
    }

    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    
    if(password_verify($verifyPassword, $newPasswordHash)) {

        $sql_add_user = 'INSERT INTO t_users (user_name, password) VALUES (?,?)';
        $statement_add_user = $pdo->prepare($sql_add_user);

        if( $statement_add_user->execute(array($newUser, $newPasswordHash)) ) {
            header('Location:../sign_in/layout_sign_in.php');
        }

    } else {
        // header('Location:layout_sign_up.php?alert=2');
        header('Location:layout_sign_up.php?alert=2&new_user=' . urlencode($newUser) . '&new_password=' . urlencode($newPassword) . '&verify_password=' . urlencode($verifyPassword));
    }

?>