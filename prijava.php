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

    public static function getbyid($id, mysqli $conn) {
        $query="SELECT * FROM prijave WHERE id=$id";
        $myArray=array();
        $rezultat=$conn->query($query);
        if($rezultat) {
            while($row=$rezultat->fetch_array()) {
                $myArray[]=$row;
            }
        }
        return $myArray;
    }

    public function deletebyid(mysqli $conn) {
        $query="DELETE FROM prijave WHERE id=$this->id";
        return $conn->query($query);
    }

    public static function add(Prijava $prijava, mysqli $conn) {
        $query="INSERT INTO prijave (kurs, profesor, cena) VALUES ('$prijava->kurs','$prijava->profesor', $prijava->cena)";
        return $conn->query($query);
    }

    public function update(mysqli $conn) {
        $query="UPDATE prijave set kurs='$this->kurs, profesor='$this->profesor', cena=$this->cena";
        return $conn->query($query);
    }
}













?>