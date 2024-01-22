<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
    public function index(){
        $this->load->model('Category_model');
        $data['categories'] = $this->Category_model->get_categories();

		$result = $this->Student_Model->getDataFromDb(); 
        $result = json_decode(json_encode($result),true);

        $data['dataset'] = $result;

        $this->load->view('homepage', $data);
        
    }
}