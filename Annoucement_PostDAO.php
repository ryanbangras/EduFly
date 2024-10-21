<?php

require_once 'common.php';

class PostDAO {

    public function getAll() {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    id,
                    create_timestamp,
                    update_timestamp,
                    title,
                    author,
                    entry
                FROM post"; // SELECT * FROM post; // This will also work
        $stmt = $conn->prepare($sql);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $posts = []; // Indexed Array of Post objects
        while( $row = $stmt->fetch() ) {
            $posts[] =
                new Post(
                    $row['id'],
                    $row['create_timestamp'],
                    $row['update_timestamp'],
                    $row['title'],
                    $row['author'],
                    $row['entry']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $posts;
    }

    public function get($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "SELECT
                    *
                FROM post
                WHERE 
                    id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $post_object = null;
        if( $row = $stmt->fetch() ) {
            $post_object = 
                new Post(
                    $row['id'],
                    $row['create_timestamp'],
                    $row['update_timestamp'],
                    $row['title'],
                    $row['author'],
                    $row['entry']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $post_object;
    }

    public function add($title, $author, $entry) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();

        // STEP 2
        $sql = "INSERT INTO post
                    (
                        create_timestamp, 
                        update_timestamp, 
                        title, 
                        author, 
                        entry
                    )
                VALUES
                    (
                        CURRENT_TIMESTAMP,
                        CURRENT_TIMESTAMP,
                        :title,
                        :author,
                        :entry
                    )";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $subject, PDO::PARAM_STR);
        $stmt->bindParam(':author', $entry, PDO::PARAM_STR);
        $stmt->bindParam(':entry', $mood, PDO::PARAM_STR);

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }
}

?>