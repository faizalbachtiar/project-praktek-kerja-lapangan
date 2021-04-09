<?php 
    class Penilaian extends CI_Controller {
        public function index() {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('public/penilaian/index');
            $this->load->view('templates/footer');
        }
    }
?>