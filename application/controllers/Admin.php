<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("Admin_model");
        
        if (!$this->Admin_model->is_login()) {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $data['judul'] = 'Dashboard Admin';

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer_admin');
    }
}
