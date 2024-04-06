<?php
    class Mahasiswa_model{
        private $tabel = 'mahasiswa';
        private $dbh;
        private $stmt;
        public function __construct(){
            $this->dbh = new Database;
        }
        
        // private $mhs = [
        //     [
        //         "nama" => "Rizky",
        //         "nrp" => "193040001",
        //         "email" => "rizkygemink@example.com",
        //         "jurusan" => "Enggris Literature"
        //     ],
        //     [
        //         "nama" => "John",
        //         "nrp" => "193040002",
        //         "email" => "john@example.com",
        //         "jurusan" => "Computer Science"
        //     ],
        //     [
        //         "nama" => "Jane",
        //         "nrp" => "193040003",
        //         "email" => "jane@example.com",
        //         "jurusan" => "Business Administration"
        //     ]
        //     ,
        //     [
        //         "nama" => "Alex",
        //         "nrp" => "193040006",
        //         "email" => "alex@example.com",
        //         "jurusan" => "Physics"
        //     ],
        //     [
        //         "nama" => "Emily",
        //         "nrp" => "193040007",
        //         "email" => "emily@example.com",
        //         "jurusan" => "Chemistry"
        //     ],
        //     [
        //         "nama" => "David",
        //         "nrp" => "193040008",
        //         "email" => "david@example.com",
        //         "jurusan" => "Biology"
        //     ],
        //     [
        //         "nama" => "Sophia",
        //         "nrp" => "193040009",
        //         "email" => "sophia@example.com",
        //         "jurusan" => "Psychology"
        //     ],
        //     [
        //         "nama" => "Oliver",
        //         "nrp" => "193040010",
        //         "email" => "oliver@example.com",
        //         "jurusan" => "Sociology"
        //     ]
          
        // ];

        
        public function getAllMahasiswa(){
            $this->dbh->query('SELECT * FROM ' . $this->tabel);
            return $this->dbh->resultSet();
        }
        public function getMahasiswaById($id){
            $this->dbh->query('SELECT * FROM ' . $this->tabel . ' WHERE id=:id');
            $this->dbh->bind('id', $id);
            return $this->dbh->single();
        }
        public function tambahDataMahasiswa($data){
            $query = "INSERT INTO mahasiswa (nama, nrp, email, jurusan) VALUES (:nama, :nrp, :email, :jurusan)";
            $this->dbh->query($query);
            $this->dbh->bind('nama', $data['nama']);
            $this->dbh->bind('nrp', $data['nim']);
            $this->dbh->bind('email', $data['email']);
            $this->dbh->bind('jurusan', $data['jurusan']);
            $this->dbh->execute();
            return $this->dbh->rowCount();
        }
     
    }
?>