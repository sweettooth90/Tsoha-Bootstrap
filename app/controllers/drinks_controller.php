<?php

class DrinkController extends BaseController{
    
    public static function index(){
        
        //haetaan kaikki drinkit tietokannasta
        $drinks = Drinkki::all();
        
        // Renderöidään views/suunnitelmat kansiossa sijaitseva tiedosto index.html muuttujan $drinks datalla
        View::make('drinks/index.html', array('drinks' => $drinks));
    }
    
     public static function store(){
    // POST-pyynnön muuttujat sijaitsevat $_POST nimisessä assosiaatiolistassa
    $params = $_POST;
    // Alustetaan uusi Drinkki-luokan olion käyttäjän syöttämillä arvoilla
    $drinks[] = new Drinkki(array(
        'nimi' => $params['nimi'],
        'tyyppi' => $params['tyyppi'],
        'ainesosat' => $params['ainesosat'],
        'kuvaus' => $params['kuvaus']
     ));
    

    // Kutsutaan alustamamme olion save metodia, joka tallentaa olion tietokantaan
    $drinks->save();

    // Ohjataan käyttäjä lisäyksen jälkeen pelin esittelysivulle
    Redirect::to('/drinks/' . $drinks->id, array('message' => 'Drinkki lisätty onnistuneesti!'));
  }
}
