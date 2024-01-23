<?php
class Post extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {

        $this->load->database();

        $this->load->view('post_view');
    }
}