<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  echo 'Tämä on etusivu!';
    }

    public static function sandbox(){
      View::make('helloworld.html');
    }
    
    public static function drinks_edit(){
        View::make('suunnitelmat/drinks_edit.html');
    }
    
    public static function drinks_list(){
        View::make('suunnitelmat/drinks_list.html');
    }
    
    public static function drinks_show(){
        View::make('suunnitelmat/drinks_show.html');
    }
    
    public static function login(){
        View::make('suunnitelmat/login.html');
    }
  }
