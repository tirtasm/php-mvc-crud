<?php
    class Mahasiswa extends Controller{
        public function index(){
            $data['judul'] = 'Daftar Mahasiswa';
            $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');
        }
        public function detail($id){
            $data['judul'] = 'Detail Mahasiswa';
            $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
            $this->view('templates/header', $data);
            $this->view('mahasiswa/detail', $data);
            $this->view('templates/footer');
        }
        public function tambah(){
            if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0){
                Flasher::setFlash('success', 'added', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
            else{
                Flasher::setFlash('failed', 'added', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
        public function hapus($id){
            if($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0){
                Flasher::setFlash('success', 'deleted', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
        public function getEdit(){
            echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
        }
        public function edit(){
            if($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0){
                Flasher::setFlash('success', 'edited', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
            else{
                Flasher::setFlash('failed', 'edited', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
        public function cari(){
            $data['judul'] = 'Daftar Mahasiswa';
            $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');
        }

    }
?>