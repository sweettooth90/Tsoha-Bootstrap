<?php

class Drinkki extends BaseModel {
    
    // attribuutit
    public $id, $käyttäjä_id, $nimi, $tyyppi, $ainesosat, $kuvaus;
    
    //konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
        
    public static function all() {
        
        //alustetaan kysely tietokantayhteydellä
        $query = DB::connection()->prepare('SELECT * FROM Drinkki');
        
        //suoritetaan kysely
        $query->execute();
        
        //haetaan kyselyn tuottamat rivit
        $rows = $query->fetchAll();
        $drinks = array();
        
        //käydään kyselyn tuottamat rivit läpi
        foreach($rows as $row) {
            
            //lisätään alkio taulukkoon
            $drinks[] = new Drinkki(array(
                'id' => $row['id'],
                'käyttäjä_id' => $row['käyttäjä_id'],
                'nimi' => $row['nimi'],
                'tyyppi' => $row['tyyppi'],
                'ainesosat' => $row['ainesosat'],
                'kuvaus' => $row['kuvaus']
                    ));
        }
        
        return $drinks;
        
    }
    
    public static function find($id) {
        
        $query = DB::connection()->prepare('SELECT * FROM Drinkki WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        
        if($row) {
            $drink = new Drinkki(array(
                'id' => $row['id'],
                'käyttäjä_id' => $row['käyttäjä_id'],
                'nimi' => $row['nimi'],
                'tyyppi' => $row['tyyppi'],
                'ainesosat' => $row['ainesosat'],
                'kuvaus' => $row['kuvaus']
            ));
            
            return $drink;
        }
        
        return null;
        
    }
    
    public function save(){
    $query = DB::connection()->prepare('INSERT INTO Drinkki (nimi, tyyppi, ainesosat, kuvaus) VALUES (:nimi, :tyyppi, :ainesosat, :kuvaus) RETURNING id');
    $query->execute(array('nimi' => $this->nimi, 'tyyppi' => $this->tyyppi, 'ainesosat' => $this->ainesosat, 'kuvaus' => $this->kuvaus));
    $row = $query->fetch();
    $this->id = $row['id'];
  }
    
}