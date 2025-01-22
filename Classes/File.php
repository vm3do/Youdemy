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
        $tmp_extension = explode(".", $this->filename);
        $extension = strtolower(end($tmp_extension));

        if ($this->size > 8000000) {
            return ["success" => false, "message" => "File size must be less than 8 MB"];
        }

        if ($extension != "mp4") {
            return ["success" => false, "message" => "File must be a video type mp4"];
        }

        if ($this->error !== UPLOAD_ERR_OK) {
            return ["success" => false, "message" => "Error uploading the file. Try again."];
        }

        $uploadDir = __DIR__ . "/videos/";
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