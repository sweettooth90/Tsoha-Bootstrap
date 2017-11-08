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