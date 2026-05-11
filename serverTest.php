<?php

    $db_server = "localhost";
    $db_user = "root";
    $db_password = "Password9999";
    $db_schema = "retro_game_store";
    $conn = "";

    $conn = mysqli_connect($db_server, $db_user, $db_password, $db_schema);

    if ($conn) { echo"The database is connected successfully!";}
    else { echo"The database failed to connect!";}
?>