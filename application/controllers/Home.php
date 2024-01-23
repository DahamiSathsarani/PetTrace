<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $this->load->model('Category_model');

		$result = $this->Category_model->get_categories(); 
        $result = json_decode(json_encode($result),true);

        $data['categories'] = $result;

        $this->load->view('homepage', $data);
	}

    public function signup() {
        $this->load->view('register');
    }

    public function signin() {
        $this->load->view('login');
    }
}