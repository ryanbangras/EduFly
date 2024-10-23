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