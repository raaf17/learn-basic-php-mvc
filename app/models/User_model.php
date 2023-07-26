<?php 

// Model tidak hanya berisi data, tapi bermacam-macam. Bisa berisi object domain, data mapper, service, dll.
class User_model {
  private $nama = 'Rafi';

  public function getUser()
  {
    return $this->nama;
  }
}

?>