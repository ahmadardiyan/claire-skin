<?php

class Admin_model extends CI_Model
{

    public function insertData()
    {

        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];

        $this->db->insert('admin', $data);
    }

    public function getAdmin($key,$value)
    {
        $query = $this->db->get_where('admin',[$key => $value]);

		if (!empty($query->row_array())) {
			return $query->row_array();
		}
		return false;
    }

    public function checkPassword($username,$password)
    {
        $hash = $this->Admin_model->getAdmin('username',$username)['password'];

		if (password_verify($password,$hash)) {
			return true;
		}

		return false;
    }

    public function is_login(){
		if (!isset($_SESSION['login'])) {
			return false;
		}

		return true;
	}

}
