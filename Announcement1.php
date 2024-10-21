<?php

require_once 'common.php';

$dao = new AnnouncementDAO();
$posts = $dao->getAll(); // Get an Indexed Array of Post objects
?>

<!DOCTYPE html>
<html lang="en">

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
    #announcementBtn{
        background-color: white;
        width: 200px;
        height: 50px;
        position: absolute; 
        top: 80px;
        right: 20px;
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    h2{
        text-align:center;
    }

    </style>

</head>

<body class="whole">
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
   
    <div class="container-fluid">
            <a class="btn" id="announcementBtn" href="make-annoucement.html" role="button"> Make an annoucement </a> 
            <div class="row"></div>
            <div class="row">
                <h1 style="margin-top:80px;text-align: center; background-color: #8F8073; padding: 40px;">All Annoucements</h1>
            </div>

           
    <?php
        if( count($posts) > 0 ) {

            echo "
                <table class='table table-striped'>
                    <tr>
                        <th>ID</th>
                        <th>Create Timestamp</th>
                        <th>Last Update Timestamp</th>
                        <th>Subject</th>
                        <th>Author</th>
                        <th>Message</th>
                    </tr>
            ";

            foreach($posts as $post_object ) {
                echo "
                    <tr>
                        <td>
                            {$post_object->getID()}
                        </td>
                        <td>
                            {$post_object->getCreateTimestamp()}
                        </td>
                        <td>
                            {$post_object->getUpdateTimestamp()}
                        </td>
                        <td>
                            {$post_object->getTitle()}
                        </td>
                        <td>
                            {$post_object->getAuthor()}
                        </td>
                        <td>
                            {$post_object->getMessage()}
                        </td>
                    </tr>
                ";
            }

            echo "
                </table>
            ";
        }
    ?>

    </div> 

</body>

</html>