<?php

class Käyttäjä extends BaseModel {
    
    // attribuutit
    public $id, $username, $password;
    
    //konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
        
    public static function all() {
        
        //alustetaan kysely tietokantayhteydellä
        $query = DB::connection()->prepare('SELECT * FROM Käyttäjä');
        
        //suoritetaan kysely
        $query->execute();
        
        //haetaan kyselyn tuottamat rivit
        $rows = $query->fetchAll();
        $users = array();
        
        //käydään kyselyn tuottamat rivit läpi
        foreach($rows as $row) {
            
            //lisätään alkio taulukkoon
            $users[] = new Käyttäjä(array(
                'id' => $row['id'],
                'username' => $row['username'],
                'password' => $row['password'],
                    ));
        }
        
        return $users;
        
    }
    
    public static function find($id) {
        
        $query = DB::connection()->prepare('SELECT * FROM Käyttäjä WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        
        if($row) {
            $users[] = new Käyttäjä(array(
                'id' => $row['id'],
                'username' => $row['username'],
                'password' => $row['password'],
                    ));
            
            return $users;
        }
        
        return null;
        
    }
    
}

?>