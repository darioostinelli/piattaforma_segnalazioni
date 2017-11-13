<?php
class FileWriter{
    private $path;
    public function __construct($path){
        $myfile = fopen($path, "w");
        if(!$myfile){
            echo "File non trovato";
        }
        $this->path = $path;
        fclose($myfile);
    }
    
    public function scrivi($content){
        $myfile = fopen($path, "w");
        fread($myfile, $content);
        fclose($myfile);
    }
}
?>