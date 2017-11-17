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
  
  $routes->get('/', function(){
  DrinkController::index();
});
  
  $routes->get('/drinks', function(){
  DrinkController::index();
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

  $routes->get('/helloworld', function(){
  HelloWorldController::helloworld();
});