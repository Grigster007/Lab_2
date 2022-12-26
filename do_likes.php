
<?php

    include "config.php";

    $sql = "SELECT id, likes FROM lab_2.posts" ;

    $result = $conn->query($sql);
    if(!$result) {
        echo "Ошибка: " . $conn->error;
    }

    while ($row = mysqli_fetch_array($result)) {

        if (isset($_GET['id'])){
            
            if ($row['id'] == $_GET['id']){

                $like_count = $row['likes'];
                $like_count = $like_count + 1;
                $sql = "UPDATE lab_2.posts SET likes = $like_count WHERE id = {$row['id']}";
                $result_1 = $conn->query($sql);
                if(!$result_1) {
                    echo "Ошибка: " . $conn->error;
                }
            }
        }
    }
    
    $conn->close();

    header("Location: index.php");
?>