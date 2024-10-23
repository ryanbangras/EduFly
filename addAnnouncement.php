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
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edustyle.css">
    <link rel="stylesheet" href="edustyle-navbar.css">
    <!-- Bootstrap JS bundle to be placed before the closing </body> tag -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Vue 3 -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <title>EduFly Portal</title>

    <style>    
    .status-update{
        text-align: center;
    }

    </style>

</head>
<body class='whole'>
<nav class="navbar">
        <div class="navbar-left">
            <a href="#" class="icon-left">Edufly Icon</a> 
        </div>
        <div class="navbar-right">
            <span class="icon-right"><img id="profile" src="img/profile.png">
                <span class="dropdown">{{Name}}
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> </button>
                <ul class="dropdown-menu">
                    <li><button class="dropdown-item" type="button">Profile</button></li>
                    <li><button class="dropdown-item" type="button">Logout</button></li>
                </ul>
                </span>
            </span>
        </div>
    </nav>
   <div class='status-update'>
    <?php
        if( $status ) {
            echo "<h1>Insertion was successful</h1>";
            echo "Click <a href='Announcement1.php'>here</a> to return to Main Page";
        }
        else {
            echo "<h1>Insertion was NOT successful</h1>";
        }
    ?>
   </div>
</body>
</html>