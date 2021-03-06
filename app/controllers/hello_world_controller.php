<?php
  require 'app/models/drink.php';
  require 'app/models/user.php';
  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      $olut = new Drinkki(array(
        'nimi' => 'd',
        'tyyppi' => 'a',
        'ainesosat' => 'a',
        'kuvaus' => 'a'
    ));
      $errors = $olut->errors();

      Kint::dump($errors);
    }
    
    public static function drinks_edit(){
        View::make('drinks/drinks_edit.html');
    }
    
    public static function drinks_list(){
        View::make('drinks/drinks_list.html');
    }
    
    public static function drinks_show(){
        View::make('drinks/drinks_show.html');
    }
    
    public static function login(){
        View::make('drinks/login.html');
    }
    
    public static function signup(){
        View::make('drinks/signup.html');
    }
    
    public static function drinks_new(){
        View::make('drinks/drinks_new.html');
    }
    
    public static function helloworld(){
        View::make('helloworld.html');
    }
  }
