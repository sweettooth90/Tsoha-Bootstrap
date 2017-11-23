<?php

class UserController extends BaseController{
    
  public static function login(){
      View::make('login.html');
  }
  
  public static function handle_login(){
    $params = $_POST;

    $user = Käyttäjä::authenticate($params['username'], $params['password']);

    if(!$user){
      View::make('login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
    }else{
      $_SESSION['user'] = $user->id;

      Redirect::to('/drinks', array('message' => 'Tervetuloa takaisin ' . $user->name . '!'));
    }
  }
}