
<!--PHP-->

<?php
    include "config.php";
    include "handler.php";
    include "forum.html";

    if (isset($_GET['entry'])){

        $text = $conn->real_escape_string($_GET['entry']);
        $sql = "INSERT INTO lab_2.posts (text, timestamp) values ('$text', NOW())"; //time stamp ... 
        
        $result = $conn->query($sql);
        if(!$result) {
            echo "Ошибка: " . $conn->error;
        }
    }

    $sql = "SELECT id, text, likes, dislikes, timestamp FROM lab_2.posts ORDER BY id DESC" ;

    $result = $conn->query($sql);

    while ($row = mysqli_fetch_array($result)) {

        echo "
        <form method='GET'>
            <table>
                <tr><td>{$row['id']}: {$row['text']}</td></tr> 
                <tr><td>{$row['timestamp']}</td></tr> 
                <tr><td><button type='submit'  class='btn btn-primary' name='id' value='{$row['id']}' formaction='do_likes.php'> Лайк </button> {$row['likes']}</td>
                <td><button type='submit'  class='btn btn-primary' name='id' value='{$row['id']}' formaction='do_dislikes.php'> Дизлайк </button> {$row['dislikes']}</td></tr>
            </table>
        </form>";
        
       
    }
    $conn->close();
    
    
?>
