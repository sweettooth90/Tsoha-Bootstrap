<?php

class DrinkController extends BaseController{
    
    public static function index(){
        
        //haetaan kaikki drinkit tietokannasta
        $drinks = Drinkki::all();
        
        // renderöidään views/drinks kansiossa sijaitseva tiedosto index.html muuttujan $drinks datalla
        View::make('drinks/index.html', array('drinks' => $drinks));
    }
    
    public static function listDrinks() {
	$drinks = Drinkki::all();
	View::make('drinks/drinks_list.html', array('drinks' => $drinks));
    }
    
    public static function edit($id){
    $drinks = Drinkki::find($id);
    View::make('drinks/drinks_edit.html', array('drinks' => $drinks));
  }
  
    public static function update($id){
     $params = $_POST;
     $attributes = array(
        'id' => $id,
        'nimi' => $params['nimi'],
        'tyyppi' => $params['tyyppi'],
        'ainesosat' => $params['ainesosat'],
        'kuvaus' => $params['kuvaus']
    );
    
     
    $drinks = new Drinkki($attributes);
    $errors = $drinks->errors();
    
    if(count($errors) > 0){
        View::make('drinks/drinks_edit.html', array('errors' => $errors, 'attributes' => $attributes));
    } else {
        $drinks->update();
        Redirect::to('/drinks/' . $drinks->id, array('message' => 'Muokkaus onnistui!'));
    }
  }
  
    public static function destroy($id){
      $drinks = new Drinkki(array('id' => $id));
      $drinks->destroy($id);

      Redirect::to('/drinks', array('message' => 'Poisto onnistui!'));
    }
    
    
    public static function store(){
     $params = $_POST;
     $attributes = array(
        'nimi' => $params['nimi'],
        'tyyppi' => $params['tyyppi'],
        'ainesosat' => $params['ainesosat'],
        'kuvaus' => $params['kuvaus']
    );
    
    $drinks = new Drinkki($attributes);
    $errors = $drinks->errors();
    
    if(count($errors) == 0){
        $drinks->save();
        Redirect::to('/drinks/' . $drinks->id, array('message' => 'Drinkki lisätty onnistuneesti!'));
    } else {
        View::make('drinks/drinks_new.html', array('errors' => $errors, 'attributes' => $attributes));
    }
  }
  
  
  public static function show($id){
    $drinks = Drinkki::find($id);
    $getattributes = Drinkki::getAttributes($id);
    View::make('drinks/drinks_show.html', array('drinks' => $drinks, 'getattributes' => $getattributes));
  }
}
