
<?php

    include "config.php";
    include "handler.php";

    $sql = "SELECT * FROM lab_2.posts ORDER BY id DESC" ;

    $result = $conn->query($sql);
    if(!$result) {
        echo "Ошибка: " . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
?>
