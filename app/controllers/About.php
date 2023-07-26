<?php 

class About extends Controller {
  public function index($nama = 'Rafi', $pekerjaan = 'Web Developer', $umur = 17)
  {
    // echo "Halo nama saya $nama, pekerjaan saya sebagai $pekerjaan. Saya berumur $umur.";
    $data['nama'] = $nama;
    $data['pekerjaan'] = $pekerjaan;
    $data['umur'] = $umur;
    $data['judul'] = 'About Me';

    $this->view('templates/header', $data);
    $this->view('about/index', $data);
    $this->view('templates/footer');
  }

  public function page()
  {
    $data['judul'] = 'Pages';

    $this->view('templates/header', $data);
    $this->view('about/page');
    $this->view('templates/footer');
  }
}

?>