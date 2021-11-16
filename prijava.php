<?php
class Prijava {
    public $id;
    public $kurs;
    public $profesor;
    public $cena;

    public function __construct($id=null, $kurs=null, $profesor=null, $cena=null) {
        $this->id=$id;
        $this->kurs=$kurs;
        $this->profesor=$profesor;
        $this->cena=$cena;
    }
    
    public static function getAll(mysqli $conn) {
        $query="SELECT * FROM prijave";
        return $conn->query($query);
    }
}













?>