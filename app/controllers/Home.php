<?php 

class Home extends Controller {
  public function index() {
    // echo 'home/index'; // Untuk mengetahui yang dipanggil adalah method index yang ada di dalam controller atau kelas home
    $data['judul'] = 'Home';
    // Ketika dipanggil, artinya kita panggil kelas modelnya sekaligus melakukan instansiasi
    $data['nama'] = $this->model('User_model')->getUser();
    $this->view('templates/header', $data);
    $this->view('home/index', $data);
    $this->view('templates/footer');
  }
}

?>