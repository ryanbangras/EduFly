<?php

require_once 'common.php';

class AnnouncementDAO {

    public function getAll() {
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    id,
                    create_timestamp,
                    update_timestamp,
                    title,
                    author,
                    message
                FROM post"; // SELECT * FROM post; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $posts = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $posts[] =
                new Announcement(
                    $row['id'],
                    $row['create_timestamp'],
                    $row['update_timestamp'],
                    $row['title'],
                    $row['author'],
                    $row['message']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $posts;
    }

}

?>