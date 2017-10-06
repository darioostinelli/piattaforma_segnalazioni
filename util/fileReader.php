<?php
class FileReader{
    private $file;
    private $path;
    public function __construct($path){
        $myfile = fopen($path, "r");
        if(!$myfile){
            echo "File non trovato";
        }
        $this->file = $myfile;
        $this->path = $path;
    }
    
    public function leggi(){
        $stream = fread($this->file, filesize($this->path));
        return $stream;
    }
}
?>