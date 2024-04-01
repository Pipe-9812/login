<?php

    include_once('../connection.php');

    $token = $_POST['token'];
    $token_hash = hash( "sha256", $token );

    $sql = "SELECT * FROM t_users WHERE reset_token_hash = ?";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $token_hash, PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    

    if ( $result === false ) {
        die("token not found");
    }

    if (strtotime($result["reset_token_expires_at"]) <= time()) {
        die("token has expired");
    }

    // _____________________________

    $newPassword = $_POST['new_password'];
    $verifyPassword = $_POST['verify_password'];

    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = 'UPDATE t_users SET password = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE id = ?';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $newPasswordHash, PDO::PARAM_STR);
    $statement->bindParam(2, $result['id'], PDO::PARAM_INT);
    $statement->execute();


    echo "Password updated. You can now login.";

?>