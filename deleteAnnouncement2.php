<?php
require_once 'common.php';

$id = '';
$dao = new AnnouncementDAO();
$status = false;
if( isset($_GET['id']) ) {
    $id = $_GET['id'];
    $announcement_object = $dao->get($id); // Get a Post object

    if (isset($announcement_object)) { // Delete if the object exists
        $status = $dao->delete($id); // Get delete status TRUE/FALSE
    }
}

if ($status)
    $result["status"] = "Announcement deleted successfully";
else 
    $result["status"] = "Announcement was not deleted";

$postJSON = json_encode($result);
echo $postJSON;
?>
