
<?php

class File {
    private $filename;
    private $tmpPath;
    private $size;
    private $error;

    public function __construct($filename, $tmpPath, $size, $error) {
        $this->filename = $filename;
        $this->tmpPath = $tmpPath;
        $this->size = $size;
        $this->error = $error;
    }

    public function manageFile() {
        // Get file extension
        $tmp_extension = explode(".", $this->filename);
        $extension = strtolower(end($tmp_extension));

        // Validate file size
        if ($this->size > 8000000) { // 8MB limit
            return ["success" => false, "message" => "File size must be less than 8 MB"];
        }

        // Validate file type
        $allowedExtensions = ["mp4"]; // Add more extensions if needed
        if (!in_array($extension, $allowedExtensions)) {
            return ["success" => false, "message" => "File must be a video type (mp4)"];
        }

        // Check for upload errors
        if ($this->error !== UPLOAD_ERR_OK) {
            return ["success" => false, "message" => "Error uploading the file. Try again."];
        }

        // Create the videos directory if it doesn't exist
        $uploadDir = __DIR__ . "/videos/"; // Use absolute path
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create directory with full permissions
        }

        // Generate a unique file name
        $filename = uniqid("video_", true) . "." . $extension;
        $fileDest = $uploadDir . $filename;

        // Move the uploaded file to the destination
        if (move_uploaded_file($this->tmpPath, $fileDest)) {
            return ["success" => true, "filepath" => $fileDest];
        } else {
            return ["success" => false, "message" => "Error moving the file."];
        }
    }
}

/*   class File {


        private $filename;
        private $tmpPath;
        private $size;
        private $error;

        public function __construct($filename, $tmpPath, $size, $error){
            $this->filename = $filename;
            $this->tmpPath = $tmpPath;
            $this->size = $size;
            $this->error = $error;
        }

        public function manageFile(){
            $tmp_extension = explode(".", $this->filename);
            $extension = strtolower(end($tmp_extension));

            if($this->size > 8000000){
                return ["success" => false,"message" =>  "file size must be less than 8 mb"];
            } elseif ($extension == "mp4"){

                if($this->error === 0){

                    $filename = uniqid("video_", true) . "." . $extension;
                    $fileDest = "videos/".$filename;

                    if(move_uploaded_file($this->tmpPath, $fileDest)){
                        return ["success" => true,"filepath" => $fileDest ];
                    } else {
                        return ["success" => false,"message" => "Error Moving the file"];
                    }


                } else {
                    return ["success" => false,"message" =>  "Error , try again.."];
                }
                
            } else {

                return ["success" => false,"message" =>  "file must be a video type mp4"];
            }
        }
    } */