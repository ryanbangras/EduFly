<?php
require_once 'common.php';

class AnnouncementDAO{
    public function getAll(){
        $connMgr = new ConnectionManager();
        $conn = $connMgr -> getConnection();

        $sql = "select * from announcement";
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $announcements = []; 
        while( $row = $stmt->fetch() ) {
            $announcements[] =
                new Announcement(
                    $row['id'],
                    $row['create_timestamp'],
                    $row['title'],
                    $row['author'],
                    $row['message']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $announcements;
    }

    public function get($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "SELECT
                    *
                FROM announcement
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
                new Announcement(
                    $row['id'],
                    $row['create_timestamp'],
                    $row['title'],
                    $row['author'],
                    $row['message']);
        }

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $post_object;
    }

    public function delete($id) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "DELETE FROM
                    announcement
                WHERE 
                    id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        //STEP 3
        $status = $stmt->execute();
        
        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }


    public function add($title, $author, $message) {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "INSERT INTO announcement
                    (
                        create_timestamp,
                        title,
                        author, 
                        message
                    )
                VALUES
                    (
                        CURRENT_TIMESTAMP,
                        :title,
                        :author,
                        :message
                    )";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);

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