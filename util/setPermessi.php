<?php
    include_once '../../util/getPermessi.php';
    class ScriviPermessi{
        private $segnalazioni = array('scrivi' => 'scrivi_segnalazioni', 'leggi' => 'leggi_segnalazioni');
        public function segnalazioni($mode){
            return $this->segnalazioni[$mode];
        }
    }
?>