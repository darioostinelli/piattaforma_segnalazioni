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
        if($this->permissionReader->controllaPermesso($this->permessi, $this->permissionWriter->segnalazioni('scrivi'))){
            echo '<div class="menuItem">Segnalazioni</div>';
        }
        echo '<div class="menuItem login" onclick="logout();">Logout</div>';
    }
    
}
?>