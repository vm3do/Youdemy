<?php

class File
{
    private $filename;
    private $tmpPath;
    private $size;
    private $error;

    public function __construct($filename, $tmpPath, $size, $error)
    {
        $this->filename = $filename;
        $this->tmpPath = $tmpPath;
        $this->size = $size;
        $this->error = $error;
    }

    public function manageFile()
    {
        if(empty($this->filename)){
            return ["success" => false, "message" => "File cannot be empty"];
        }

        $tmp_extension = explode(".", $this->filename);
        $extension = strtolower(end($tmp_extension));

        if ($this->size > 8000000) {
            return ["success" => false, "message" => "File size must be less than 8 MB"];
        }

        $allowed = ["mp4", "gif", "jpeg", "jpg", "png", "webp"];

        if (!in_array($extension, $allowed)) {
            return ["success" => false, "message" => "File must be a video or image type only"];
        }

        if ($this->error !== UPLOAD_ERR_OK) {
            return ["success" => false, "message" => "Error uploading the file. Try again."];
        }

        $imgextension = ["jpg", "jpeg", "gif", "png", "webp"];

        $uploadDir = in_array($extension, $imgextension) ? "../covers/" : "../videos/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filename = uniqid("video_", true) . "." . $extension;
        $fileDest = $uploadDir . $filename;

        if (move_uploaded_file($this->tmpPath, $fileDest)) {
            return ["success" => true, "filepath" => $fileDest];
        } else {
            return ["success" => false, "message" => "Error moving the file."];
        }
    }
}