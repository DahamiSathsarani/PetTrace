<?php
class Post extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {

        $this->load->view('post_view');

        $this->load->model('Post_model');
        $data['posts'] = $this->Post_model->get_posts();

		$$post = $this->Post_model->get_posts();
        $post = json_decode(json_encode($post),true);
        $data['posts'] = $post;

        $this->load->view('homepage', $data);
    }

    public function userView() {
        $this->load->view('user_view');
    }
}