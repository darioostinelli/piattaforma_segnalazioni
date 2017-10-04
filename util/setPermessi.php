<?php
class Permessi{
    private $segnalazioni = array('scrivi' => 'scrivi_segnalazioni', 'leggi' => 'leggi_segnalazioni');
    
    public function segnalazioni($mode){
        return $this->segnalazioni[$mode];
    }
}
?>