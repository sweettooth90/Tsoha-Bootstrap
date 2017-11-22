<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/drinks', function() {
    HelloWorldController::drinks_list();
  });
  
  $routes->get('/drinks/1', function() {
    HelloWorldController::drinks_show();
  });
  
  $routes->get('/drinks/edit', function() {
    HelloWorldController::drinks_edit();
  });
  
  $routes->get('/login', function() {
    HelloWorldController::login();
  });
  
  $routes->get('/signup', function() {
    HelloWorldController::signup();
  });
  
  $routes->get('/drinks/new', function() {
    HelloWorldController::drinks_new();
  });
  
  $routes->get('/drinks/:id', function($id) {
    HelloWorldController::drinks_show();
  });
  
  
 //drinks
  
  $routes->get('/', function(){
  DrinkController::index();
});
  
  $routes->get('/drinks', function(){
  DrinkController::index();
});

  $routes->get('/drinks', function() {
  DrinkController::listDrinks();
});

  $routes->get('/drinks/:id/edit', function($id){
  DrinkController::edit($id);
});

  $routes->post('/drinks/:id/edit', function($id){
  DrinkController::update($id);
});

  $routes->post('/drinks/:id/destroy', function($id){
  DrinkController::destroy($id);
});

  $routes->post('/drinks', function(){
  DrinkController::store();
});

  $routes->get('/drinks/new', function(){
  DrinkController::create();
});

  $routes->get('/drinks/:id', function($id){
  DrinkController::show($id);
});

$routes->get('/login', function(){
  UserController::login();
});

$routes->post('/login', function(){
  UserController::handle_login();
});