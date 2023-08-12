<?php
    
    class About extends Controller{
        public function index($nama = 'Erik', $pekerjaan = 'Gamer', $umur = 17){
          $data['nama'] = $nama;
          $data['pekerjaan'] = $pekerjaan;
          $data['umur'] = $umur;
          $data['title'] = "Halaman about";

          $this->view('templates/header', $data);
          $this->view("about/index", $data);
          $this->view('templates/footer');
        }
        public function page(){
            $data["title"] = "Pages";
            $this->view("templates/header",$data);
            $this->view("about/page");
            $this->view("templates/footer");
        }
    }

?>