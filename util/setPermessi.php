<?php
    include_once '../../util/getPermessi.php';
    class ScriviPermessi{
        private $segnalazioni = array('scrivi' => 'scrivi_segnalazioni', 'leggi' => 'leggi_segnalazioni');
        private $news = array('scrivi' => 'scrivi_news', 'leggi' => 'leggi_news');
        public function segnalazioni($mode){
            return $this->segnalazioni[$mode];
        }
        public function news($mode){
            return $this->news[$mode];
        }
    }
?>