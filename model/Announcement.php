<?php

class Announcement {
    private $id;
    private $create_timestamp;
    private $update_timestamp;
    private $title;
    private $author;
    private $message;

    public function __construct($id, $create_timestamp, $update_timestamp, $title, $author, $message) {
        $this->id = $id;
        $this->create_timestamp = $create_timestamp;
        $this->update_timestamp = $update_timestamp;
        $this->title = $title;
        $this->author = $author;
        $this->message = $message;
    }

    public function getID() {
        return $this->id;
    }

    public function getCreateTimestamp() {
        return $this->create_timestamp;
    }

    public function getUpdateTimestamp() {
        return $this->update_timestamp;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getMessage() {
        return $this->message;
    }

}

?>

?>