<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');

        // if (isset($_SESSION['login'])) {
        //     redirect('admin', 'refresh');
        // }
    }

    public function login()
    {
        if (isset($_SESSION['login'])) {
            redirect('admin','refresh');
        }

        $data['judul'] = 'Login Admin';
        $this->form_validation->set_rules('username', 'username', 'required|callback_checkUsername');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_checkPassword');

        if ($this->form_validation->run() === false) {

            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $user = $this->Admin_model->getAdmin('username', $this->input->post('username'));

            $_SESSION['login'] = true;

            redirect('admin', 'refresh');
        }

    }

    public function registrasi()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confrimpassword', 'Konfirmasi Password', 'required|matches[password]');

        // $data['user'] = $this->Auth_model->registrasi();
        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('templates/footer');
        } else {
            // echo "HAHAHA";
            $this->Admin_model->insertData(); //menyimpan data
            redirect('auth/login');
        }
    }

    public function checkUsername()
    {
        if (!$this->Admin_model->getAdmin('username', $this->input->post('username'))) {
            $this->form_validation->set_message('checkUsername', 'Username belum terdaftar!');
            return false;
        }
        return true;
    }

    public function checkPassword()
    {
        $data = $this->Admin_model->getAdmin('username', $this->input->post('username'));

        if (!$this->Admin_model->checkPassword($data['username'], $this->input->post('password'))) {
            $this->form_validation->set_message('checkPassword', 'Password yang dimasukkan salah!');
            return false;
        }
        return true;
    }

    public function logout()
    {
        unset($_SESSION['login']);
        redirect('auth/login', 'refresh');
    }

}
