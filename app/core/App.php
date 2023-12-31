<?php
    class App{
        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];

        public function __construct(){
            $url = $this->parseURL();
            // Controller
            if(isset($url[0])){
                if(file_exists('../app/controllers/' . $url[0] . '.php')){ 
                    $this->controller = $url[0];
                    unset($url[0]);
                }
            }
            require_once '../app/controllers/'. $this->controller . '.php';
            $this->controller = new $this->controller;
            
            // Mehthod
            if(isset($url[1])){
                if(method_exists($this->controller, $url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }
            //Params
            if(!empty($url)){
                $this->params = array_values($url);
            }
            // Jalankan controller & Method, serta kirimkan params jika ADA

            call_user_func_array([$this->controller, $this->method], $this->params);
            /*    
            function data_siswa($nama,$alamat){
                echo "nama siswa adalah $nama dan alamatnya adalah $alamat";
            }
            $siswa = ['Tegar Santosa', 'Jalan Pala No. 5']; //Array
            call_user_func_array("data_siswa", $siswa) // nama siswa adalah Tegar Santosa dan alamatnya adalah Jalan Pala No. 5
            */
        }


        public function parseURL(){
            if(isset($_GET['url']) ){
                $url = rtrim($_GET["url"], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url); // halo/saya/lutfi => ["halo","saya","lutfi"]
                return $url;
            }
        }
    }
?>