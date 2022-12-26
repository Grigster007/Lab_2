
<?php

    $conn = new mysqli("127.0.0.1", "root", "root", "lab_2",3306);

    if($conn->connect_error) {
        echo "Ошибка: ".$conn->connect_error;
    }
?>