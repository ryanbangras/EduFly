<?php

require_once 'common.php';

$dao = new AnnouncementDAO();
$announcements = $dao->getAll(); // Get an Indexed Array of Post objects


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
            <a class="btn" id="announcementBtn" href="Announcement2.html" role="button"> Make an annoucement </a> 
            <div class="row"></div>
            <div class="row">
                <h1 style="margin-top:80px;text-align: center; background-color: #8F8073; padding: 40px;">All Annoucements</h1>
            </div>

            <?php
        if( count($announcements) > 0 ) {

            echo "<div>";
            echo "<table class='table table-striped'>";
            foreach($announcements as $announcement_object) {
                echo "<tr>
                    <td>
                    <h3>{$announcement_object->getTitle()} 
                    <span class='dropend'> 
                    <button class='btn btn-secondary' type='button' data-bs-toggle='dropdown' aria-expanded='false'> </button>
                    <ul class='dropdown-menu'>
                        <li><a href='deleteAnnouncement.php?id={$announcement_object->getID()}'><button class='dropdown-item' type='button'>Delete Announcement</button></a>
                    </ul>
                    </span>
                    </h3>
                    Created by {$announcement_object->getAuthor()} on {$announcement_object->getCreateTimestamp()}

                    <br>
                    <br>

                    {$announcement_object->getMessage()}
                
                    </td>
                
                </tr>";
            }
            echo "</table>";
            echo "</div>";
        }
    ?>
           
    
    </div> 

</body>

</html>