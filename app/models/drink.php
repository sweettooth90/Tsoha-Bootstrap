<?php

class Drinkki extends BaseModel {
    
    // attribuutit
    public $id, $käyttäjä_id, $nimi, $tyyppi, $ainesosat, $kuvaus;
    
    //konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_nimi', 'validate_tyyppi', 'validate_ainesosat');
    }

    
    public static function find($id) {
        
        $query = DB::connection()->prepare('SELECT * FROM Drinkki WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        
        if($row) {
            $drinks = new Drinkki(array(
                'id' => $row['id'],
                'käyttäjä_id' => $row['käyttäjä_id'],
                'nimi' => $row['nimi'],
                'tyyppi' => $row['tyyppi'],
                'ainesosat' => $row['ainesosat'],
                'kuvaus' => $row['kuvaus']
            ));
            
            return $drinks;
        }
        
        return null;
        
    }
    
    
    public function save(){
      $query = DB::connection()->prepare('INSERT INTO Drinkki (nimi, tyyppi, ainesosat, kuvaus) VALUES (:nimi, :tyyppi, :ainesosat, :kuvaus) RETURNING id');
      $query->execute(array(
          'nimi' => $this->nimi,
          'tyyppi' => $this->tyyppi,
          'ainesosat' => $this->ainesosat,
          'kuvaus' => $this->kuvaus
      ));
      $row = $query->fetch();
      $this->id = $row['id'];
  }
  
    
    public static function update() {
      $query = DB::connection()->prepare('UPDATE Drinkki SET (
           nimi, tyyppi, ainesosat, kuvaus) =
           (:nimi, :tyyppi, :ainesosat, :kuvaus) WHERE id = :id');
      $query->execute(array('id'=> $id,
           'nimi' => $row['nimi'],
           'tyyppi' => $row['tyyppi'],
           'ainesosat' => $row['ainesosat'],
           'kuvaus' => $row['kuvaus']
      ));
      $row = $query->fetch();
  }
  
    public static function destroy($id) {
      $query = DB::connection()->prepare(
              'DELETE FROM Drinkki
	       WHERE Drinkki.id = :id');
      $query->execute(array('id'=>$id));
  }
  
  
    public static function allDrinks($id){
	$query = DB::connection()->prepare('SELECT * FROM Drinkki WHERE id = :id ORDER BY Drinkki.id ASC');
	$query->execute(array('id'=>$id));
	$rows = $query->fetchAll();
	$drinks = array();
	foreach ($rows as $row) {
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
        
    public static function getAttributes($id){
	$query = DB::connection()->prepare(
                "SELECT Drinkki.nimi AS nimi, Drinkki.tyyppi AS tyyppi,
                Drinkki.ainesosat AS ainesosat, Drinkki.kuvaus AS KUVAUS
		FROM Drinkki"
                );
	$query->execute(array('id'=>$id));
	$rows = $query->fetchAll();
	$getattributes = array();
	foreach ($rows as $row) {
	$getattributes[] = new Drinkki(array(
                'nimi' => $row['nimi'],
                'tyyppi' => $row['tyyppi'],
                'ainesosat' => $row['ainesosat'],
                'kuvaus' => $row['kuvaus']
		));
	}
	return $getattributes;
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

}