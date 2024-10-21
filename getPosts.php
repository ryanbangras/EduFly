<?php

require_once 'common.php';
$dao = new AnnouncementDAO();
$posts = $dao->getAll(); // Get an Indexed Array of Post objects

$items = [];
foreach( $posts as $post_object ) {
    $item = [];
    $item["id"] = $post_object->getID();
    $item["title"] = $post_object->getTitle();
    $item["author"] = $post_object->getAuthor();
    $item["message"] = $post_object->getMessage();
    $items[] = $item;
}
// make posts into json and return json data
$postJSON = json_encode($items);
echo $postJSON;
?>

