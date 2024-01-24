<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $this->load->model('Category_model');
        $this->load->model('Post_model');

		$result = $this->Category_model->get_categories(); 
        $result = json_decode(json_encode($result),true);
        $data['categories'] = $result;

        $post = $this->Post_model->get_posts();
        $post = json_decode(json_encode($post),true);
        $data['posts'] = $post;

        $this->load->view('homepage', $data);
	}

    public function signup() {
        $this->load->view('register_view');
    }

    public function signin() {
        $this->load->view('login_view');
    }
}