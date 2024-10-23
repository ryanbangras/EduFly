<?php

require_once 'common.php';

$id = '';
$dao = new AnnouncementDAO();

if( isset($_GET['id']) ) {
    $id = $_GET['id'];
    $announcement_object = $dao->get($id); // Get a Post object
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
        .delete_table{
            display:flex;
            align-items: center;
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

    <div class='delete_table'>
    <form action='deleteAnnouncement.php' method='POST'>

    <?php

        if( !isset($_POST['confirm']) ) {

            echo "
                <input type='hidden' name='id' value='{$announcement_object->getID()}'>
            ";

            echo "
                <table border='1'>

                    <tr>
                        <td>Title</td>
                        <td>{$announcement_object->getTitle()}</td>
                    </tr>

                    <tr>
                        <td>Author</td>
                        <td>{$announcement_object->getAuthor()}</td>
                    </tr>

                    <tr>
                        <td>Message</td>
                        <td>{$announcement_object->getMessage()}</td>
                    </tr>

                    <tr>
                        <td>Create Timestamp</td>
                        <td>{$announcement_object->getCreateTimestamp()}</td>
                    </tr>


                </table>
            ";

            echo "
                <br>
                <input type='submit' name='confirm' value='Confirm Delete'>
            ";
        }
        // Case 2 - came to delete.php from delete.php (user clicked on SUBMIT button)
        // This time, we want to go ahead with deleting this Post in post table
        else {
            $id = $_POST['id'];
            $status = $dao->delete($id); // Get delete status TRUE/FALSE

            // Success
            if( $status ) {
                echo "<h3>Delete was successful</h3>";
            }
            // Fail
            else {
                echo "<h3>Delete was NOT successful</h3>";
            }
        }
    ?>

    </form>
    </div>

    Click <a href='Announcement1.php'>here</a> to return to Main Page
</body>
</html>