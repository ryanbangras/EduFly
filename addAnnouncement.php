<?php

require_once 'common.php';

$status = false;
//var_dump($_POST);

if( isset($_POST['title']) && isset($_POST['author']) && isset($_POST['message']) ) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $message = $_POST['message'];

    $dao = new AnnouncementDAO();
    $status = $dao->add($title, $author, $message);
}

?>
<html>
<body>
    <?php
        if( $status ) {
            echo "<h1>Insertion was successful</h1>";
            echo "Click <a href='Announcement1.php'>here</a> to return to Main Page";
        }
        else {
            echo "<h1>Insertion was NOT successful</h1>";
        }
    ?>
</body>
</html>