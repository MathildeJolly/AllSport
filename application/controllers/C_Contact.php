<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class C_Contact extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->view('header');
        $this->load->view('footer');
    }

    public function index() {
        $this->load->view('contact');
    }
}