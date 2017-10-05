<?php
    include_once './connessioneDB.php';
    class LeggiPermessi{
        public function leggi($id){
            $db = new Database();
            $conn = $db->getConnection();
            $list = array();
            $sql = "SELECT * FROM permessi WHERE user_id=".$id;
            $result = $conn->query($sql);
            if($result->num_rows <= 0)
                return false;
            else {
                while($obj = $result->fetch_object()){
                    array_push($list, $obj);
                }
                return $list;
            
            }
        }
        public function controllaPermesso($permessi, $permesso){
            for($i = 0; $i < count($permessi); $i++){
                if($permessi[$i]->permesso == $permesso){
                    return true;
                }
            }
            return false;
        }
    }
?>