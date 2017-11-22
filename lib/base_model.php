<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      foreach($this->validators as $validator){
        $errors = array_merge($errors, $this->$validator());
      }
      return $errors;
    }
    
      public function validate_nimi(){
  $errors = array();
  if($this->nimi == '' || $this->nimi == null){
    $errors[] = 'Drinkillä täytyy olla nimi!';
  }
  if(strlen($this->nimi) < 3){
    $errors[] = 'Drinkin nimen on oltava > 3 merkkiä';
  }

  return $errors;
}
    

  public function validate_tyyppi(){
  $errors = array();
  if($this->tyyppi == '' || $this->tyyppi == null){
    $errors[] = 'Drinkillä täytyy olla tyyppi!';
  }
  if(strlen($this->tyyppi) < 1){
    $errors[] = 'Drinkin tyypin on oltava > 1 merkkiä';
  }

  return $errors;
}

  public function validate_ainesosat(){
  $errors = array();
  if($this->ainesosat == '' || $this->ainesosat == null){
    $errors[] = 'Drinkillä täytyy vähintään yksi ainesosa!';
  }
  if(strlen($this->ainesosat) < 3){
    $errors[] = 'Drinkin ainesosien on oltava > 3 merkkiä';
  }

  return $errors;
}
    
}
