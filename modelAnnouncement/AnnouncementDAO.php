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
}

?>