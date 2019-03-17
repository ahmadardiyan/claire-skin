<?php 

class Home extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Produk_model");
           
    }

    public function index()
    {
        $data ['judul'] = "Claire Skin";
        $this->load->view("templates/header_user",$data);
        $this->load->view("home/landingpage");
        $this->load->view("templates/footer_user");
    }

    public function pesan()
    {
        $data['judul'] = 'Pesan Produk';

        $data['produk'] = $this->Produk_model->getAllData('produk');

        $this->load->view("templates/header_user",$data);
        $this->load->view("pesanan/create");
        $this->load->view("templates/footer_user");
    }

}

?>