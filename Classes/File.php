<?php

    class File {


        private $filename;
        private $tmpPath;
        private $size;
        private $error;

        public function __contruct($filename, $tmpPath, $size, $error){
            $this->filename = $filename;
            $this->tmpPath = $tmpPath;
            $this->size = $size;
            $this->error = $error;
        }

        public function manageFile(){
            $tmp_extension = explode(".", $this->filename);
            $extension = strtolower(end($tmp_extension));

            if($this->size > 8000000){
                return ["succes" => false, "file size must be less than 8 mb"];
            } elseif ($extension == "mp4"){

                if($this->error === 0){

                    $filename = uniqid("video_", true) . "." . $extension;
                    $fileDest = "videos/".$filename;

                    if(move_uploaded_file($this->tmpPath, $fileDest)){
                        return true;
                    } else {
                        return ["succes" => false, "Error Moving the file"];
                    }


                } else {
                    return ["succes" => false, "Error , try again.."];
                }
                
            } else {

                return ["succes" => false, "file must be a video type mp4"];
            }
        }
    }