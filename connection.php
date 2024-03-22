<?php

// CONEXIÓN CON PDO
$link = 'mysql:host=localhost;dbname=db_learning';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($link, $user, $password);
    // echo '<br> <span style="font-weight: bold;">CONNECTION SUCCESS</span> <br>';

    // foreach($pdo->query('SELECT * FROM `t_colors`') as $fila) {
    //     print_r($fila);
    // }
}catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}