<?php
include_once './util/getPermessi.php';
include_once './util/setPermessi.php';
class AdminPage{
    private $permessi;
    private $permisionReader;
    private $permisionWriter;
    public function __construct($permessi){
        $this->permessi = $permessi;
        $this->permissionReader = new LeggiPermessi();
        $this->permissionWriter = new ScriviPermessi();
    }
    public function generaMenu(){
        if($permissionReader->controllaPermesso($permessi, $permissionWriter->segnalazioni('scrivi'))){
            generaMenuItem("Segnalazioni");
        }
    }
    private function generaMenuItem($nome){
        echo '<div class="menuItem">'.$nome.'</div>';
    }
}
?>