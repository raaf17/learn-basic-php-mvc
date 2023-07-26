<?php 

class Mahasiswa_model {
  // private $mhs = [
  //   [
  //     "nama" => "Muhammad Rafi",
  //     "nrp" => "0000000001",
  //     "email" => "kipli@gmail.com",
  //     "jurusan" => "Teknik Informatika"
  //   ],
  //   [
  //     "nama" => "Reyhan",
  //     "nrp" => "0000000002",
  //     "email" => "reyhan@gmail.com",
  //     "jurusan" => "Teknik Informatika"
  //   ],
  //   [
  //     "nama" => "Yapi",
  //     "nrp" => "0000000003",
  //     "email" => "yapi@gmail.com",
  //     "jurusan" => "Teknik Informatika"
  //   ]
  // ];

  // Dengan meggunakan PDO lebih fleksibel, bila kedepannya mau megganti database nya bukan meggunakan mysql lagi. Lebih mudah dari pada driver nya mysqli

  // dbh = Database Handler. Tetapi nama yang digunakan boleh bebas

  // Jangan nyimpen username dan password databse kalian di file ini

  private $table = 'mahasiswa';
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getAllMahasiswa()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    // jika isinya banyak menggunakan resultSet
    return $this->db->resultSet();
  }

  public function getMahasiswaById($id)
  {
    $this->db->query('SELECT * FROM '. $this->table . ' WHERE ID=:id');
    $this->db->bind('id', $id);
    // jika isinya satu menggunakan singgle
    return $this->db->singgle();
  }

  public function tambahDataMahasiswa($data)
  {
    $query = "INSERT INTO mahasiswa (nama, nrp, email, jurusan)
                VALUES
              (:nama, :nrp, :email, :jurusan)";
              
    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('nrp', $data['nrp']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('jurusan', $data['jurusan']);

    $this->db->execute();

    return $this->db->rowCount();
    
  }

  public function hapusDataMahasiswa($id)
  {
    $query = "DELETE FROM mahasiswa WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function ubahDataMahasiswa($data)
  {
    $query = "UPDATE mahasiswa SET
                nama = :nama,
                nrp = :nrp,
                email = :email,
                jurusan = :jurusan
              WHERE id = :id";
              
    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('nrp', $data['nrp']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('jurusan', $data['jurusan']);
    $this->db->bind('id', $data['id']);

    $this->db->execute();

    return $this->db->rowCount();
    
  }

  public function cariDataMahasiswa()
  {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
    $this->db->query($query);
    $this->db->bind('keyword', "$keyword%");
    return $this->db->resultSet();
  }
}
