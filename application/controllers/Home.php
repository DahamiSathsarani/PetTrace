<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();

        // Load the session library
        $this->load->library('session');
    }

	public function index()
	{
        $this->load->library('session');
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

    public function user_dashboard($dataset) {
        // $this->load->library('session');
         //print_r($dataset).die();
        $this->load->view('user_dashboard_view', ['userData' => $dataset['user']]);
        // if ($this->session->has_userdata('userData')) {
        //     $userData = json_decode($this->session->userdata('userData'), true);
        //     echo "<pre>";
        //     print_r($userData);
        //     echo "</pre>";
    
            
        // } else {
        //     echo "Session data not found.";
        // }
    }
    

    public function add_post() {
        $this->load->view('add_post_view');
    }
}