<?php 

class Controller {
  public function view($view, $data = [])
  {
    require_once '../app/views/' . $view . '.php';
  }

  public function model($model)
  {
    require_once '../app/models/' . $model . '.php';
    return new $model(); // create an instance of the class and pass it back to be used
  }
}

?>